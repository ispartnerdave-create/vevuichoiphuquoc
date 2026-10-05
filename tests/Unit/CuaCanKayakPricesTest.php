<?php

namespace Tests\Unit;

use App\Support\CuaCanKayakPrices;
use PHPUnit\Framework\TestCase;

class CuaCanKayakPricesTest extends TestCase
{
    public function test_sheet_contains_seventeen_services_across_two_sections(): void
    {
        $payload = CuaCanKayakPrices::payload();

        $this->assertCount(2, $payload['sections']);
        $this->assertSame('Vé tiêu chuẩn', $payload['sections'][0]['title']);
        $this->assertSame('Ẩm thực', $payload['sections'][1]['title']);
        $this->assertCount(11, $payload['sections'][0]['groups'][0]['tickets']);
        $this->assertCount(6, $payload['sections'][1]['groups'][0]['tickets']);
        $this->assertSame(['adult', 'child'], array_column($payload['ageColumns'], 'key'));
    }

    public function test_selected_sheet_prices_match_source_rows(): void
    {
        $payload = CuaCanKayakPrices::payload();
        $thung = $payload['sections'][0]['groups'][0]['tickets'][0];
        $kayak = $payload['sections'][0]['groups'][0]['tickets'][2];
        $combo = $payload['sections'][0]['groups'][0]['tickets'][10];
        $crabHotpot = $payload['sections'][1]['groups'][0]['tickets'][3];
        $lobster = $payload['sections'][1]['groups'][0]['tickets'][5];

        $this->assertSame('Tham quan thuyền thúng', $thung['name']);
        $this->assertSame(200000, $thung['adult']['list']);
        $this->assertSame(120000, $thung['adult']['sale']);
        $this->assertSame(100000, $thung['child']['list']);
        $this->assertSame(60000, $thung['child']['sale']);
        $this->assertSame(150000, $kayak['adult']['list']);
        $this->assertSame(100000, $kayak['adult']['sale']);
        $this->assertSame(500000, $combo['adult']['list']);
        $this->assertSame(400000, $combo['adult']['sale']);
        $this->assertSame('EcoTD2 - Lẩu hải sản cua', $crabHotpot['name']);
        $this->assertSame(630000, $crabHotpot['adult']['list']);
        $this->assertSame(500000, $crabHotpot['adult']['sale']);
        $this->assertSame(250000, $crabHotpot['child']['sale']);
        $this->assertSame(880000, $lobster['adult']['list']);
        $this->assertSame(700000, $lobster['adult']['sale']);
        $this->assertSame(350000, $lobster['child']['sale']);
    }
}
