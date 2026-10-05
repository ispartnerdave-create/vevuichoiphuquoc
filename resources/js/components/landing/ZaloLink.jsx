import { SITE } from '@/lib/site';

export function ZaloIcon({ className = 'size-5' }) {
    return (
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className={className} aria-hidden="true">
            <path d="M21 12a8 8 0 0 1-11.6 7.1L4 20l1-4.6A8 8 0 1 1 21 12z" />
        </svg>
    );
}

export function ZaloLink({ children, className = '', label = 'Nhắn Zalo đặt vé', ...props }) {
    return (
        <a href={SITE.zaloUrl} target="_blank" rel="noopener noreferrer" aria-label={label} className={className} {...props}>
            {children}
        </a>
    );
}
