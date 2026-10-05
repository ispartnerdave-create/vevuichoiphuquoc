<?php

namespace App\Support;

class VinWondersSafariPrices
{
    /**
     * @return array{validFrom: string, validFromLabel: string, notes: list<string>, sections: list<array<string, mixed>>}
     */
    public static function payload(): array
    {
        return [
            'validFrom' => '2026-10-01',
            'validFromLabel' => 'Áp dụng từ 1/10/2026',
            'notes' => [
                'Trẻ em dưới 1m hoàn toàn miễn phí.',
                'Người lớn: chiều cao trên 1,4m. Trẻ em: từ 1m đến 1,4m. Cao tuổi: trên 60 tuổi.',
            ],
            'sections' => [
                [
                    'title' => 'Vé tiêu chuẩn',
                    'subtitle' => 'Áp dụng từ 1/10/2026',
                    'groups' => [
                        [
                            'name' => 'VinWonders & Safari Phú Quốc',
                            'tickets' => [
                                [
                                    'name' => 'Safari Phú Quốc',
                                    'promo' => 'Tặng kèm vé Bảo Tàng Gấu',
                                    'adult' => ['list' => 950000, 'sale' => 874000],
                                    'child' => ['list' => 710000, 'sale' => 653200],
                                    'senior' => ['list' => 710000, 'sale' => 653200],
                                ],
                                [
                                    'name' => 'VinWonders Phú Quốc',
                                    'promo' => 'Tặng kèm vé Bảo Tàng Gấu',
                                    'adult' => ['list' => 1050000, 'sale' => 966000],
                                    'child' => ['list' => 800000, 'sale' => 736000],
                                    'senior' => ['list' => 800000, 'sale' => 736000],
                                ],
                                [
                                    'name' => 'Combo 02 khu: VinWonders và Safari 01 NGÀY',
                                    'promo' => null,
                                    'adult' => ['list' => 1500000, 'sale' => 1380000],
                                    'child' => ['list' => 1100000, 'sale' => 1012000],
                                    'senior' => ['list' => 1100000, 'sale' => 1012000],
                                ],
                                [
                                    'name' => 'Combo 02 khu: VinWonders và Safari 02 NGÀY',
                                    'promo' => 'Tặng kèm vé Bảo Tàng Gấu',
                                    'adult' => ['list' => 1700000, 'sale' => 1564000],
                                    'child' => ['list' => 1300000, 'sale' => 1196000],
                                    'senior' => ['list' => 1300000, 'sale' => 1196000],
                                ],
                                [
                                    'name' => 'Gói ALL IN ONE Gồm: Vé VinWonders và Safari Phú Quốc + Chèo thuyền trên sông Venice + Tinh Hoa Việt Nam 02 NGÀY',
                                    'promo' => 'Tặng kèm vé Bảo Tàng Gấu',
                                    'adult' => ['list' => 2000000, 'sale' => 1840000],
                                    'child' => ['list' => 1500000, 'sale' => 1380000],
                                    'senior' => ['list' => 1500000, 'sale' => 1380000],
                                ],
                                [
                                    'name' => 'Vé Night Safari Phú Quốc',
                                    'promo' => null,
                                    'adult' => ['list' => 950000, 'sale' => 874000],
                                    'child' => ['list' => 710000, 'sale' => 653200],
                                    'senior' => ['list' => 710000, 'sale' => 653200],
                                ],
                            ],
                        ],
                        [
                            'name' => 'Combo Vé + Xe Fastpass',
                            'tickets' => [
                                [
                                    'name' => 'Vé Safari Phú Quốc + Xe Zoo Trạm + Lối vào cổng ưu tiên tại Safari',
                                    'promo' => 'Tặng kèm vé Bảo Tàng Gấu',
                                    'adult' => ['list' => 1200000, 'sale' => 1110000],
                                    'child' => ['list' => 960000, 'sale' => 890000],
                                    'senior' => ['list' => 960000, 'sale' => 890000],
                                ],
                                [
                                    'name' => 'Vé Vinwonders Phú Quốc + Xe Buggy + Lối vào cổng ưu tiên tại VinWonders',
                                    'promo' => null,
                                    'adult' => ['list' => 1300000, 'sale' => 1200000],
                                    'child' => ['list' => 1050000, 'sale' => 970000],
                                    'senior' => ['list' => 1050000, 'sale' => 970000],
                                ],
                                [
                                    'name' => 'Vé Combo VinWonders & Safari Phú Quốc 01 NGÀY + Xe Zoo Trạm + Xe Buggy + Lối vào cổng ưu tiên tại VinWonders & Safari',
                                    'promo' => null,
                                    'adult' => ['list' => 2000000, 'sale' => 1850000],
                                    'child' => ['list' => 1600000, 'sale' => 1490000],
                                    'senior' => ['list' => 1600000, 'sale' => 1490000],
                                ],
                            ],
                        ],
                        [
                            'name' => 'Grand World Phú Quốc',
                            'tickets' => [
                                [
                                    'name' => 'Vé Show Tinh Hoa Việt Nam',
                                    'promo' => null,
                                    'adult' => ['list' => 300000, 'sale' => 255000],
                                    'child' => ['list' => 230000, 'sale' => 195500],
                                    'senior' => ['list' => 230000, 'sale' => 195500],
                                ],
                                [
                                    'name' => 'Vé Tham Quan Bảo Tàng Gấu',
                                    'promo' => null,
                                    'adult' => ['list' => 200000, 'sale' => 170000],
                                    'child' => ['list' => 150000, 'sale' => 127500],
                                    'senior' => ['list' => 150000, 'sale' => 127500],
                                ],
                                [
                                    'name' => 'Vé Chèo Thuyền Trên Sông Venice',
                                    'promo' => null,
                                    'adult' => ['list' => 200000, 'sale' => 170000],
                                    'child' => ['list' => 150000, 'sale' => 127500],
                                    'senior' => ['list' => 150000, 'sale' => 127500],
                                ],
                                [
                                    'name' => 'Combo Vé Tinh Hoa Việt Nam & Bảo Tàng Gấu',
                                    'promo' => null,
                                    'adult' => ['list' => 450000, 'sale' => 382500],
                                    'child' => ['list' => 340000, 'sale' => 289000],
                                    'senior' => ['list' => 340000, 'sale' => 289000],
                                ],
                                [
                                    'name' => 'Combo Chèo Thuyền Trên Sông Venice + Bảo tàng gấu',
                                    'promo' => null,
                                    'adult' => ['list' => 300000, 'sale' => 255000],
                                    'child' => ['list' => 225000, 'sale' => 191250],
                                    'senior' => ['list' => 225000, 'sale' => 191250],
                                ],
                                [
                                    'name' => 'Combo Chèo Thuyền Trên Sông Venice + Tinh hoa Việt Nam',
                                    'promo' => null,
                                    'adult' => ['list' => 400000, 'sale' => 340000],
                                    'child' => ['list' => 300000, 'sale' => 255000],
                                    'senior' => ['list' => 300000, 'sale' => 255000],
                                ],
                                [
                                    'name' => 'Combo Chèo Thuyền Trên Sông Venice + Tinh hoa Việt Nam + Bảo tàng gấu',
                                    'promo' => null,
                                    'adult' => ['list' => 500000, 'sale' => 425000],
                                    'child' => ['list' => 380000, 'sale' => 323000],
                                    'senior' => ['list' => 380000, 'sale' => 323000],
                                ],
                                [
                                    'name' => 'Gói Daily Tour GrandWorld - Phú Quốc Trọn Vị',
                                    'promo' => null,
                                    'adult' => ['list' => 350000, 'sale' => 280000],
                                    'child' => ['list' => 350000, 'sale' => 280000],
                                    'senior' => ['list' => 350000, 'sale' => 280000],
                                ],
                                [
                                    'name' => 'Gói Daily Tour GrandWorld - Phú Quốc Hết Ý',
                                    'promo' => null,
                                    'adult' => ['list' => 350000, 'sale' => 280000],
                                    'child' => ['list' => 350000, 'sale' => 280000],
                                    'senior' => ['list' => 350000, 'sale' => 280000],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Combo vé + ẩm thực',
                    'subtitle' => 'Áp dụng từ 1/10/2026',
                    'groups' => [
                        [
                            'name' => 'VinWonders & Ẩm Thực',
                            'tickets' => [
                                [
                                    'name' => 'Vé vào cửa VinWonders Phú Quốc + Buffet 350K',
                                    'promo' => 'Tặng kèm vé Bảo Tàng Gấu',
                                    'adult' => ['list' => 1330000, 'sale' => 1223600],
                                    'child' => ['list' => 930000, 'sale' => 855600],
                                    'senior' => ['list' => 1100000, 'sale' => 1012000],
                                ],
                                [
                                    'name' => 'Vé vào cửa VinWonders Phú Quốc + Set Menu 800K Deep Sea',
                                    'promo' => null,
                                    'adult' => ['list' => 1760000, 'sale' => 1619200],
                                    'child' => ['list' => 1520000, 'sale' => 1398400],
                                    'senior' => ['list' => 1520000, 'sale' => 1398400],
                                ],
                            ],
                        ],
                        [
                            'name' => 'Safari & Ẩm Thực',
                            'tickets' => [
                                [
                                    'name' => 'Vé vào cửa Safari Phú Quốc + Set Menu 250K',
                                    'promo' => 'Tặng kèm vé Bảo Tàng Gấu',
                                    'adult' => ['list' => 1140000, 'sale' => 1048800],
                                    'child' => ['list' => 800000, 'sale' => 736000],
                                    'senior' => ['list' => 920000, 'sale' => 846400],
                                ],
                                [
                                    'name' => 'Vé vào cửa Safari Phú Quốc + Set Menu 300K',
                                    'promo' => null,
                                    'adult' => ['list' => 1190000, 'sale' => 1094800],
                                    'child' => ['list' => 820000, 'sale' => 754400],
                                    'senior' => ['list' => 960000, 'sale' => 883200],
                                ],
                                [
                                    'name' => 'Vé vào cửa Safari Phú Quốc + Set Menu 350K',
                                    'promo' => null,
                                    'adult' => ['list' => 1240000, 'sale' => 1140800],
                                    'child' => ['list' => 850000, 'sale' => 782000],
                                    'senior' => ['list' => 1010000, 'sale' => 929200],
                                ],
                                [
                                    'name' => 'Vé vào cửa Safari Phú Quốc + Set Menu 400K',
                                    'promo' => null,
                                    'adult' => ['list' => 1290000, 'sale' => 1186800],
                                    'child' => ['list' => 870000, 'sale' => 800400],
                                    'senior' => ['list' => 1060000, 'sale' => 975200],
                                ],
                            ],
                        ],
                        [
                            'name' => 'Combo VinWonders & Safari & Ẩm thực',
                            'tickets' => [
                                [
                                    'name' => 'Vé vào cửa Combo VinWonders & Safari 1 NGÀY Phú Quốc + Set Menu 250K tại Safari',
                                    'promo' => null,
                                    'adult' => ['list' => 1660000, 'sale' => 1527200],
                                    'child' => ['list' => 1160000, 'sale' => 1067200],
                                    'senior' => ['list' => 1280000, 'sale' => 1177600],
                                ],
                                [
                                    'name' => 'Vé vào cửa Combo VinWonders & Safari 1 NGÀY Phú Quốc + Set Menu 300K tại Safari',
                                    'promo' => null,
                                    'adult' => ['list' => 1710000, 'sale' => 1573200],
                                    'child' => ['list' => 1190000, 'sale' => 1094800],
                                    'senior' => ['list' => 1330000, 'sale' => 1223600],
                                ],
                                [
                                    'name' => 'Vé vào cửa Combo VinWonders & Safari 1 NGÀY Phú Quốc + Set Menu 350K tại Safari hoặc Buffet 350K tại VinWonders',
                                    'promo' => null,
                                    'adult' => ['list' => 1760000, 'sale' => 1619200],
                                    'child' => ['list' => 1210000, 'sale' => 1113200],
                                    'senior' => ['list' => 1380000, 'sale' => 1269600],
                                ],
                                [
                                    'name' => 'Vé vào cửa Combo VinWonders & Safari 1 NGÀY Phú Quốc + Set Menu 400K tại Safari',
                                    'promo' => null,
                                    'adult' => ['list' => 1810000, 'sale' => 1665200],
                                    'child' => ['list' => 1240000, 'sale' => 1140800],
                                    'senior' => ['list' => 1430000, 'sale' => 1315600],
                                ],
                                [
                                    'name' => 'Vé vào cửa Combo VinWonders & Safari 1 NGÀY Phú Quốc + Set Menu 800K tại Deep Sea',
                                    'promo' => null,
                                    'adult' => ['list' => 2190000, 'sale' => 2014800],
                                    'child' => ['list' => 1810000, 'sale' => 1665200],
                                    'senior' => ['list' => 1810000, 'sale' => 1665200],
                                ],
                                [
                                    'name' => 'Vé vào cửa Combo VinWonders & Safari 2 NGÀY + Set Menu 250K tại Safari',
                                    'promo' => 'Tặng kèm vé Bảo Tàng Gấu',
                                    'adult' => ['list' => 1860000, 'sale' => 1711200],
                                    'child' => ['list' => 1360000, 'sale' => 1251200],
                                    'senior' => ['list' => 1480000, 'sale' => 1361600],
                                ],
                                [
                                    'name' => 'Vé vào cửa Combo VinWonders & Safari 2 NGÀY + Set Menu 300K tại Safari',
                                    'promo' => null,
                                    'adult' => ['list' => 1900000, 'sale' => 1748000],
                                    'child' => ['list' => 1380000, 'sale' => 1269600],
                                    'senior' => ['list' => 1520000, 'sale' => 1398400],
                                ],
                                [
                                    'name' => 'Vé vào cửa Combo VinWonders & Safari 2 NGÀY + Set Menu 350K tại Safari hoặc Buffet 350K tại VinWonders',
                                    'promo' => null,
                                    'adult' => ['list' => 1950000, 'sale' => 1794000],
                                    'child' => ['list' => 1410000, 'sale' => 1297200],
                                    'senior' => ['list' => 1570000, 'sale' => 1444400],
                                ],
                                [
                                    'name' => 'Vé vào cửa Combo VinWonders & Safari 2 NGÀY + Set Menu 400K tại Safari',
                                    'promo' => null,
                                    'adult' => ['list' => 2000000, 'sale' => 1840000],
                                    'child' => ['list' => 1430000, 'sale' => 1315600],
                                    'senior' => ['list' => 1620000, 'sale' => 1490400],
                                ],
                                [
                                    'name' => 'Vé vào cửa Combo VinWonders & Safari 2 NGÀY + Set Menu 800K tại Deep Sea',
                                    'promo' => null,
                                    'adult' => ['list' => 2380000, 'sale' => 2189600],
                                    'child' => ['list' => 2000000, 'sale' => 1840000],
                                    'senior' => ['list' => 2000000, 'sale' => 1840000],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
