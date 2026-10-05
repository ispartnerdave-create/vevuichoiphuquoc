<?php

namespace Tests\Unit;

use App\Support\CategoryCatalog;
use PHPUnit\Framework\TestCase;

class CategoryCatalogTest extends TestCase
{
    public function test_catalog_has_six_phu_quoc_categories_in_order(): void
    {
        $names = array_column(CategoryCatalog::all(), 'name');

        $this->assertSame([
            'VinWonders & Safari – GrandWorld Phú Quốc',
            'Cáp Treo Hòn Thơm Phú Quốc',
            'Ice Jungle Phú Quốc',
            'Vé Tàu Superdong & Express Phú Quốc',
            'Vé Sunset Sanato Phú Quốc',
            'Vé Thuyền Thúng & Kayak Cửa Cạn Phú Quốc',
        ], $names);
    }

    public function test_find_returns_category_by_id(): void
    {
        $this->assertNotNull(CategoryCatalog::find('ice-jungle'));
        $this->assertNull(CategoryCatalog::find('missing'));
    }

    public function test_vinwonders_find_attaches_sheet_prices(): void
    {
        $category = CategoryCatalog::find('vinwonders-safari-grandworld');

        $this->assertTrue($category['hasPrices']);
        $this->assertSame('2026-10-01', $category['prices']['validFrom']);
        $this->assertCount(2, $category['prices']['sections']);
        $this->assertSame('Safari Phú Quốc', $category['prices']['sections'][0]['groups'][0]['tickets'][0]['name']);
        $this->assertArrayNotHasKey('prices', CategoryCatalog::all()[0]);
        $this->assertArrayNotHasKey('prices', CategoryCatalog::all()[5]);
    }

    public function test_hon_thom_find_attaches_sheet_prices(): void
    {
        $category = CategoryCatalog::find('cap-treo-hon-thom');

        $this->assertTrue($category['hasPrices']);
        $this->assertSame('2026-01-01', $category['prices']['validFrom']);
        $this->assertCount(3, $category['prices']['sections']);
        $this->assertSame('Vé Hòn Thơm 02 Chiều', $category['prices']['sections'][0]['groups'][0]['tickets'][0]['name']);
        $this->assertArrayNotHasKey('prices', CategoryCatalog::all()[1]);
    }

    public function test_ice_jungle_find_attaches_sheet_prices(): void
    {
        $category = CategoryCatalog::find('ice-jungle');

        $this->assertTrue($category['hasPrices']);
        $this->assertSame('2026-01-01', $category['prices']['validFrom']);
        $this->assertCount(1, $category['prices']['sections']);
        $this->assertSame('ICE JUNGLE KIÊN GIANG', $category['prices']['sections'][0]['groups'][0]['tickets'][0]['name']);
        $this->assertArrayNotHasKey('prices', CategoryCatalog::all()[2]);
    }

    public function test_superdong_find_attaches_sheet_prices(): void
    {
        $category = CategoryCatalog::find('tau-superdong-express');

        $this->assertTrue($category['hasPrices']);
        $this->assertCount(2, $category['prices']['sections']);
        $this->assertSame('Rạch Giá ↔ Phú Quốc', $category['prices']['sections'][0]['groups'][0]['tickets'][0]['name']);
        $this->assertArrayNotHasKey('prices', CategoryCatalog::all()[3]);
    }

    public function test_sunset_sanato_find_attaches_sheet_prices(): void
    {
        $category = CategoryCatalog::find('sunset-sanato');

        $this->assertTrue($category['hasPrices']);
        $this->assertSame('2026-07-01', $category['prices']['validFrom']);
        $this->assertCount(1, $category['prices']['sections']);
        $this->assertSame('Suset Chill Package', $category['prices']['sections'][0]['groups'][0]['tickets'][0]['name']);
        $this->assertArrayNotHasKey('prices', CategoryCatalog::all()[4]);
    }

    public function test_cua_can_find_attaches_sheet_prices(): void
    {
        $category = CategoryCatalog::find('thuyen-thung-kayak-cua-can');

        $this->assertTrue($category['hasPrices']);
        $this->assertCount(2, $category['prices']['sections']);
        $this->assertSame('Tham quan thuyền thúng', $category['prices']['sections'][0]['groups'][0]['tickets'][0]['name']);
        $this->assertArrayNotHasKey('prices', CategoryCatalog::all()[5]);
    }
}
