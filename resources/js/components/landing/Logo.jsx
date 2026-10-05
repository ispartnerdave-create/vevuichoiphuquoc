import { Link } from '@inertiajs/react';

export function Logo({ className = '' }) {
    return (
        <Link href="/" className={`flex items-center gap-2.5 ${className}`} aria-label="Vé vui chơi Phú Quốc – Trang chủ">
            <span className="grid size-10 place-items-center rounded-xl bg-gold text-navy shadow-sm">
                <svg viewBox="0 0 24 24" className="size-6" fill="none" stroke="currentColor" strokeWidth="2.2" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true">
                    <path d="M2 18c2 1.6 4 1.6 6 0s4-1.6 6 0 4 1.6 6 0" />
                    <path d="M4 14l1.6-5h12.8L20 14" />
                    <path d="M9 9V6h6v3" />
                </svg>
            </span>
            <span className="leading-tight">
                <span className="block font-heading text-[1.05rem] font-extrabold tracking-tight text-white whitespace-nowrap sm:text-[1.15rem]">Vé vui chơi Phú Quốc</span>
                <span className="block text-[11px] font-medium text-white/70">Đảo ngọc · 6 danh mục vé</span>
            </span>
        </Link>
    );
}
