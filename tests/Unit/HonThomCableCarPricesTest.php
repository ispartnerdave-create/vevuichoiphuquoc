<?php

namespace Tests\Unit;

use App\Support\HonThomCableCarPrices;
use PHPUnit\Framework\TestCase;

class HonThomCableCarPricesTest extends TestCase
{
    public function test_sheet_contains_twenty_four_tickets_across_three_sections(): void
    {
        $payload = HonThomCableCarPrices::payload();
        $ticketCount = 0;

        foreach ($payload['sections'] as $section) {
            foreach ($section['groups'] as $group) {
                $ticketCount += count($group['tickets']);
            }
        }

        $this->assertSame('2026-01-01', $payload['validFrom']);
        $this->assertCount(3, $payload['sections']);
        $this->assertSame(24, $ticketCount);
        $this->assertSame(
            ['Khu vực cáp treo', 'Khu vực Sunset Town', 'Khu vực nhà hàng Bavaria'],
            array_column($payload['sections'][0]['groups'], 'name'),
        );
        $this->assertSame('Wow Pass', $payload['sections'][2]['groups'][0]['name']);
    }

    public function test_selected_sheet_prices_match_source_rows(): void
    {
        $payload = HonThomCableCarPrices::payload();
        $roundTrip = $payload['sections'][0]['groups'][0]['tickets'][0];
        $cauHon = $payload['sections'][0]['groups'][1]['tickets'][0];
        $kissCurrent = $payload['sections'][0]['groups'][1]['tickets'][2];
        $kissFromNovember = $payload['sections'][1]['groups'][1]['tickets'][2];
        $platinum = $payload['sections'][2]['groups'][0]['tickets'][2];

        $this->assertSame(850000, $roundTrip['adult']['list']);
        $this->assertSame(765000, $roundTrip['adult']['sale']);
        $this->assertSame(700000, $roundTrip['child']['list']);
        $this->assertSame(630000, $roundTrip['child']['sale']);
        $this->assertNull($cauHon['adult']['list']);
        $this->assertNull($cauHon['adult']['sale']);
        $this->assertSame('Khung giờ áp dụng từ 7h00 đến trước 17h30 hoặc sau 20h15', $cauHon['note']);
        $this->assertSame(750000, $kissCurrent['adult']['list']);
        $this->assertSame(575000, $kissCurrent['adult']['sale']);
        $this->assertSame(800000, $kissFromNovember['adult']['list']);
        $this->assertSame(625000, $kissFromNovember['adult']['sale']);
        $this->assertSame(2500000, $platinum['adult']['list']);
        $this->assertSame(2250000, $platinum['adult']['sale']);
        $this->assertSame(1700000, $platinum['child']['list']);
        $this->assertSame(1530000, $platinum['child']['sale']);
        $this->assertArrayNotHasKey('senior', $roundTrip);
    }
}
