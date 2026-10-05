<?php

namespace App\Support;

class HonThomCableCarPrices
{
    /**
     * @return array{validFrom: string, validFromLabel: string, notes: list<string>, sections: list<array<string, mixed>>}
     */
    public static function payload(): array
    {
        return [
            'validFrom' => '2026-01-01',
            'validFromLabel' => 'Giá hiện hành đến 9/11/2026; bảng dự kiến từ 10/11/2026. Wow Pass từ 1/1/2026.',
            'notes' => [
                'Trẻ em dưới 1m hoàn toàn miễn phí.',
                'Tất cả các loại vé vui chơi đều bao gồm Công Viên Nước & Công Viên Chủ Đề & Cầu Hôn',
                'Người lớn: chiều cao trên 1,4m. Trẻ em: từ 1m đến 1,4m.',
            ],
            'sections' => [
                [
                    'title' => 'Tổng hợp bảng giá đến 9/11/2026',
                    'subtitle' => 'Vé cáp treo Hòn Thơm, Sunset Town và nhà hàng Bavaria',
                    'groups' => [
                        [
                            'name' => 'Khu vực cáp treo',
                            'period' => 'Áp dụng từ 01/01/2026 đến khi có thông báo mới',
                            'tickets' => [
                                [
                                    'name' => 'Vé Hòn Thơm 02 Chiều',
                                    'note' => null,
                                    'promo' => 'Tặng vé Cầu Hôn + 1 phần bia Sun KarftBeer hoặc 1 đơn vị đồ uống khác',
                                    'adult' => ['list' => 850000, 'sale' => 765000],
                                    'child' => ['list' => 700000, 'sale' => 630000],
                                ],
                                [
                                    'name' => 'Combo Vé Hòn Thơm 01 Chiều + Buffet Mango',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 1070000, 'sale' => 900000],
                                    'child' => ['list' => 800000, 'sale' => 670000],
                                ],
                                [
                                    'name' => 'Combo Vé Hòn Thơm 02 Chiều + Buffet Mango',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 1150000, 'sale' => 970000],
                                    'child' => ['list' => 900000, 'sale' => 760000],
                                ],
                            ],
                        ],
                        [
                            'name' => 'Khu vực Sunset Town',
                            'period' => 'Áp dụng đến 09/11/2026',
                            'tickets' => [
                                [
                                    'name' => 'Vé tham quan Cầu Hôn',
                                    'note' => 'Khung giờ áp dụng từ 7h00 đến trước 17h30 hoặc sau 20h15',
                                    'promo' => 'Tặng vé Cầu Hôn',
                                    'adult' => ['list' => null, 'sale' => null],
                                    'child' => ['list' => null, 'sale' => null],
                                ],
                                [
                                    'name' => 'Vé Show Symphony of The Sea',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 660000, 'sale' => 400000],
                                    'child' => ['list' => 660000, 'sale' => 400000],
                                ],
                                [
                                    'name' => 'Vé Combo Kiss of The Sea 2 Ticket 1500K => 750.000 VND / Pax',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 750000, 'sale' => 575000],
                                    'child' => ['list' => 750000, 'sale' => 575000],
                                ],
                                [
                                    'name' => 'Vé Combo 2 Show: Symphony of The Sea + Kiss of The Sea',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 1200000, 'sale' => 900000],
                                    'child' => ['list' => 1200000, 'sale' => 900000],
                                ],
                            ],
                        ],
                        [
                            'name' => 'Khu vực nhà hàng Bavaria',
                            'period' => 'Áp dụng đến 09/11/2026',
                            'tickets' => [
                                [
                                    'name' => 'Vé Dinner Show bao gồm Symphony of The Sea + Set Dinner + Free Flow Drink ( đồ uống không giới hạn )',
                                    'note' => null,
                                    'promo' => 'Tặng vé Cầu Hôn',
                                    'adult' => ['list' => 1000000, 'sale' => 800000],
                                    'child' => ['list' => 1000000, 'sale' => 800000],
                                ],
                                [
                                    'name' => 'Vé Night Paradise bao gồm Vé Kiss Of The Sea + Set Dinner + Free Flow Drink ( đồ uống không giới hạn ) + Symphony of The Sea',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 1650000, 'sale' => 1300000],
                                    'child' => ['list' => 1650000, 'sale' => 1300000],
                                ],
                                [
                                    'name' => 'Vé Sun Paradise 2 Ngày bao gồm Vé Hòn Thơm 2 chiều + Buffet Mango + Vé Kiss Of The Sea + Symphony Of The Sea + Set Dinner + Free Flow Drink ( đồ uống không giới hạn )',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 2550000, 'sale' => 2050000],
                                    'child' => ['list' => 2250000, 'sale' => 1750000],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bảng giá dự kiến từ 10/11/2026',
                    'subtitle' => 'Cáp treo Hòn Thơm, Sunset Town và nhà hàng Bavaria',
                    'groups' => [
                        [
                            'name' => 'Khu vực cáp treo',
                            'period' => 'Áp dụng từ 01/01/2026 đến khi có thông báo mới',
                            'tickets' => [
                                [
                                    'name' => 'Vé Hòn Thơm 02 Chiều',
                                    'note' => null,
                                    'promo' => 'Tặng vé Cầu Hôn + 1 phần bia Sun KarftBeer hoặc 1 đơn vị đồ uống khác',
                                    'adult' => ['list' => 850000, 'sale' => 765000],
                                    'child' => ['list' => 700000, 'sale' => 630000],
                                ],
                                [
                                    'name' => 'Combo Vé Hòn Thơm 01 Chiều + Buffet Mango',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 1070000, 'sale' => 900000],
                                    'child' => ['list' => 800000, 'sale' => 670000],
                                ],
                                [
                                    'name' => 'Combo Vé Hòn Thơm 02 Chiều + Buffet Mango',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 1150000, 'sale' => 970000],
                                    'child' => ['list' => 900000, 'sale' => 760000],
                                ],
                            ],
                        ],
                        [
                            'name' => 'Khu vực Sunset Town',
                            'period' => 'Áp dụng từ 10/11/2026',
                            'tickets' => [
                                [
                                    'name' => 'Vé tham quan Cầu Hôn',
                                    'note' => 'Khung giờ áp dụng từ 7h00 đến trước 17h30 hoặc sau 20h15',
                                    'promo' => 'Tặng vé Cầu Hôn',
                                    'adult' => ['list' => null, 'sale' => null],
                                    'child' => ['list' => null, 'sale' => null],
                                ],
                                [
                                    'name' => 'Vé Show Symphony of The Sea',
                                    'note' => 'Vị trí xem Bãi biển Bắc Cầu Hôn, Mũi Tàu hoặc Khu vực do HTI chỉ định',
                                    'promo' => null,
                                    'adult' => ['list' => 660000, 'sale' => 400000],
                                    'child' => ['list' => 660000, 'sale' => 400000],
                                ],
                                [
                                    'name' => 'Vé Combo Kiss of The Sea 2 Ticket 1600K => 800.000 VND / Pax',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 800000, 'sale' => 625000],
                                    'child' => ['list' => 800000, 'sale' => 625000],
                                ],
                                [
                                    'name' => 'Vé Combo 2 Show: Symphony of The Sea + Kiss of The Sea',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 1350000, 'sale' => 950000],
                                    'child' => ['list' => 1350000, 'sale' => 950000],
                                ],
                            ],
                        ],
                        [
                            'name' => 'Khu vực nhà hàng Bavaria',
                            'period' => 'Áp dụng từ 10/11/2026',
                            'tickets' => [
                                [
                                    'name' => 'Chill Show bao gồm Symphony of The Sea + F&B',
                                    'note' => 'Vị trí xem bãi biển Vịnh Hoàng Hôn',
                                    'promo' => 'Tặng vé Cầu Hôn',
                                    'adult' => ['list' => 700000, 'sale' => 550000],
                                    'child' => ['list' => 700000, 'sale' => 550000],
                                ],
                                [
                                    'name' => 'Vé Dinner Show bao gồm Symphony of The Sea + Set Dinner + Free Flow Drink ( đồ uống không giới hạn )',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 1250000, 'sale' => 1000000],
                                    'child' => ['list' => 1250000, 'sale' => 1000000],
                                ],
                                [
                                    'name' => 'Vé Night Paradise bao gồm Vé Kiss Of The Sea + Set Dinner + Free Flow Drink ( đồ uống không giới hạn ) + Symphony of The Sea',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 1900000, 'sale' => 1500000],
                                    'child' => ['list' => 1900000, 'sale' => 1500000],
                                ],
                                [
                                    'name' => 'Vé Sun Paradise 2 Ngày bao gồm Vé Hòn Thơm 2 chiều + Buffet Mango + Vé Kiss Of The Sea + Symphony Of The Sea + Set Dinner + Free Flow Drink ( đồ uống không giới hạn )',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 2800000, 'sale' => 2250000],
                                    'child' => ['list' => 2500000, 'sale' => 1950000],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Wow Pass Hòn Thơm',
                    'subtitle' => 'Áp dụng từ 1/1/2026',
                    'groups' => [
                        [
                            'name' => 'Wow Pass',
                            'period' => 'Áp dụng từ 01/01/2026 đến khi có thông báo mới',
                            'tickets' => [
                                [
                                    'name' => 'Silver',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 300000, 'sale' => 270000],
                                    'child' => ['list' => 300000, 'sale' => 270000],
                                ],
                                [
                                    'name' => 'Gold',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 700000, 'sale' => 630000],
                                    'child' => ['list' => 700000, 'sale' => 630000],
                                ],
                                [
                                    'name' => 'Platinum',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 2500000, 'sale' => 2250000],
                                    'child' => ['list' => 1700000, 'sale' => 1530000],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
