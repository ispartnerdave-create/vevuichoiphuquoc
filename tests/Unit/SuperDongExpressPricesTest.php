<?php

namespace Tests\Unit;

use App\Support\SuperDongExpressPrices;
use PHPUnit\Framework\TestCase;

class SuperDongExpressPricesTest extends TestCase
{
    public function test_sheet_contains_four_routes_across_two_operators(): void
    {
        $payload = SuperDongExpressPrices::payload();

        $this->assertSame('ferry', $payload['layout']);
        $this->assertCount(2, $payload['sections']);
        $this->assertSame('Tàu Express', $payload['sections'][0]['title']);
        $this->assertSame('Tàu SuperDong', $payload['sections'][1]['title']);
        $this->assertCount(2, $payload['sections'][0]['groups'][0]['tickets']);
        $this->assertCount(2, $payload['sections'][1]['groups'][0]['tickets']);
        $this->assertSame(['vip', 'adult', 'child', 'senior'], array_column($payload['ageColumns'], 'key'));
    }

    public function test_public_fares_match_vetauphuquoc_landing(): void
    {
        $payload = SuperDongExpressPrices::payload();
        $expressRg = $payload['sections'][0]['groups'][0]['tickets'][0];
        $expressHt = $payload['sections'][0]['groups'][0]['tickets'][1];
        $superRg = $payload['sections'][1]['groups'][0]['tickets'][0];
        $superHt = $payload['sections'][1]['groups'][0]['tickets'][1];

        $this->assertSame('Rạch Giá ↔ Phú Quốc', $expressRg['name']);
        $this->assertSame('07h00; 10h20; 13h00', $expressRg['departures'][0]['times']);
        $this->assertSame('07h10; 10h00; 13h20', $expressRg['departures'][1]['times']);
        $this->assertSame(500000, $expressRg['vip']['list']);
        $this->assertSame(480000, $expressRg['vip']['sale']);
        $this->assertSame(315000, $expressRg['adult']['list']);
        $this->assertSame(305000, $expressRg['adult']['sale']);
        $this->assertSame(225000, $expressRg['child']['list']);
        $this->assertSame(220000, $expressRg['child']['sale']);
        $this->assertSame(265000, $expressRg['senior']['list']);
        $this->assertSame(260000, $expressRg['senior']['sale']);
        $this->assertSame(330000, $expressHt['vip']['list']);
        $this->assertSame(320000, $expressHt['vip']['sale']);
        $this->assertSame(206000, $expressHt['adult']['sale']);
        $this->assertSame(148000, $expressHt['child']['list']);
        $this->assertSame(143000, $expressHt['child']['sale']);
        $this->assertArrayNotHasKey('vip', $superRg);
        $this->assertSame(324000, $superRg['adult']['list']);
        $this->assertSame(314000, $superRg['adult']['sale']);
        $this->assertSame(230000, $superRg['child']['sale']);
        $this->assertSame(269000, $superRg['senior']['sale']);
        $this->assertSame('06h10; 08h20; 9h50; 13h15', $superHt['departures'][0]['times']);
        $this->assertSame(215000, $superHt['adult']['sale']);
        $this->assertSame(186000, $superHt['senior']['sale']);
    }
}
