import { Head, Link } from '@inertiajs/react';
import { ArrowLeft, MapPin } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { FloatingCta } from '@/components/landing/FloatingCta';
import { SiteFooter } from '@/components/landing/SiteFooter';
import { SiteHeader } from '@/components/landing/SiteHeader';
import { FerryFareTables } from '@/components/landing/FerryFareTables';
import { TicketPriceTables } from '@/components/landing/TicketPriceTables';
import { categoryUi } from '@/lib/site';

export default function Category({ category, categories }) {
    const hasPrices = Boolean(category.prices?.sections?.length);
    const isFerry = category.prices?.layout === 'ferry';

    return (
        <div className="min-h-screen bg-foam">
            <Head title={category.name}>
                <meta name="description" content={category.description} />
            </Head>
            <SiteHeader solid />

            <section className="relative isolate h-[46vh] min-h-80 overflow-hidden">
                <img src={category.image} alt={category.name} className="absolute inset-0 size-full object-cover" />
                <div className="absolute inset-0 bg-[linear-gradient(100deg,rgba(6,38,62,.92)_0%,rgba(6,38,62,.55)_55%,rgba(6,38,62,.2)_100%),linear-gradient(0deg,rgba(6,38,62,.7),transparent_40%)]" />
                <div className="relative mx-auto flex h-full w-full max-w-[1200px] flex-col justify-end px-5 pb-12 pt-28">
                    <Button asChild variant="ghost" className="mb-3 w-fit text-white hover:bg-white/10 hover:text-white">
                        <Link href="/#danh-muc">
                            <ArrowLeft />
                            Tất cả danh mục
                        </Link>
                    </Button>
                    <span className="mb-3 inline-flex w-fit rounded-full bg-gold px-3 py-1 text-[0.84rem] font-bold text-navy">
                        {categoryUi(category).badge}
                    </span>
                    <h1 className="font-heading text-[clamp(0.88rem,4vw,2.15rem)] font-black tracking-tight text-white whitespace-nowrap">
                        {category.name}
                    </h1>
                    <p className="mt-2 flex items-center gap-1 text-sm text-[#D5E9F1]">
                        <MapPin className="size-4 text-lagoon" />
                        {category.location}
                    </p>
                </div>
            </section>

            <section className="mx-auto w-full max-w-[1200px] px-5 pt-10 pb-2">
                <p className="text-lg text-muted-foreground">{category.description}</p>
            </section>

            {hasPrices ? (
                <section id="bang-gia" className="bg-white py-16" aria-labelledby="fares-title">
                    <div className="mx-auto w-full max-w-[1200px] px-5">
                        {isFerry ? (
                            <FerryFareTables prices={category.prices} />
                        ) : (
                            <TicketPriceTables key={category.id} prices={category.prices} />
                        )}
                    </div>
                </section>
            ) : null}

            <SiteFooter categories={categories} />
            <FloatingCta />
        </div>
    );
}
