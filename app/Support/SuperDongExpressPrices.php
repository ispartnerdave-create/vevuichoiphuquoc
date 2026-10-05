<?php

namespace App\Support;

class SuperDongExpressPrices
{
    /**
     * @return array{validFrom: string|null, validFromLabel: string, notes: list<string>, ageColumns: list<array{key: string, label: string, hint: string}>, sections: list<array<string, mixed>>}
     */
    public static function payload(): array
    {
        return [
            'layout' => 'ferry',
            'validFrom' => null,
            'validFromLabel' => 'Giá vé một chiều đã giảm khi đặt qua chúng tôi, giá gạch ngang là giá niêm yết tại quầy.',
            'firstColumnLabel' => 'Tuyến',
            'notes' => [
                'Áp dụng khách hàng các tỉnh, thành Đông Nam Bộ (bao gồm Thành Phố Hồ Chí Mình), Tây Nam Bộ, Tây Nguyên',
                'Trẻ em dưới 6 tuổi hoàn toàn miễn phí.',
            ],
            'ageColumns' => [
                ['key' => 'vip', 'label' => 'VIP', 'hint' => ''],
                ['key' => 'adult', 'label' => 'Người lớn', 'hint' => ''],
                ['key' => 'child', 'label' => 'Trẻ em', 'hint' => 'Dưới 6 tuổi miễn phí'],
                ['key' => 'senior', 'label' => 'Cao tuổi', 'hint' => ''],
            ],
            'sections' => [
                [
                    'title' => 'Tàu Express',
                    'subtitle' => 'Tuyến Rạch Giá, Hà Tiên – Phú Quốc',
                    'groups' => [
                        [
                            'name' => 'Tàu Express',
                            'period' => null,
                            'tickets' => [
                                [
                                    'name' => 'Rạch Giá ↔ Phú Quốc',
                                    'note' => 'Thời gian chạy: 2 tiếng 20 phút',
                                    'promo' => null,
                                    'departures' => [
                                        ['direction' => 'Rạch Giá → Phú Quốc', 'times' => '07h00; 10h20; 13h00'],
                                        ['direction' => 'Phú Quốc → Rạch Giá', 'times' => '07h10; 10h00; 13h20'],
                                    ],
                                    'vip' => ['list' => 500000, 'sale' => 480000],
                                    'adult' => ['list' => 315000, 'sale' => 305000],
                                    'child' => ['list' => 225000, 'sale' => 220000],
                                    'senior' => ['list' => 265000, 'sale' => 260000],
                                ],
                                [
                                    'name' => 'Hà Tiên ↔ Phú Quốc',
                                    'note' => 'Thời gian chạy: 1 tiếng 15 phút',
                                    'promo' => null,
                                    'departures' => [
                                        ['direction' => 'Hà Tiên → Phú Quốc', 'times' => '06h40; 08h55; 11h45; 13h45'],
                                        ['direction' => 'Phú Quốc → Hà Tiên', 'times' => '06h50; 09h00; 11h45; 14h00'],
                                    ],
                                    'vip' => ['list' => 330000, 'sale' => 320000],
                                    'adult' => ['list' => 216000, 'sale' => 206000],
                                    'child' => ['list' => 148000, 'sale' => 143000],
                                    'senior' => ['list' => 182000, 'sale' => 177000],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Tàu SuperDong',
                    'subtitle' => 'Tuyến Rạch Giá, Hà Tiên – Phú Quốc',
                    'groups' => [
                        [
                            'name' => 'Tàu SuperDong',
                            'period' => null,
                            'tickets' => [
                                [
                                    'name' => 'Rạch Giá ↔ Phú Quốc',
                                    'note' => 'Thời gian chạy: 2 tiếng 20 phút',
                                    'promo' => null,
                                    'departures' => [
                                        ['direction' => 'Rạch Giá → Phú Quốc', 'times' => '07h00; 10h30; 13h10'],
                                        ['direction' => 'Phú Quốc → Rạch Giá', 'times' => '07h20; 10h10; 13h30'],
                                    ],
                                    'adult' => ['list' => 324000, 'sale' => 314000],
                                    'child' => ['list' => 235000, 'sale' => 230000],
                                    'senior' => ['list' => 274000, 'sale' => 269000],
                                ],
                                [
                                    'name' => 'Hà Tiên ↔ Phú Quốc',
                                    'note' => 'Thời gian chạy: 1 tiếng 20 phút',
                                    'promo' => null,
                                    'departures' => [
                                        ['direction' => 'Hà Tiên → Phú Quốc', 'times' => '06h10; 08h20; 9h50; 13h15'],
                                        ['direction' => 'Phú Quốc → Hà Tiên', 'times' => '8h00; 10h10; 13h30'],
                                    ],
                                    'adult' => ['list' => 225000, 'sale' => 215000],
                                    'child' => ['list' => 157000, 'sale' => 152000],
                                    'senior' => ['list' => 191000, 'sale' => 186000],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
