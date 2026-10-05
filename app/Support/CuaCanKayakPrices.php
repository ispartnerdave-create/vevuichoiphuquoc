<?php

namespace App\Support;

class CuaCanKayakPrices
{
    /**
     * @return array{validFrom: string|null, validFromLabel: string, notes: list<string>, ageColumns: list<array{key: string, label: string, hint: string}>, sections: list<array<string, mixed>>}
     */
    public static function payload(): array
    {
        return [
            'validFrom' => null,
            'validFromLabel' => 'Bảng giá net thuyền thúng, kayak tại sông Cửa Cạn. Giá lữ hành chưa gồm VAT.',
            'firstColumnLabel' => 'Dịch vụ',
            'notes' => [
                'Trẻ em dưới 1m miễn phí. Trẻ em: chiều cao từ 1m đến 1,3m.',
                'Giá lữ hành chưa bao gồm VAT.',
                'Nhóm ẩm thực đặt tối thiểu từ 2 khách.',
            ],
            'ageColumns' => [
                ['key' => 'adult', 'label' => 'Người lớn', 'hint' => ''],
                ['key' => 'child', 'label' => 'Trẻ em', 'hint' => 'Từ 1m–1,3m'],
            ],
            'sections' => [
                [
                    'title' => 'Vé tiêu chuẩn',
                    'subtitle' => 'Thuyền thúng, thuyền máy, kayak và trải nghiệm tại sông Cửa Cạn',
                    'groups' => [
                        [
                            'name' => 'Vé tiêu chuẩn',
                            'period' => null,
                            'tickets' => [
                                [
                                    'name' => 'Tham quan thuyền thúng',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 200000, 'sale' => 120000],
                                    'child' => ['list' => 100000, 'sale' => 60000],
                                ],
                                [
                                    'name' => 'Tham quan thuyền máy',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 150000, 'sale' => 100000],
                                    'child' => ['list' => 75000, 'sale' => 50000],
                                ],
                                [
                                    'name' => 'Kayak',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 150000, 'sale' => 100000],
                                    'child' => ['list' => 75000, 'sale' => 50000],
                                ],
                                [
                                    'name' => 'Thả hoa đăng',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 150000, 'sale' => 100000],
                                    'child' => ['list' => 75000, 'sale' => 50000],
                                ],
                                [
                                    'name' => 'Dạy làm đèn lồng',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 180000, 'sale' => 120000],
                                    'child' => ['list' => 90000, 'sale' => 60000],
                                ],
                                [
                                    'name' => 'Thuyền thúng + thả hoa đăng',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 280000, 'sale' => 200000],
                                    'child' => ['list' => 140000, 'sale' => 100000],
                                ],
                                [
                                    'name' => 'Thuyền thúng + học làm đèn lồng',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 320000, 'sale' => 250000],
                                    'child' => ['list' => 160000, 'sale' => 125000],
                                ],
                                [
                                    'name' => 'Thuyền thúng + thả hoa đăng + Ăn nhẹ (Phở hoặc Cơm Gà)',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 330000, 'sale' => 250000],
                                    'child' => ['list' => 165000, 'sale' => 125000],
                                ],
                                [
                                    'name' => 'Thuyền thúng + cooking',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 380000, 'sale' => 300000],
                                    'child' => ['list' => 190000, 'sale' => 150000],
                                ],
                                [
                                    'name' => 'Thuyền thúng + Làm Đèn Lồng + Ăn nhẹ (Phở hoặc Cơm Gà)',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 400000, 'sale' => 300000],
                                    'child' => ['list' => 200000, 'sale' => 150000],
                                ],
                                [
                                    'name' => 'Thuyền Thúng + Làm Đèn Lồng + Cooking class',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 500000, 'sale' => 400000],
                                    'child' => ['list' => 250000, 'sale' => 200000],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Ẩm thực',
                    'subtitle' => 'Đặt tối thiểu từ 2 khách',
                    'groups' => [
                        [
                            'name' => 'Ẩm thực',
                            'period' => 'Đặt tối thiểu từ 2 khách',
                            'tickets' => [
                                [
                                    'name' => 'EcoTD5 - Cơm đoàn – 2 thực đơn lựa chọn',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 440000, 'sale' => 350000],
                                    'child' => ['list' => 220000, 'sale' => 175000],
                                ],
                                [
                                    'name' => 'EcoTD5 - Thực đơn lẩu – 2 thực đơn lựa chọn',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 500000, 'sale' => 400000],
                                    'child' => ['list' => 250000, 'sale' => 200000],
                                ],
                                [
                                    'name' => 'EcoTD1 - Lẩu hải sản ghẹ',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 560000, 'sale' => 450000],
                                    'child' => ['list' => 280000, 'sale' => 225000],
                                ],
                                [
                                    'name' => 'EcoTD2 - Lẩu hải sản cua',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 630000, 'sale' => 500000],
                                    'child' => ['list' => 315000, 'sale' => 250000],
                                ],
                                [
                                    'name' => 'EcoTD3 - Lẩu hải sản ghẹ + 1/2 tôm hùm',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 810000, 'sale' => 650000],
                                    'child' => ['list' => 405000, 'sale' => 325000],
                                ],
                                [
                                    'name' => 'EcoTD4 - Lẩu hải sản cua + 1/2 tôm hùm',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 880000, 'sale' => 700000],
                                    'child' => ['list' => 440000, 'sale' => 350000],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
