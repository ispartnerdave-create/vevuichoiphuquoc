import { useMemo, useState } from 'react';
import { Button } from '@/components/ui/button';
import { ZaloLink } from '@/components/landing/ZaloLink';

const ROUTE_TABS = [
    { id: 'ha-tien-phu-quoc', label: 'Hà Tiên → Phú Quốc' },
    { id: 'phu-quoc-ha-tien', label: 'Phú Quốc → Hà Tiên' },
    { id: 'rach-gia-phu-quoc', label: 'Rạch Giá → Phú Quốc' },
    { id: 'phu-quoc-rach-gia', label: 'Phú Quốc → Rạch Giá' },
];

const DIRECTION_IDS = {
    'Hà Tiên → Phú Quốc': 'ha-tien-phu-quoc',
    'Phú Quốc → Hà Tiên': 'phu-quoc-ha-tien',
    'Rạch Giá → Phú Quốc': 'rach-gia-phu-quoc',
    'Phú Quốc → Rạch Giá': 'phu-quoc-rach-gia',
};

const sunBtn =
    'mt-auto h-12 w-full rounded-full bg-gold px-6 font-bold text-navy shadow-[0_8px_24px_-8px_rgba(255,182,39,.7)] hover:bg-[#FFC64F]';

function money(value) {
    return `${new Intl.NumberFormat('vi-VN').format(value)}đ`;
}

function parseTimes(times) {
    return times
        .split(';')
        .map((part) => part.trim())
        .filter(Boolean)
        .map((part) => {
            const match = part.match(/(\d{1,2})\s*h\s*(\d{2})/i);

            return match ? `${match[1].padStart(2, '0')}:${match[2]}` : part;
        });
}

function parseDuration(note) {
    const match = note?.match(/(\d+)\s*tiếng(?:\s*(\d+)\s*phút)?/i);

    if (!match) {
        return 0;
    }

    return Number(match[1]) * 60 + Number(match[2] || 0);
}

function durationLabel(minutes) {
    const hours = Math.floor(minutes / 60);
    const rest = minutes % 60;

    return `${hours} giờ${rest ? ` ${rest} phút` : ''}`;
}

function arrive(time, minutes) {
    const [hour, minute] = time.split(':').map(Number);
    const total = hour * 60 + minute + minutes;

    return `${String(Math.floor(total / 60) % 24).padStart(2, '0')}:${String(total % 60).padStart(2, '0')}`;
}

function priceHtml(pair) {
    if (!pair || (pair.list == null && pair.sale == null)) {
        return null;
    }

    const list = pair.list;
    const sale = pair.sale ?? pair.list;

    if (list != null && sale != null && sale < list) {
        return (
            <>
                <s className="mr-1.5 font-medium text-muted-foreground">{money(list)}</s>
                {money(sale)}
            </>
        );
    }

    return money(sale ?? list);
}

function operatorsFromPrices(prices) {
    return (prices.sections ?? []).map((section) => {
        const tickets = section.groups.flatMap((group) => group.tickets);
        const hasVip = tickets.some((ticket) => Boolean(ticket.vip));
        const operator = {
            id: /super/i.test(section.title) ? 'superdong' : 'express',
            name: section.title,
            tag: hasVip ? 'Có ghế VIP' : null,
            routes: {},
        };

        tickets.forEach((ticket) => {
            const dur = parseDuration(ticket.note);

            (ticket.departures ?? []).forEach((departure) => {
                const id = DIRECTION_IDS[departure.direction];

                if (!id) {
                    return;
                }

                operator.routes[id] = {
                    dur,
                    times: parseTimes(departure.times),
                    vip: ticket.vip,
                    adult: ticket.adult,
                    child: ticket.child,
                    senior: ticket.senior,
                };
            });
        });

        return operator;
    });
}

export function FerryFareTables({ prices }) {
    const operators = useMemo(() => operatorsFromPrices(prices), [prices]);
    const tabs = ROUTE_TABS.filter((tab) => operators.some((operator) => operator.routes[tab.id]));
    const [selected, setSelected] = useState(tabs[0]?.id ?? ROUTE_TABS[0].id);
    const cards = operators
        .map((operator) => ({ operator, route: operator.routes[selected] }))
        .filter((item) => item.route);

    if (!cards.length) {
        return null;
    }

    const adultSales = cards.map((item) => item.route.adult?.sale).filter((value) => value != null);
    const cheapest = uniqueMin(adultSales);
    const firstTimes = cards.map((item) => item.route.times[0]).filter(Boolean);
    const earliest = uniqueMin(firstTimes, (a, b) => a.localeCompare(b));

    return (
        <div>
            <div className="mb-8">
                <h2 id="fares-title" className="font-heading text-[clamp(0.98rem,4.4vw,2rem)] leading-[1.15] font-extrabold tracking-tight text-navy whitespace-nowrap">
                    Bảng giá vé & giờ tàu
                </h2>
                <p className="mt-3 text-[1.1rem] text-muted-foreground">
                    Giá vé một chiều đã giảm khi đặt qua chúng tôi, giá gạch ngang là giá niêm yết tại quầy. Chọn tuyến để so sánh tàu Express và Superdong.
                </p>
            </div>

            <div className="mb-6 flex flex-wrap gap-2.5 sm:gap-2.5" role="group" aria-label="Chọn tuyến để xem giá">
                <div className="grid w-full grid-cols-2 gap-2 sm:flex sm:w-auto sm:flex-wrap">
                    {tabs.map((tab) => {
                        const pressed = tab.id === selected;

                        return (
                            <button
                                key={tab.id}
                                type="button"
                                aria-pressed={pressed}
                                onClick={() => setSelected(tab.id)}
                                className={`rounded-full border-2 px-4 py-2.5 text-[0.95rem] font-semibold transition sm:px-5 ${
                                    pressed ? 'border-navy bg-navy text-white' : 'border-border bg-white text-foreground hover:border-lagoon'
                                }`}
                            >
                                {tab.label}
                            </button>
                        );
                    })}
                </div>
            </div>

            <div className="grid gap-5 md:grid-cols-2 md:gap-6" aria-live="polite">
                {cards.map(({ operator, route }) => {
                    const adult = route.adult ?? {};
                    const sale = adult.sale ?? adult.list;
                    const list = adult.list;
                    const save = list != null && sale != null ? list - sale : 0;
                    const badges = [];

                    if (cheapest != null && adult.sale === cheapest) {
                        badges.push({ label: 'Giá tốt hơn', hot: true });
                    }
                    if (earliest != null && route.times[0] === earliest) {
                        badges.push({ label: 'Chuyến sớm nhất', hot: true });
                    }
                    if (operator.tag) {
                        badges.push({ label: operator.tag, hot: false });
                    }

                    const rows = [
                        ['Ghế VIP', route.vip],
                        ['Người lớn', route.adult],
                        ['Trẻ em', route.child],
                        ['Người cao tuổi', route.senior],
                    ].filter(([, pair]) => pair && (pair.list != null || pair.sale != null));

                    return (
                        <article
                            key={operator.id}
                            className={`relative flex flex-col gap-5 overflow-hidden rounded-[22px] border border-border bg-white px-6 pt-7 pb-6 shadow-[0_24px_48px_-32px_rgba(8,50,79,.35)] before:absolute before:inset-x-0 before:top-0 before:h-1.5 ${
                                operator.id === 'superdong' ? 'before:bg-coral' : 'before:bg-gold'
                            }`}
                        >
                            <div className="flex flex-wrap items-start justify-between gap-x-4 gap-y-2">
                                <div>
                                    <h3 className="font-heading text-[1.35rem] leading-tight font-bold text-navy">{operator.name}</h3>
                                    <p className="mt-0.5 text-[0.92rem] text-muted-foreground">
                                        {durationLabel(route.dur)} · {route.times.length} chuyến/ngày
                                    </p>
                                </div>
                                <div className="flex flex-wrap gap-1.5">
                                    {badges.map((badge) => (
                                        <span
                                            key={badge.label}
                                            className={`rounded-full px-2.5 py-1 text-[0.76rem] font-bold ${
                                                badge.hot ? 'bg-[#FFF0D1] text-[#7A4E00]' : 'bg-mist text-ink-2'
                                            }`}
                                        >
                                            {badge.label}
                                        </span>
                                    ))}
                                </div>
                            </div>

                            <div>
                                {save > 0 ? (
                                    <div className="mb-1.5 flex items-center gap-2.5">
                                        <span className="rounded-full bg-[#FFE4DC] px-2.5 py-1 text-[0.78rem] font-bold text-[#B3341A]">
                                            Tiết kiệm {money(save)}
                                        </span>
                                        <s className="text-[0.9rem] font-medium text-muted-foreground">{money(list)}</s>
                                    </div>
                                ) : null}
                                <div className="flex flex-wrap items-baseline gap-x-2.5">
                                    <strong className="font-heading text-[clamp(2rem,4vw,2.6rem)] leading-none font-extrabold tracking-[-0.02em] text-navy tabular-nums">
                                        {money(sale)}
                                    </strong>
                                    <span className="text-[0.92rem] text-muted-foreground">người lớn / lượt</span>
                                </div>
                            </div>

                            <div>
                                <p className="mb-2.5 text-[0.78rem] font-bold tracking-[0.08em] text-muted-foreground uppercase">Giờ khởi hành</p>
                                <ul className="grid grid-cols-[repeat(auto-fill,minmax(96px,1fr))] gap-2">
                                    {route.times.map((time) => (
                                        <li key={time} className="rounded-xl border border-border bg-foam px-3 py-2 leading-snug">
                                            <b className="block text-[1.12rem] font-bold text-navy tabular-nums">{time}</b>
                                            <small className="text-[0.76rem] text-muted-foreground">đến {arrive(time, route.dur)}</small>
                                        </li>
                                    ))}
                                </ul>
                            </div>

                            <div>
                                <p className="mb-1 text-[0.78rem] font-bold tracking-[0.08em] text-muted-foreground uppercase">Giá vé</p>
                                <dl>
                                    {rows.map(([label, pair]) => (
                                        <div key={label} className="flex justify-between gap-4 border-b border-dashed border-border py-2.5 last:border-b-0">
                                            <dt>{label}</dt>
                                            <dd className="m-0 font-bold text-navy tabular-nums">{priceHtml(pair)}</dd>
                                        </div>
                                    ))}
                                </dl>
                            </div>

                            <Button asChild className={sunBtn}>
                                <ZaloLink label={`Đặt vé ${operator.name} qua Zalo`}>Đặt vé {operator.name}</ZaloLink>
                            </Button>
                        </article>
                    );
                })}
            </div>

            <p className="mt-6 text-[0.9rem] text-muted-foreground">
                Đơn vị: đồng/vé/lượt. Giá có thể thay đổi vào dịp lễ, Tết. Độ tuổi áp dụng vé trẻ em và người cao tuổi theo quy định của từng hãng, chúng tôi sẽ báo rõ khi bạn đặt. Giờ đến là giờ dự kiến, có thể lệch theo thời tiết.
                {prices.notes?.length ? ` ${prices.notes.join(' ')}` : ''}
            </p>
        </div>
    );
}

function uniqueMin(values, compare = (a, b) => a - b) {
    if (!values.length) {
        return null;
    }

    const top = values.reduce((best, value) => (compare(best, value) <= 0 ? best : value));

    return values.filter((value) => value === top).length === 1 ? top : null;
}
