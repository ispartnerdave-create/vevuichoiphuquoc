import { useMemo, useState } from 'react';
import { Button } from '@/components/ui/button';
import { ZaloLink } from '@/components/landing/ZaloLink';

const AGE_COLUMN_DEFS = [
    { key: 'adult', label: 'Người lớn', hint: 'Trên 1,4m' },
    { key: 'child', label: 'Trẻ em', hint: 'Từ 1m–1,4m' },
    { key: 'senior', label: 'Cao tuổi', hint: 'Trên 60 tuổi' },
];

const sunBtn =
    'mt-auto h-12 w-full rounded-full bg-gold px-6 font-bold text-navy shadow-[0_8px_24px_-8px_rgba(255,182,39,.7)] hover:bg-[#FFC64F]';

function money(value) {
    return `${new Intl.NumberFormat('vi-VN').format(value)}đ`;
}

function hasPrice(pair) {
    return pair != null && (pair.list != null || pair.sale != null);
}

function displayAmount(value) {
    if (value == null) {
        return '—';
    }

    if (value === 0) {
        return 'Miễn phí';
    }

    return money(value);
}

function priceHtml(pair, singlePrice) {
    if (!hasPrice(pair)) {
        return '—';
    }

    const list = pair.list;
    const sale = pair.sale ?? pair.list;

    if (!singlePrice && list != null && sale != null && sale < list) {
        return (
            <>
                <s className="mr-1.5 font-medium text-muted-foreground">{displayAmount(list)}</s>
                {displayAmount(sale)}
            </>
        );
    }

    return displayAmount(sale);
}

function columnsForTickets(prices, tickets) {
    const defs = prices.ageColumns?.length ? prices.ageColumns : AGE_COLUMN_DEFS;

    return defs.filter((column) => tickets.some((ticket) => hasPrice(ticket[column.key])));
}

function flattenSection(section) {
    return section.groups.flatMap((group) =>
        group.tickets.map((ticket) => ({
            ...ticket,
            groupName: group.name && group.name !== section.title ? group.name : null,
            period: group.period ?? null,
        })),
    );
}

function tabsFromPrices(prices) {
    const sections = prices.sections ?? [];

    if (sections.length > 1) {
        return sections.map((section, index) => ({
            id: `section-${index}`,
            label: section.title,
            subtitle: section.subtitle,
            tickets: flattenSection(section),
        }));
    }

    const section = sections[0];

    if (!section) {
        return [];
    }

    const namedGroups = section.groups.filter((group) => group.name && group.name !== section.title);

    if (namedGroups.length > 1) {
        return section.groups.map((group, index) => ({
            id: `group-${index}`,
            label: group.name,
            subtitle: group.period || section.subtitle,
            tickets: group.tickets.map((ticket) => ({
                ...ticket,
                groupName: null,
                period: group.period ?? null,
            })),
        }));
    }

    return [
        {
            id: 'all',
            label: section.title,
            subtitle: section.subtitle,
            tickets: flattenSection(section),
        },
    ];
}

function primaryPair(ticket, columns) {
    return columns.map((column) => ticket[column.key]).find((pair) => hasPrice(pair)) ?? null;
}

function saleValue(pair) {
    if (!hasPrice(pair)) {
        return null;
    }

    return pair.sale ?? pair.list;
}

function uniqueMin(values) {
    if (!values.length) {
        return null;
    }

    const top = Math.min(...values);

    return values.filter((value) => value === top).length === 1 ? top : null;
}

export function TicketPriceTables({ prices }) {
    const tabs = useMemo(() => tabsFromPrices(prices), [prices]);
    const [selectedId, setSelectedId] = useState(tabs[0]?.id);
    const selected = tabs.find((tab) => tab.id === selectedId) ?? tabs[0];
    const singlePrice = Boolean(prices.singlePrice);
    const tickets = selected?.tickets ?? [];
    const columns = columnsForTickets(prices, tickets);
    const cheapest = uniqueMin(tickets.map((ticket) => saleValue(primaryPair(ticket, columns))).filter((value) => value != null && value > 0));
    const heading = prices.firstColumnLabel === 'Gói vé' ? 'Bảng giá gói vé' : prices.firstColumnLabel === 'Dịch vụ' ? 'Bảng giá dịch vụ' : 'Bảng giá vé';

    if (!tabs.length) {
        return null;
    }

    return (
        <div>
            <div className="mb-8">
                <h2 id="fares-title" className="font-heading text-[clamp(0.98rem,4.4vw,2rem)] leading-[1.15] font-extrabold tracking-tight text-navy whitespace-nowrap">
                    {heading}
                </h2>
                <p className="mt-3 text-[1.1rem] text-muted-foreground">
                    {prices.validFromLabel} Giá gạch ngang là giá niêm yết. Nhắn Zalo để giữ chỗ theo ngày đi.
                </p>
            </div>

            {tabs.length > 1 ? (
                <div className="mb-6" role="group" aria-label="Chọn nhóm vé">
                    <div className="grid w-full grid-cols-2 gap-2 sm:flex sm:flex-wrap">
                        {tabs.map((tab) => {
                            const pressed = tab.id === selected.id;

                            return (
                                <button
                                    key={tab.id}
                                    type="button"
                                    aria-pressed={pressed}
                                    onClick={() => setSelectedId(tab.id)}
                                    className={`rounded-full border-2 px-4 py-2.5 text-left text-[0.95rem] font-semibold transition sm:px-5 ${
                                        pressed ? 'border-navy bg-navy text-white' : 'border-border bg-white text-foreground hover:border-lagoon'
                                    }`}
                                >
                                    {tab.label}
                                </button>
                            );
                        })}
                    </div>
                </div>
            ) : null}

            <div className="grid gap-5 md:grid-cols-2 md:gap-6" aria-live="polite">
                {tickets.map((ticket, index) => {
                    const pair = primaryPair(ticket, columns);
                    const sale = saleValue(pair);
                    const list = pair?.list;
                    const save = !singlePrice && list != null && sale != null && sale < list ? list - sale : 0;
                    const rows = columns
                        .map((column) => [column.hint ? `${column.label} (${column.hint})` : column.label, ticket[column.key]])
                        .filter(([, value]) => hasPrice(value));
                    const cta = ticket.name.length > 36 ? 'Đặt vé qua Zalo' : `Đặt vé ${ticket.name}`;

                    return (
                        <article
                            key={`${ticket.name}-${index}`}
                            className={`relative flex flex-col gap-5 overflow-hidden rounded-[22px] border border-border bg-white px-6 pt-7 pb-6 shadow-[0_24px_48px_-32px_rgba(8,50,79,.35)] before:absolute before:inset-x-0 before:top-0 before:h-1.5 ${
                                index % 2 === 1 ? 'before:bg-coral' : 'before:bg-gold'
                            }`}
                        >
                            <div className="flex flex-wrap items-start justify-between gap-x-4 gap-y-2">
                                <div>
                                    <h3 className="font-heading text-[1.2rem] leading-tight font-bold text-navy">{ticket.name}</h3>
                                    {ticket.tagline || ticket.groupName ? (
                                        <p className="mt-0.5 text-[0.92rem] text-muted-foreground">{ticket.tagline || ticket.groupName}</p>
                                    ) : null}
                                    {ticket.period ? <p className="mt-0.5 text-[0.82rem] text-muted-foreground">{ticket.period}</p> : null}
                                </div>
                                <div className="flex flex-wrap gap-1.5">
                                    {cheapest != null && sale === cheapest ? (
                                        <span className="rounded-full bg-[#FFF0D1] px-2.5 py-1 text-[0.76rem] font-bold text-[#7A4E00]">Giá tốt hơn</span>
                                    ) : null}
                                    {ticket.promo ? (
                                        <span className="rounded-full bg-mist px-2.5 py-1 text-[0.76rem] font-bold text-ink-2">{ticket.promo}</span>
                                    ) : null}
                                </div>
                            </div>

                            {sale != null ? (
                                <div>
                                    {save > 0 ? (
                                        <div className="mb-1.5 flex items-center gap-2.5">
                                            <span className="rounded-full bg-[#FFE4DC] px-2.5 py-1 text-[0.78rem] font-bold text-[#B3341A]">
                                                Tiết kiệm {money(save)}
                                            </span>
                                            <s className="text-[0.9rem] font-medium text-muted-foreground">{displayAmount(list)}</s>
                                        </div>
                                    ) : null}
                                    <div className="flex flex-wrap items-baseline gap-x-2.5">
                                        <strong className="font-heading text-[clamp(1.8rem,3.6vw,2.4rem)] leading-none font-extrabold tracking-[-0.02em] text-navy tabular-nums">
                                            {displayAmount(sale)}
                                        </strong>
                                        <span className="text-[0.92rem] text-muted-foreground">{columns[0]?.label ?? 'vé'} / lượt</span>
                                    </div>
                                </div>
                            ) : (
                                <p className="text-[0.95rem] text-muted-foreground">Giá theo combo hoặc miễn phí khi mua vé khác.</p>
                            )}

                            {ticket.note ? <p className="text-[0.92rem] text-muted-foreground">{ticket.note}</p> : null}

                            {ticket.includes?.length ? (
                                <div>
                                    <p className="mb-2.5 text-[0.78rem] font-bold tracking-[0.08em] text-muted-foreground uppercase">Bao gồm</p>
                                    <ul className="grid gap-1.5 text-[0.92rem] text-muted-foreground">
                                        {ticket.includes.map((item) => (
                                            <li key={item} className="rounded-xl border border-border bg-foam px-3 py-2 leading-snug">
                                                {item}
                                            </li>
                                        ))}
                                    </ul>
                                </div>
                            ) : null}

                            {rows.length ? (
                                <div>
                                    <p className="mb-1 text-[0.78rem] font-bold tracking-[0.08em] text-muted-foreground uppercase">Giá vé</p>
                                    <dl>
                                        {rows.map(([label, value]) => (
                                            <div key={label} className="flex justify-between gap-4 border-b border-dashed border-border py-2.5 last:border-b-0">
                                                <dt>{label}</dt>
                                                <dd className="m-0 text-right font-bold text-navy tabular-nums">{priceHtml(value, singlePrice)}</dd>
                                            </div>
                                        ))}
                                    </dl>
                                </div>
                            ) : null}

                            <Button asChild className={sunBtn}>
                                <ZaloLink label={`${cta} qua Zalo`}>{cta}</ZaloLink>
                            </Button>
                        </article>
                    );
                })}
            </div>

            {prices.notes?.length ? (
                <p className="mt-6 text-[0.9rem] text-muted-foreground">{prices.notes.join(' ')}</p>
            ) : null}
        </div>
    );
}
