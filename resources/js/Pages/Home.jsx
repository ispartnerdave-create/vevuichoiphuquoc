import { useState } from 'react';
import { Head, Link } from '@inertiajs/react';
import { ArrowRight, MapPin, Phone, RefreshCw, ShieldCheck, Zap } from 'lucide-react';
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from '@/components/ui/accordion';
import { Button } from '@/components/ui/button';
import { FloatingCta } from '@/components/landing/FloatingCta';
import { SiteFooter } from '@/components/landing/SiteFooter';
import { SiteHeader } from '@/components/landing/SiteHeader';
import { ZaloIcon, ZaloLink } from '@/components/landing/ZaloLink';
import { SITE, categoryUi } from '@/lib/site';

const sunBtn =
    'h-12 rounded-full bg-gold px-6 font-bold text-navy shadow-[0_8px_24px_-8px_rgba(255,182,39,.7)] hover:bg-[#FFC64F]';
const glassBtn =
    'h-12 rounded-full border-2 border-white/45 bg-white/14 px-6 font-bold text-white backdrop-blur-sm hover:bg-white/24 hover:text-white';
const inkBtn = 'h-12 w-full rounded-full bg-navy px-6 font-bold text-white hover:bg-ink-2';
const sectionTitle =
    'font-heading text-[clamp(0.98rem,4.4vw,2rem)] leading-[1.15] font-extrabold tracking-tight whitespace-nowrap';

const perks = [
    { icon: Zap, title: 'Giữ chỗ nhanh', text: 'Nhắn Zalo là có mã vé, không cần tạo tài khoản.' },
    { icon: ShieldCheck, title: 'Vé chính hãng', text: 'Vé xuất từ nhà cung cấp, có tên hành khách trên vé điện tử.' },
    { icon: RefreshCw, title: 'Hỗ trợ đổi vé', text: 'Đổi ngày theo quy định từng danh mục, xác nhận trước khi thanh toán.' },
    { icon: Phone, title: 'Hỗ trợ 7 ngày/tuần', text: 'Có người trực hotline cả cuối tuần và ngày lễ.' },
];

const steps = [
    { title: 'Nhắn danh mục và ngày đi', text: 'Gửi qua Zalo hoặc gọi hotline: danh mục, ngày đi, số người lớn và trẻ em.' },
    { title: 'Nhận mã giữ chỗ', text: 'Chúng tôi kiểm tra chỗ, xác nhận giá theo bảng và gửi mã vé cho bạn.' },
    { title: 'Nhận vé và vào cổng', text: 'Mang CCCD (trẻ em mang giấy khai sinh khi đi tàu), xuất trình mã vé tại cổng hoặc bến.' },
];

const tips = [
    { title: '🪪 Giấy tờ', text: 'Người lớn mang CCCD hoặc hộ chiếu. Trẻ em mang giấy khai sinh khi đi tàu cao tốc.' },
    { title: '🧒 Trẻ em', text: 'Độ tuổi và chiều cao miễn phí khác nhau từng danh mục. Ghi chiều cao trẻ khi nhắn Zalo.' },
    { title: '🎟️ Combo', text: 'Có thể đặt nhiều danh mục cùng lúc. Ghi VinWonders + Hòn Thơm + tàu nếu đi combo.' },
    { title: '🌦️ Mùa mưa', text: 'Tháng 6–9 biển có thể động, một số show ngoài trời đổi giờ. Chúng tôi báo sớm khi có thay đổi.' },
];

export default function Home({ categories, faqs }) {
    const [selectedId, setSelectedId] = useState(categories[0]?.id);
    const selected = categories.find((category) => category.id === selectedId) ?? categories[0];

    return (
        <div id="top" className="min-h-screen bg-foam">
            <Head title="Vé vui chơi Phú Quốc">
                <meta
                    name="description"
                    content="Đặt vé Phú Quốc: VinWonders & Safari, cáp treo Hòn Thơm, Ice Jungle, tàu Superdong & Express, Sunset Sanato, thuyền thúng và kayak Cửa Cạn. Bảng giá trên từng danh mục."
                />
            </Head>
            <SiteHeader />

            <section className="relative isolate flex min-h-svh overflow-hidden text-white" aria-labelledby="hero-title">
                <div className="absolute inset-0 -z-20">
                    <img
                        src="/images/hero.jpg"
                        alt="Bãi biển Phú Quốc lúc hoàng hôn"
                        className="hero-zoom size-full object-cover"
                    />
                </div>
                <div className="absolute inset-0 -z-10 bg-[linear-gradient(100deg,rgba(6,38,62,.92)_0%,rgba(6,38,62,.7)_42%,rgba(6,38,62,.15)_75%),linear-gradient(0deg,rgba(6,38,62,.55),transparent_35%)]" />

                <div className="relative mx-auto grid w-full max-w-[1200px] items-center gap-10 px-5 pt-[130px] pb-[140px] lg:grid-cols-[1.15fr_.85fr] lg:gap-12">
                    <div>
                        <span className="mb-5 inline-flex items-center gap-2 rounded-full border border-lagoon/60 bg-lagoon/25 px-3.5 py-1.5 text-[0.92rem] font-semibold">
                            <i className="size-2 rounded-full bg-lagoon shadow-[0_0_0_4px_rgba(19,179,174,.3)]" aria-hidden="true" />
                            Sáu danh mục vé trên đảo ngọc
                        </span>
                        <h1 id="hero-title" className="font-heading text-[clamp(1.65rem,3.6vw,2.7rem)] leading-[1.12] font-black tracking-[-0.03em] whitespace-nowrap">
                            Vé vui chơi Phú Quốc
                        </h1>
                        <p className="mt-5 max-w-[44ch] text-[1.18rem] text-[#D5E9F1]">
                            VinWonders, cáp treo Hòn Thơm, Ice Jungle, tàu cao tốc, Sunset Sanato và kayak Cửa Cạn. Nhắn Zalo, chúng tôi giữ chỗ và gửi mã vé cho bạn.
                        </p>
                        <div className="mt-8 flex flex-wrap gap-3.5">
                            <Button asChild className={sunBtn}>
                                <ZaloLink>
                                    <ZaloIcon />
                                    Đặt vé qua Zalo
                                </ZaloLink>
                            </Button>
                            <Button asChild className={glassBtn}>
                                <a href="#danh-muc">Xem 6 danh mục</a>
                            </Button>
                        </div>

                    </div>

                    {selected ? (
                        <aside className="rounded-[28px] bg-white/[.96] p-6 text-foreground shadow-[0_30px_60px_-20px_rgba(0,0,0,.5)]">
                            <h2 className="mb-4 font-heading text-xl font-bold text-navy">Bạn muốn đặt vé nào?</h2>
                            <div className="mb-4 grid grid-cols-2 gap-2.5" role="group" aria-label="Chọn danh mục">
                                {categories.map((category) => {
                                    const ui = categoryUi(category);
                                    const pressed = category.id === selected.id;

                                    return (
                                        <button
                                            key={category.id}
                                            type="button"
                                            aria-pressed={pressed}
                                            onClick={() => setSelectedId(category.id)}
                                            className={`rounded-[14px] border-2 px-3.5 py-3 text-left text-[0.92rem] font-semibold transition ${
                                                pressed ? 'border-lagoon bg-[#E9FAF9]' : 'border-border bg-white hover:border-lagoon'
                                            }`}
                                        >
                                            {ui.short}
                                            <small className="mt-0.5 block text-[0.8rem] font-medium text-muted-foreground">{ui.badge}</small>
                                        </button>
                                    );
                                })}
                            </div>
                            <div className="mb-4 grid grid-cols-[auto_1fr] gap-x-4 gap-y-1 rounded-[18px] bg-mist px-5 py-4">
                                <span className="mt-1 size-3.5 rounded-full border-[3px] border-navy bg-white" />
                                <div>
                                    <strong className="block leading-snug text-navy">{selected.name}</strong>
                                    <span className="text-sm text-muted-foreground">{selected.location}</span>
                                </div>
                                <span className="ml-1.5 h-7 w-0.5 bg-[repeating-linear-gradient(#08324F_0_4px,transparent_4px_8px)]" />
                                <span className="self-center text-sm font-bold text-navy">{selected.tagline}</span>
                                <span className="mt-1 size-3.5 rounded-full border-[3px] border-navy bg-navy" />
                                <div>
                                    <strong className="block leading-snug text-navy">Đã có bảng giá</strong>
                                    <span className="text-sm text-muted-foreground">Xem chi tiết rồi nhắn Zalo đặt vé</span>
                                </div>
                            </div>
                            <Button asChild className={inkBtn}>
                                <Link href={`/${selected.id}`}>
                                    Xem giá {categoryUi(selected).short}
                                    <ArrowRight />
                                </Link>
                            </Button>
                            <p className="mt-2.5 text-center text-[0.82rem] text-muted-foreground">Xác nhận qua Zalo trong vài phút</p>
                        </aside>
                    ) : null}
                </div>

                <svg className="absolute inset-x-0 bottom-[-1px] h-20 w-full text-foam" viewBox="0 0 1440 80" preserveAspectRatio="none" aria-hidden="true">
                    <path fill="currentColor" d="M0 40c120 25 240 38 360 30S600 30 720 28s240 18 360 26 240 0 360-22v48H0z" />
                </svg>
            </section>

            <section className="bg-foam pt-14 pb-4" aria-label="Vì sao đặt vé với chúng tôi">
                <div className="mx-auto grid w-full max-w-[1200px] gap-6 px-5 sm:grid-cols-2 lg:grid-cols-4">
                    {perks.map((perk) => (
                        <div key={perk.title} className="flex gap-4">
                            <span className="grid size-[52px] shrink-0 place-items-center rounded-2xl border border-border bg-white text-lagoon">
                                <perk.icon className="size-6" />
                            </span>
                            <div>
                                <h3 className="font-heading text-[1.02rem] font-bold text-navy">{perk.title}</h3>
                                <p className="mt-0.5 text-[0.93rem] leading-relaxed text-muted-foreground">{perk.text}</p>
                            </div>
                        </div>
                    ))}
                </div>
            </section>

            <section id="danh-muc" className="bg-foam pt-20 pb-20">
                <div className="mx-auto w-full max-w-[1200px] px-5">
                    <div className="mb-12">
                        <h2 className={`${sectionTitle} text-navy`}>6 danh mục vé vui chơi Phú Quốc</h2>
                        <p className="mt-3 text-[1.1rem] text-muted-foreground">
                            Đúng catalog khu vực. Mỗi mục đã có bảng giá chi tiết trên trang riêng.
                        </p>
                    </div>
                    <div className="grid gap-6 md:grid-cols-2">
                        {categories.map((category) => {
                            const ui = categoryUi(category);

                            return (
                                <article
                                    key={category.id}
                                    id={category.id}
                                    className="group relative isolate flex min-h-[440px] overflow-hidden rounded-[22px] text-white shadow-[0_20px_40px_-24px_rgba(8,50,79,.55)]"
                                >
                                    <img
                                        src={category.image}
                                        alt={category.name}
                                        className="absolute inset-0 -z-20 size-full object-cover transition-transform duration-700 group-hover:scale-105"
                                    />
                                    <div className="absolute inset-0 -z-10 bg-linear-to-b from-navy/5 via-navy/25 to-navy/92" />
                                    <div className="absolute top-5 right-5 left-5 flex flex-wrap justify-between gap-2">
                                        <span className={`inline-flex rounded-full px-3 py-1.5 text-[0.84rem] font-bold ${ui.tone === 'lagoon' ? 'bg-lagoon text-white' : 'bg-gold text-navy'}`}>
                                            {ui.badge}
                                        </span>
                                        <span className="inline-flex rounded-full bg-white/90 px-3 py-1.5 text-[0.84rem] font-bold text-navy">Đã có bảng giá</span>
                                    </div>
                                    <div className="mt-auto w-full p-7">
                                        <h3 className="font-heading text-[clamp(1.5rem,2.4vw,2rem)] leading-tight font-extrabold tracking-tight">{ui.short}</h3>
                                        <p className="mt-2 flex items-center gap-1.5 text-[0.92rem] text-[#D3E7EF]">
                                            <MapPin className="size-4 text-lagoon" />
                                            {category.location}
                                        </p>
                                        <p className="mt-3 max-w-[46ch] text-[0.98rem] text-[#E3F0F5]">{category.tagline}</p>
                                        <div className="mt-5 flex flex-wrap items-center justify-between gap-3">
                                            <Button asChild className={sunBtn}>
                                                <ZaloLink label={`Đặt vé ${ui.short} qua Zalo`}>
                                                    Đặt vé {ui.short}
                                                </ZaloLink>
                                            </Button>
                                            <Link
                                                href={`/${category.id}`}
                                                className="inline-flex items-center gap-1 text-sm font-semibold text-white/85 hover:text-gold"
                                            >
                                                Xem bảng giá
                                                <ArrowRight className="size-4" />
                                            </Link>
                                        </div>
                                    </div>
                                </article>
                            );
                        })}
                    </div>
                </div>
            </section>

            <section id="diem-den" className="bg-white py-24">
                <div className="mx-auto w-full max-w-[1200px] px-5">
                    <div className="mb-12">
                        <h2 className={`${sectionTitle} text-navy`}>Phú Quốc chờ bạn ở cuối hành trình</h2>
                        <p className="mt-3 text-[1.1rem] text-muted-foreground">Sáu điểm đến gắn với sáu danh mục vé trên trang.</p>
                    </div>
                    <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        {categories.map((category) => {
                            const ui = categoryUi(category);

                            return (
                                <Link key={category.id} href={`/${category.id}`} className="group">
                                    <figure className="relative overflow-hidden rounded-[22px] bg-ink-2">
                                        <img
                                            src={category.image}
                                            alt={ui.short}
                                            className="aspect-4/3 size-full object-cover transition duration-700 group-hover:scale-105"
                                        />
                                        <figcaption className="absolute right-4 bottom-4 left-4 font-bold text-white [text-shadow:0_2px_12px_rgba(0,0,0,.6)]">
                                            {ui.short}
                                            <span className="block text-[0.88rem] font-medium opacity-90">{category.location}</span>
                                        </figcaption>
                                    </figure>
                                </Link>
                            );
                        })}
                    </div>
                </div>
            </section>

            <section id="dat-ve" className="bg-mist pt-20 pb-24">
                <div className="mx-auto w-full max-w-[1200px] px-5">
                    <div className="grid gap-16 lg:grid-cols-2">
                        <div>
                            <h2 className={`${sectionTitle} text-navy`}>Đặt vé trong 3 bước</h2>
                            <p className="mt-3 text-[1.1rem] text-muted-foreground">Không cần tạo tài khoản, không cần cài ứng dụng. Nhanh nhất là nhắn Zalo.</p>
                            <div className="mt-6 flex flex-wrap gap-3">
                                <Button asChild className={sunBtn}>
                                    <ZaloLink>
                                        <ZaloIcon />
                                        Đặt vé qua Zalo
                                    </ZaloLink>
                                </Button>
                                <Button asChild className="h-12 rounded-full border-2 border-navy bg-white px-6 font-bold text-navy hover:bg-mist">
                                    <a href={`tel:${SITE.hotlineTel}`}>Gọi {SITE.hotlineDisplay}</a>
                                </Button>
                            </div>
                            <ol className="mt-8 grid gap-4">
                                {steps.map((step, index) => (
                                    <li key={step.title} className="grid grid-cols-[56px_1fr] gap-4 rounded-[20px] border border-border bg-white p-5">
                                        <span className="grid size-14 place-items-center rounded-2xl bg-navy font-black text-[1.4rem] text-gold">
                                            {index + 1}
                                        </span>
                                        <div>
                                            <h3 className="font-heading text-[1.12rem] font-bold text-navy">{step.title}</h3>
                                            <p className="mt-1 text-[0.97rem] text-muted-foreground">{step.text}</p>
                                        </div>
                                    </li>
                                ))}
                            </ol>
                        </div>
                        <div id="faq">
                            <h2 className={`mb-8 ${sectionTitle} text-navy`}>Câu hỏi thường gặp</h2>
                            <Accordion type="single" collapsible defaultValue="item-0" className="grid gap-3">
                                {faqs.map((faq, index) => (
                                    <AccordionItem
                                        key={faq.question}
                                        value={`item-${index}`}
                                        className="rounded-[18px] border border-border bg-white px-5 data-open:border-lagoon"
                                    >
                                        <AccordionTrigger className="py-4 text-base font-bold text-navy hover:no-underline">
                                            {faq.question}
                                        </AccordionTrigger>
                                        <AccordionContent className="text-muted-foreground">{faq.answer}</AccordionContent>
                                    </AccordionItem>
                                ))}
                            </Accordion>
                        </div>
                    </div>

                    <div className="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4" role="group" aria-label="Lưu ý khi đặt vé">
                        {tips.map((tip) => (
                            <div key={tip.title} className="rounded-[20px] bg-white p-6">
                                <h3 className="font-heading text-[1.05rem] font-bold text-navy">{tip.title}</h3>
                                <p className="mt-1.5 text-[0.94rem] text-muted-foreground">{tip.text}</p>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            <section className="relative isolate overflow-hidden py-28 text-center text-white" aria-labelledby="cta-title">
                <img src="/images/family.jpg" alt="" className="absolute inset-0 -z-20 size-full object-cover" />
                <div className="absolute inset-0 -z-10 bg-linear-to-b from-navy/65 to-navy/85" />
                <div className="relative mx-auto px-5">
                    <h2 id="cta-title" className={`${sectionTitle} text-white`}>
                        Sẵn sàng khám phá đảo ngọc?
                    </h2>
                    <p className="mx-auto mt-4 max-w-[50ch] text-[1.12rem] text-[#D5E9F1]">Nhắn Zalo hoặc gọi hotline: danh mục, ngày đi và số người. Bạn sẽ nhận xác nhận chỗ trong vài phút.</p>
                    <div className="mt-8 flex flex-wrap justify-center gap-3.5">
                        <Button asChild className={sunBtn}>
                            <ZaloLink>
                                <ZaloIcon />
                                Nhắn Zalo đặt vé
                            </ZaloLink>
                        </Button>
                        <Button asChild className={glassBtn}>
                            <a href={`tel:${SITE.hotlineTel}`}>Gọi {SITE.hotlineDisplay}</a>
                        </Button>
                    </div>
                </div>
            </section>

            <SiteFooter categories={categories} />
            <FloatingCta />
        </div>
    );
}
