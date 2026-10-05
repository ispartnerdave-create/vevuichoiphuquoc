import { Link } from '@inertiajs/react';
import { Logo } from '@/components/landing/Logo';
import { SITE, categoryUi } from '@/lib/site';

export function SiteFooter({ categories = [] }) {
    return (
        <footer className="bg-[#052338] text-[#A6C4D4]">
            <div className="mx-auto w-full max-w-[1200px] px-5 pt-16 pb-8">
                <div className="mb-10 grid gap-8 md:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr]">
                    <div>
                        <Logo />
                        <p className="mt-4 max-w-sm text-sm leading-relaxed">
                            Đại lý vé vui chơi Phú Quốc: VinWonders, cáp treo Hòn Thơm, Ice Jungle, tàu cao tốc, Sunset Sanato và kayak Cửa Cạn.
                        </p>
                        <p className="mt-3 text-sm">
                            Hotline:{' '}
                            <a href={`tel:${SITE.hotlineTel}`} className="font-semibold text-white hover:underline">
                                {SITE.hotlineDisplay}
                            </a>
                        </p>
                    </div>
                    <div>
                        <h3 className="mb-3 text-base font-bold text-white">Danh mục vé</h3>
                        {categories.map((category) => (
                            <p key={category.id} className="mb-1">
                                <Link href={`/${category.id}`} className="text-white hover:underline">
                                    {categoryUi(category).short}
                                </Link>
                            </p>
                        ))}
                    </div>
                    <div>
                        <h3 className="mb-3 text-base font-bold text-white">Liên hệ</h3>
                        <p className="mb-1">{SITE.area}</p>
                        <p>
                            <a href={SITE.zaloUrl} target="_blank" rel="noopener noreferrer" className="text-white hover:underline">
                                Nhắn Zalo {SITE.zaloDisplay}
                            </a>
                        </p>
                    </div>
                </div>
                <div className="flex flex-wrap justify-between gap-3 border-t border-white/10 pt-6 text-sm">
                    <span>© {new Date().getFullYear()} {SITE.name}. Bảng giá trên từng danh mục, chốt khi xác nhận ngày đi.</span>
                </div>
            </div>
        </footer>
    );
}
