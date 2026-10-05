<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_renders_phu_quoc_catalog(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Home')
                ->has('categories', 6)
                ->has('faqs', 6)
                ->where('categories.0.name', 'VinWonders & Safari – GrandWorld Phú Quốc')
                ->where('categories.5.name', 'Vé Thuyền Thúng & Kayak Cửa Cạn Phú Quốc')
            );
    }

    public function test_home_route_is_public(): void
    {
        $this->get('/')->assertOk();
    }

    public function test_vinwonders_category_page_includes_price_tables(): void
    {
        $this->get(route('categories.show', 'vinwonders-safari-grandworld'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Category')
                ->where('category.id', 'vinwonders-safari-grandworld')
                ->where('category.prices.validFrom', '2026-10-01')
                ->has('category.prices.sections', 2)
                ->where('category.prices.sections.0.groups.0.tickets.0.name', 'Safari Phú Quốc')
                ->where('category.prices.sections.0.groups.0.tickets.0.adult.list', 950000)
                ->where('category.prices.sections.0.groups.0.tickets.0.adult.sale', 874000)
                ->has('categories', 6)
            );
    }

    public function test_hon_thom_category_page_includes_price_tables(): void
    {
        $this->get(route('categories.show', 'cap-treo-hon-thom'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Category')
                ->where('category.id', 'cap-treo-hon-thom')
                ->where('category.prices.validFrom', '2026-01-01')
                ->has('category.prices.sections', 3)
                ->where('category.prices.sections.0.groups.0.tickets.0.name', 'Vé Hòn Thơm 02 Chiều')
                ->where('category.prices.sections.0.groups.0.tickets.0.adult.list', 850000)
                ->where('category.prices.sections.0.groups.0.tickets.0.adult.sale', 765000)
                ->has('categories', 6)
            );
    }

    public function test_ice_jungle_category_page_includes_price_tables(): void
    {
        $this->get(route('categories.show', 'ice-jungle'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Category')
                ->where('category.id', 'ice-jungle')
                ->where('category.prices.validFrom', '2026-01-01')
                ->has('category.prices.sections', 1)
                ->where('category.prices.sections.0.groups.0.tickets.0.name', 'ICE JUNGLE KIÊN GIANG')
                ->where('category.prices.sections.0.groups.0.tickets.0.adult.list', 150000)
                ->where('category.prices.sections.0.groups.0.tickets.0.adult.sale', 120000)
                ->where('category.prices.sections.0.groups.0.tickets.0.child.sale', 0)
                ->has('categories', 6)
            );
    }

    public function test_superdong_category_page_includes_price_tables(): void
    {
        $this->get(route('categories.show', 'tau-superdong-express'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Category')
                ->where('category.id', 'tau-superdong-express')
                ->where('category.prices.layout', 'ferry')
                ->has('category.prices.sections', 2)
                ->where('category.prices.sections.0.groups.0.tickets.0.name', 'Rạch Giá ↔ Phú Quốc')
                ->where('category.prices.sections.0.groups.0.tickets.0.vip.list', 500000)
                ->where('category.prices.sections.0.groups.0.tickets.0.vip.sale', 480000)
                ->where('category.prices.sections.0.groups.0.tickets.0.adult.sale', 305000)
                ->missing('category.prices.sections.1.groups.0.tickets.0.vip')
                ->has('categories', 6)
            );
    }

    public function test_sunset_sanato_category_page_includes_price_tables(): void
    {
        $this->get(route('categories.show', 'sunset-sanato'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Category')
                ->where('category.id', 'sunset-sanato')
                ->where('category.prices.validFrom', '2026-07-01')
                ->has('category.prices.sections.0.groups.0.tickets', 9)
                ->where('category.prices.sections.0.groups.0.tickets.0.name', 'Suset Chill Package')
                ->where('category.prices.sections.0.groups.0.tickets.0.adult.sale', 200000)
                ->where('category.prices.sections.0.groups.0.tickets.0.child.sale', 100000)
                ->missing('category.prices.sections.0.groups.0.tickets.6.child')
                ->has('categories', 6)
            );
    }

    public function test_cua_can_category_page_includes_price_tables(): void
    {
        $this->get(route('categories.show', 'thuyen-thung-kayak-cua-can'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Category')
                ->where('category.id', 'thuyen-thung-kayak-cua-can')
                ->has('category.prices.sections', 2)
                ->where('category.prices.sections.0.groups.0.tickets.0.name', 'Tham quan thuyền thúng')
                ->where('category.prices.sections.0.groups.0.tickets.0.adult.list', 200000)
                ->where('category.prices.sections.0.groups.0.tickets.0.adult.sale', 120000)
                ->where('category.prices.sections.0.groups.0.tickets.0.child.sale', 60000)
                ->has('category.prices.sections.1.groups.0.tickets', 6)
                ->has('categories', 6)
            );
    }

    public function test_home_lists_price_flag_without_full_tables(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Home')
                ->where('categories.0.hasPrices', true)
                ->where('categories.4.hasPrices', true)
                ->where('categories.5.hasPrices', true)
                ->missing('categories.0.prices')
                ->missing('categories.5.prices')
            );
    }

    public function test_unknown_category_returns_not_found(): void
    {
        $this->get('/danh-muc-khong-ton-tai')->assertNotFound();
    }
}
