<?php

namespace App\Support;

class IceJunglePrices
{
    /**
     * @return array{validFrom: string, validFromLabel: string, notes: list<string>, ageColumns: list<array{key: string, label: string, hint: string}>, sections: list<array<string, mixed>>}
     */
    public static function payload(): array
    {
        return [
            'validFrom' => '2026-01-01',
            'validFromLabel' => 'Áp dụng từ 1/1/2026.',
            'notes' => [
                'Trẻ em chiều cao dưới 1m miễn phí.',
                'Vé tiêu chuẩn: chiều cao trên 1m.',
            ],
            'ageColumns' => [
                ['key' => 'adult', 'label' => 'Vé tiêu chuẩn', 'hint' => 'Chiều cao trên 1m'],
                ['key' => 'child', 'label' => 'Trẻ em', 'hint' => 'Chiều cao dưới 1m'],
            ],
            'sections' => [
                [
                    'title' => 'Vé Ice Jungle',
                    'subtitle' => 'Áp dụng từ 1/1/2026',
                    'groups' => [
                        [
                            'name' => 'ICE JUNGLE',
                            'period' => 'Áp dụng từ 01/01/2026',
                            'tickets' => [
                                [
                                    'name' => 'ICE JUNGLE KIÊN GIANG',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 150000, 'sale' => 120000],
                                    'child' => ['list' => 0, 'sale' => 0],
                                ],
                                [
                                    'name' => 'ICE JUNGLE TOÀN QUỐC & QUỐC TẾ',
                                    'note' => null,
                                    'promo' => null,
                                    'adult' => ['list' => 200000, 'sale' => 160000],
                                    'child' => ['list' => 0, 'sale' => 0],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
