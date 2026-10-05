<?php

namespace App\Support;

class SunsetSanatoPrices
{
    /**
     * @return array{validFrom: string, validFromLabel: string, notes: list<string>, ageColumns: list<array{key: string, label: string, hint: string}>, sections: list<array<string, mixed>>}
     */
    public static function payload(): array
    {
        return [
            'validFrom' => '2026-07-01',
            'validFromLabel' => 'Áp dụng từ 1/7/2026.',
            'firstColumnLabel' => 'Gói vé',
            'singlePrice' => true,
            'notes' => [
                'Người lớn: từ 12 tuổi trở lên. Trẻ em: 6–11 tuổi.',
                'Một số combo: trẻ dưới 1,3m vào miễn phí; đồ uống, kem hoặc dừa dùng thêm tính phí tại quầy.',
            ],
            'ageColumns' => [
                ['key' => 'adult', 'label' => 'Người lớn', 'hint' => 'Từ 12 tuổi trở lên'],
                ['key' => 'child', 'label' => 'Trẻ em', 'hint' => '6–11 tuổi'],
            ],
            'sections' => [
                [
                    'title' => 'Vé Sunset Sanato',
                    'subtitle' => 'Áp dụng từ 1/7/2026',
                    'groups' => [
                        [
                            'name' => 'Vé Sunset Sanato',
                            'period' => 'Áp dụng từ 01/07/2026',
                            'tickets' => [
                                [
                                    'name' => 'Suset Chill Package',
                                    'note' => null,
                                    'tagline' => 'Thư Giãn Cùng Hoàng Hôn',
                                    'promo' => null,
                                    'includes' => [
                                        'Check in cầu ngắm hoàng hôn',
                                        'Bữa ăn nhẹ đi kèm',
                                        'Ham & Cheese toast + French fries + Tuna baguette + Dark & white chocolate tart + 02 types of fresh fruits',
                                        'Đồ uống đóng chai',
                                        'SOFT DRINK: Pepsi, Pepsi Light, 7UP, Mirinda Cam, Soda.(01 Beverage per person)',
                                        'Tắm biển và tráng nước ngọt',
                                    ],
                                    'adult' => ['list' => 200000, 'sale' => 200000],
                                    'child' => ['list' => 100000, 'sale' => 100000],
                                ],
                                [
                                    'name' => 'Trà Chiều',
                                    'note' => null,
                                    'tagline' => null,
                                    'promo' => null,
                                    'includes' => [
                                        'Check in cầu ngắm hoàng hôn',
                                        'Bữa ăn nhẹ đi kèm',
                                        'Ham & Cheese toast + Smoke Chicken burrito + Tuna baguette + Dark & white chocolate tart + 02 types of fresh fruits',
                                        'Đồ uống đóng chai',
                                        'LOCAL BEER, or SOFT DRINK, or TEA, or COFFEE (01 Beverage per person)',
                                        'Tắm biển và tráng nước ngọt',
                                    ],
                                    'adult' => ['list' => 200000, 'sale' => 200000],
                                    'child' => ['list' => 100000, 'sale' => 100000],
                                ],
                                [
                                    'name' => 'Sunset Fun Pass',
                                    'note' => null,
                                    'tagline' => 'Combo Hoàng Hôn Vui Chơi',
                                    'promo' => null,
                                    'includes' => [
                                        'Check in cầu ngắm hoàng hôn',
                                        'Bữa ăn nhẹ đi kèm & 1 phần snack cá tôm bột chiên',
                                        'Ham & Cheese toast + Tuna baguette + Fish and CHIP + Dark & white chocolate tart + 02 types of fresh fruits',
                                        'Đồ uống đóng chai',
                                        'SOFT DRINK : Pepsi,7Up,Mirinda Cam, Soda, Pepsi light (01 Beverage per person)',
                                        'Tắm biển và tráng nước ngọt',
                                        'Kid club (dành cho trẻ em)',
                                        'Sử dụng hồ bơi',
                                    ],
                                    'adult' => ['list' => 250000, 'sale' => 250000],
                                    'child' => ['list' => 125000, 'sale' => 125000],
                                ],
                                [
                                    'name' => 'Sunset Paradise Package',
                                    'note' => null,
                                    'tagline' => 'Thiên Đường Ngắm Hoàng Hôn',
                                    'promo' => null,
                                    'includes' => [
                                        'Check in cầu ngắm hoàng hôn',
                                        'Bữa ăn nhẹ kèm 1 phần snack tôm chiên xù',
                                        'Ham & Cheese toast + Tuna baguette + Crispy Breaded Shrimp + Dark & white chocolate tart + 02 types of fresh fruits',
                                        'Đồ uống đóng chai',
                                        'SOFT DRINK: Pepsi, Pepsi Light, 7UP, Mirinda Cam, Soda + 1 Kem bất kỳ (01 Beverage per person)',
                                        'Tắm biển và tráng nước ngọt',
                                        'Kid club (dành cho trẻ em)',
                                        'Sử dụng hồ bơi',
                                        'Thưởng thức kem tại bar biển ngắm hoàng hôn',
                                    ],
                                    'adult' => ['list' => 300000, 'sale' => 300000],
                                    'child' => ['list' => 150000, 'sale' => 150000],
                                ],
                                [
                                    'name' => 'Trà Chiều Smoothie',
                                    'note' => null,
                                    'tagline' => null,
                                    'promo' => null,
                                    'includes' => [
                                        'Check in cầu ngắm hoàng hôn',
                                        'Bữa ăn nhẹ đi kèm',
                                        'Ham & Cheese toast + Smoke Chicken burrito + Tuna baguette + Dark & white chocolate tart + 02 types of fresh fruits',
                                        'Đồ uống',
                                        'PINEAPPLE SMOOTHIE, or PASSION FRUIT SMOOTHIE, or COCONUT JUICE',
                                        'Tắm biển và tráng nước ngọt',
                                    ],
                                    'adult' => ['list' => 250000, 'sale' => 250000],
                                    'child' => ['list' => 125000, 'sale' => 125000],
                                ],
                                [
                                    'name' => 'Sunset Pizza Combo',
                                    'note' => 'Áp dụng cho booking số chẵn 2, 4, 6,...',
                                    'tagline' => null,
                                    'promo' => null,
                                    'includes' => [
                                        'Check in cầu ngắm hoàng hôn',
                                        'Tặng 1 pizza tự chọn trên menu (size 20cm - 22cm)',
                                        'Margherita pizza, Napoli pizza, Hawaiian pizza, Piccolo pizza, Four cheese pizza, Mondello pizza, Frutti di mare pizza',
                                        'Tặng 2 đồ uống đóng chai',
                                        'SOFT DRINK: Pepsi, Pepsi Light, 7UP, Mirinda Cam, Soda + 1 Kem bất kỳ (01 Beverage per person)',
                                        'Tắm biển và tráng nước ngọt',
                                    ],
                                    'adult' => ['list' => 320000, 'sale' => 320000],
                                    'child' => ['list' => 160000, 'sale' => 160000],
                                ],
                                [
                                    'name' => 'Combo Kem',
                                    'note' => 'Trẻ dưới 1,3m vào miễn phí; nếu dùng đồ uống/kem/dừa tính phí tại quầy.',
                                    'tagline' => null,
                                    'promo' => null,
                                    'includes' => [
                                        'Check in bãi biển ngắm hoàng hôn tặng kèm 1 phần kem tự chọn',
                                        'Kem Dừa/ Kem ôc quế black white/ Kem ôc quế Chocolate/ Kem ốc quế Dâu/ Kem ốc quế vannila',
                                    ],
                                    'adult' => ['list' => 120000, 'sale' => 120000],
                                ],
                                [
                                    'name' => 'Combo Soft Drink',
                                    'note' => 'Trẻ dưới 1,3m vào miễn phí; nếu dùng đồ uống/kem/dừa tính phí tại quầy.',
                                    'tagline' => null,
                                    'promo' => null,
                                    'includes' => [
                                        'Check in bãi biển ngắm hoàng hôn tặng kèm 1 phần đồ uống',
                                        'SOFT DRINKS : Pepsi, Pepsi Light, 7UP, Mirinda Cam, Soda (01 Beverage per person)',
                                    ],
                                    'adult' => ['list' => 120000, 'sale' => 120000],
                                ],
                                [
                                    'name' => 'Combo Dừa tươi',
                                    'note' => 'Trẻ dưới 1,3m vào miễn phí; nếu dùng đồ uống/kem/dừa tính phí tại quầy. Đặt trước 2 ngày và thanh toán trước.',
                                    'tagline' => null,
                                    'promo' => null,
                                    'includes' => [
                                        'Check in bãi biển ngắm hoàng hôn tặng kèm 1 phần dừa tươi',
                                        'Dừa tươi Logo Sunset (01 Beverage per person)',
                                    ],
                                    'adult' => ['list' => 140000, 'sale' => 140000],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
