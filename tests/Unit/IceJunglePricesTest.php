<?php

namespace Tests\Unit;

use App\Support\IceJunglePrices;
use PHPUnit\Framework\TestCase;

class IceJunglePricesTest extends TestCase
{
    public function test_sheet_contains_two_tickets_and_custom_age_columns(): void
    {
        $payload = IceJunglePrices::payload();

        $this->assertSame('2026-01-01', $payload['validFrom']);
        $this->assertCount(1, $payload['sections']);
        $this->assertCount(2, $payload['sections'][0]['groups'][0]['tickets']);
        $this->assertSame(
            ['adult', 'child'],
            array_column($payload['ageColumns'], 'key'),
        );
        $this->assertSame('Vé tiêu chuẩn', $payload['ageColumns'][0]['label']);
        $this->assertSame('Chiều cao trên 1m', $payload['ageColumns'][0]['hint']);
        $this->assertSame('Chiều cao dưới 1m', $payload['ageColumns'][1]['hint']);
    }

    public function test_selected_sheet_prices_match_source_rows(): void
    {
        $tickets = IceJunglePrices::payload()['sections'][0]['groups'][0]['tickets'];
        $kienGiang = $tickets[0];
        $national = $tickets[1];

        $this->assertSame('ICE JUNGLE KIÊN GIANG', $kienGiang['name']);
        $this->assertSame(150000, $kienGiang['adult']['list']);
        $this->assertSame(120000, $kienGiang['adult']['sale']);
        $this->assertSame(0, $kienGiang['child']['list']);
        $this->assertSame(0, $kienGiang['child']['sale']);
        $this->assertSame('ICE JUNGLE TOÀN QUỐC & QUỐC TẾ', $national['name']);
        $this->assertSame(200000, $national['adult']['list']);
        $this->assertSame(160000, $national['adult']['sale']);
        $this->assertSame(0, $national['child']['sale']);
        $this->assertArrayNotHasKey('senior', $kienGiang);
    }
}
