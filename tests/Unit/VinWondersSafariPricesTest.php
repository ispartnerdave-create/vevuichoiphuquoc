<?php

namespace Tests\Unit;

use App\Support\VinWondersSafariPrices;
use PHPUnit\Framework\TestCase;

class VinWondersSafariPricesTest extends TestCase
{
    public function test_sheet_contains_thirty_four_tickets_across_two_sections(): void
    {
        $payload = VinWondersSafariPrices::payload();
        $ticketCount = 0;

        foreach ($payload['sections'] as $section) {
            foreach ($section['groups'] as $group) {
                $ticketCount += count($group['tickets']);
            }
        }

        $this->assertSame('2026-10-01', $payload['validFrom']);
        $this->assertCount(2, $payload['sections']);
        $this->assertSame(34, $ticketCount);
        $this->assertSame(
            ['VinWonders & Safari Phú Quốc', 'Combo Vé + Xe Fastpass', 'Grand World Phú Quốc'],
            array_column($payload['sections'][0]['groups'], 'name'),
        );
    }

    public function test_selected_sheet_prices_match_source_rows(): void
    {
        $payload = VinWondersSafariPrices::payload();
        $safari = $payload['sections'][0]['groups'][0]['tickets'][0];
        $veniceBear = $payload['sections'][0]['groups'][2]['tickets'][4];
        $deepSeaTwoDay = $payload['sections'][1]['groups'][2]['tickets'][9];

        $this->assertSame(950000, $safari['adult']['list']);
        $this->assertSame(874000, $safari['adult']['sale']);
        $this->assertSame('Tặng kèm vé Bảo Tàng Gấu', $safari['promo']);
        $this->assertSame(191250, $veniceBear['child']['sale']);
        $this->assertSame(2380000, $deepSeaTwoDay['adult']['list']);
        $this->assertSame(2189600, $deepSeaTwoDay['adult']['sale']);
        $this->assertSame(2000000, $deepSeaTwoDay['child']['list']);
        $this->assertSame(1840000, $deepSeaTwoDay['child']['sale']);
    }
}
