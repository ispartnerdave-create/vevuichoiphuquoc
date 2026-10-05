import { useEffect, useState } from 'react';
import { Menu } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { Sheet, SheetContent, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { Logo } from '@/components/landing/Logo';
import { ZaloIcon, ZaloLink } from '@/components/landing/ZaloLink';

const links = [
    { href: '/#danh-muc', label: 'Danh mục' },
    { href: '/#dat-ve', label: 'Hỏi đáp' },
];

export function SiteHeader({ solid = false }) {
    const [scrolled, setScrolled] = useState(solid);
    const [open, setOpen] = useState(false);

    useEffect(() => {
        if (solid) {
            return;
        }
        const onScroll = () => setScrolled(window.scrollY > 16);
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        return () => window.removeEventListener('scroll', onScroll);
    }, [solid]);

    return (
        <header
            className={`fixed inset-x-0 top-0 z-50 pt-[env(safe-area-inset-top,0px)] transition-all ${
                scrolled || solid ? 'bg-navy/94 text-white shadow-[0_6px_24px_-12px_rgba(0,0,0,.4)] backdrop-blur-[10px]' : 'bg-transparent text-white'
            }`}
        >
            <div className="mx-auto flex h-[76px] w-full max-w-[1200px] items-center justify-between px-5">
                <Logo />
                <div className="flex items-center gap-6">
                    <nav className="hidden items-center gap-7 text-[0.95rem] font-medium lg:flex" aria-label="Điều hướng chính">
                        {links.map((link) => (
                            <a key={link.href} href={link.href} className="text-white/88 transition hover:text-white">
                                {link.label}
                            </a>
                        ))}
                    </nav>
                    <Button
                        asChild
                        className="hidden h-11 rounded-full bg-gold px-5 font-bold text-navy shadow-[0_8px_24px_-8px_rgba(255,182,39,.7)] hover:bg-[#FFC64F] md:inline-flex"
                    >
                        <ZaloLink>
                            <ZaloIcon />
                            Đặt vé qua Zalo
                        </ZaloLink>
                    </Button>
                    <Sheet open={open} onOpenChange={setOpen}>
                        <SheetTrigger asChild>
                            <Button size="icon" variant="ghost" className="size-12 text-white hover:bg-white/10 lg:hidden">
                                <Menu className="size-7" />
                                <span className="sr-only">Mở menu</span>
                            </Button>
                        </SheetTrigger>
                        <SheetContent side="right" className="bg-navy text-white">
                            <SheetHeader>
                                <SheetTitle className="text-white">Menu</SheetTitle>
                            </SheetHeader>
                            <nav className="flex flex-col gap-1 px-4">
                                {links.map((link) => (
                                    <a
                                        key={link.href}
                                        href={link.href}
                                        onClick={() => setOpen(false)}
                                        className="rounded-lg px-2 py-3 text-base font-medium text-white/90 hover:bg-white/10"
                                    >
                                        {link.label}
                                    </a>
                                ))}
                                <Button asChild className="mt-4 h-12 rounded-full bg-gold font-bold text-navy hover:bg-[#FFC64F]">
                                    <ZaloLink onClick={() => setOpen(false)}>
                                        <ZaloIcon />
                                        Đặt vé qua Zalo
                                    </ZaloLink>
                                </Button>
                            </nav>
                        </SheetContent>
                    </Sheet>
                </div>
            </div>
        </header>
    );
}
