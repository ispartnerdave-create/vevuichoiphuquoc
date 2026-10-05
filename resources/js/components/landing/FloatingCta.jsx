import { Phone } from 'lucide-react';
import { ZaloLink } from '@/components/landing/ZaloLink';
import { SITE } from '@/lib/site';

export function FloatingCta() {
    return (
        <>
            <div className="fixed right-4 bottom-[calc(1rem+env(safe-area-inset-bottom,0px))] z-[60] hidden flex-col gap-3 md:flex">
                <ZaloLink
                    className="grid size-14 place-items-center rounded-full bg-[#0068FF] text-xs font-black text-white shadow-[0_10px_24px_-8px_rgba(0,0,0,.45)]"
                    label="Nhắn Zalo"
                >
                    Zalo
                </ZaloLink>
                <a
                    href={`tel:${SITE.hotlineTel}`}
                    className="fab-ring grid size-14 place-items-center rounded-full bg-gold text-navy shadow-[0_10px_24px_-8px_rgba(0,0,0,.45)]"
                    aria-label={`Gọi ${SITE.hotlineDisplay}`}
                >
                    <Phone className="size-6" />
                </a>
            </div>
            <nav
                className="fixed inset-x-0 bottom-0 z-[60] grid grid-cols-2 gap-2.5 border-t border-border bg-white/97 px-4 pt-2.5 pb-[calc(0.6rem+env(safe-area-inset-bottom,0px))] shadow-[0_-8px_24px_-12px_rgba(8,50,79,.35)] backdrop-blur-md md:hidden"
                aria-label="Liên hệ đặt vé"
            >
                <ZaloLink className="inline-flex h-[50px] items-center justify-center gap-2 rounded-full bg-[#0068FF] text-[0.98rem] font-bold text-white">
                    Nhắn Zalo
                </ZaloLink>
                <a
                    href={`tel:${SITE.hotlineTel}`}
                    className="inline-flex h-[50px] items-center justify-center gap-2 rounded-full bg-gold text-[0.98rem] font-bold text-navy"
                >
                    Gọi ngay
                </a>
            </nav>
        </>
    );
}
