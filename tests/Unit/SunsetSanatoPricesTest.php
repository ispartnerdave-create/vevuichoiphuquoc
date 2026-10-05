<?php

namespace Tests\Unit;

use App\Support\SunsetSanatoPrices;
use PHPUnit\Framework\TestCase;

class SunsetSanatoPricesTest extends TestCase
{
    public function test_sheet_contains_nine_packages_from_july_2026(): void
    {
        $payload = SunsetSanatoPrices::payload();
        $tickets = $payload['sections'][0]['groups'][0]['tickets'];

        $this->assertSame('2026-07-01', $payload['validFrom']);
        $this->assertTrue($payload['singlePrice']);
        $this->assertCount(9, $tickets);
        $this->assertSame(
            ['adult', 'child'],
            array_column($payload['ageColumns'], 'key'),
        );
        $this->assertSame('Từ 12 tuổi trở lên', $payload['ageColumns'][0]['hint']);
        $this->assertSame('6–11 tuổi', $payload['ageColumns'][1]['hint']);
    }

    public function test_selected_sheet_prices_match_source_rows(): void
    {
        $tickets = SunsetSanatoPrices::payload()['sections'][0]['groups'][0]['tickets'];
        $byName = array_column($tickets, null, 'name');

        $this->assertSame(200000, $byName['Suset Chill Package']['adult']['sale']);
        $this->assertSame(100000, $byName['Suset Chill Package']['child']['sale']);
        $this->assertSame('Thư Giãn Cùng Hoàng Hôn', $byName['Suset Chill Package']['tagline']);
        $this->assertSame(200000, $byName['Trà Chiều']['adult']['sale']);
        $this->assertSame(250000, $byName['Trà Chiều Smoothie']['adult']['sale']);
        $this->assertSame(125000, $byName['Trà Chiều Smoothie']['child']['sale']);
        $this->assertSame(250000, $byName['Sunset Fun Pass']['adult']['sale']);
        $this->assertSame(300000, $byName['Sunset Paradise Package']['adult']['sale']);
        $this->assertSame(150000, $byName['Sunset Paradise Package']['child']['sale']);
        $this->assertSame(320000, $byName['Sunset Pizza Combo']['adult']['sale']);
        $this->assertSame(160000, $byName['Sunset Pizza Combo']['child']['sale']);
        $this->assertSame('Áp dụng cho booking số chẵn 2, 4, 6,...', $byName['Sunset Pizza Combo']['note']);
        $this->assertSame(120000, $byName['Combo Kem']['adult']['sale']);
        $this->assertArrayNotHasKey('child', $byName['Combo Kem']);
        $this->assertSame(120000, $byName['Combo Soft Drink']['adult']['sale']);
        $this->assertSame(140000, $byName['Combo Dừa tươi']['adult']['sale']);
        $this->assertArrayNotHasKey('child', $byName['Combo Dừa tươi']);
    }
}
