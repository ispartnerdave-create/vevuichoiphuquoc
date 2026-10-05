<?php

namespace App\Support;

class CategoryCatalog
{
    /**
     * @return list<array<string, mixed>>
     */
    public static function all(): array
    {
        return [
            [
                'id' => 'vinwonders-safari-grandworld',
                'name' => 'VinWonders & Safari – GrandWorld Phú Quốc',
                'tagline' => 'Siêu công viên, safari và Grand World trên một đảo',
                'description' => 'Combo vui chơi lớn nhất đảo ngọc: VinWonders, Vinpearl Safari và Grand World. Bảng giá tiêu chuẩn và combo ẩm thực áp dụng từ 1/10/2026.',
                'location' => 'Bãi Dài, Phú Quốc',
                'image' => '/images/vinwonders-safari.jpg',
                'icon' => 'ferris',
                'hasPrices' => true,
            ],
            [
                'id' => 'cap-treo-hon-thom',
                'name' => 'Cáp Treo Hòn Thơm Phú Quốc',
                'tagline' => 'Cáp treo vượt biển dài nhất thế giới',
                'description' => 'Cáp treo An Thới – Hòn Thơm, công viên nước, Sunset Town và show Kiss/Symphony of The Sea. Bảng giá hiện hành đến 9/11/2026 và dự kiến từ 10/11/2026.',
                'location' => 'An Thới, Phú Quốc',
                'image' => '/images/hon-thom.jpg',
                'icon' => 'cable',
                'hasPrices' => true,
            ],
            [
                'id' => 'ice-jungle',
                'name' => 'Ice Jungle Phú Quốc',
                'tagline' => 'Công viên ánh sáng và trải nghiệm băng',
                'description' => 'Ice Jungle tại Sunset Town / An Thới: không gian ánh sáng, đường đi tương tác. Vé Kiên Giang và vé toàn quốc & quốc tế áp dụng từ 1/1/2026; trẻ em dưới 1m miễn phí.',
                'location' => 'An Thới, Phú Quốc',
                'image' => '/images/ice-jungle.jpg',
                'icon' => 'snow',
                'hasPrices' => true,
            ],
            [
                'id' => 'tau-superdong-express',
                'name' => 'Vé Tàu Superdong & Express Phú Quốc',
                'tagline' => 'Tàu cao tốc Rạch Giá, Hà Tiên - Phú Quốc',
                'description' => 'Vé tàu cao tốc Express và SuperDong tuyến Rạch Giá – Phú Quốc và Hà Tiên – Phú Quốc, kèm giờ khởi hành. Trẻ em dưới 6 tuổi miễn phí.',
                'location' => 'Bến Bãi Vòng, Phú Quốc',
                'image' => '/images/superdong.jpg',
                'icon' => 'ship',
                'hasPrices' => true,
            ],
            [
                'id' => 'sunset-sanato',
                'name' => 'Vé Sunset Sanato Phú Quốc',
                'tagline' => 'Beach club ngắm hoàng hôn Bãi Trường',
                'description' => 'Sunset Sanato Beach Club tại Bãi Trường: gói chill, trà chiều, fun pass, paradise, pizza và combo kem/nước. Bảng giá áp dụng từ 1/7/2026.',
                'location' => 'Bãi Trường, Phú Quốc',
                'image' => '/images/sunset-sanato.jpg',
                'icon' => 'sunset',
                'hasPrices' => true,
            ],
            [
                'id' => 'thuyen-thung-kayak-cua-can',
                'name' => 'Vé Thuyền Thúng & Kayak Cửa Cạn Phú Quốc',
                'tagline' => 'Sông Cửa Cạn, rừng ngập mặn, làng chài',
                'description' => 'Thuyền thúng, thuyền máy, kayak, hoa đăng, đèn lồng và ẩm thực tại sông Cửa Cạn. Trẻ em dưới 1m miễn phí. Nhóm ẩm thực đặt tối thiểu 2 khách.',
                'location' => 'Cửa Cạn, Phú Quốc',
                'image' => '/images/cua-can.jpg',
                'icon' => 'kayak',
                'hasPrices' => true,
            ],
        ];
    }

    /**
     * @return array<string, mixed>|null
     */
    public static function find(string $id): ?array
    {
        foreach (self::all() as $category) {
            if ($category['id'] === $id) {
                $prices = self::pricesFor($id);

                if ($prices !== null) {
                    $category['prices'] = $prices;
                }

                return $category;
            }
        }

        return null;
    }

    /**
     * @return array<string, mixed>|null
     */
    private static function pricesFor(string $id): ?array
    {
        return match ($id) {
            'vinwonders-safari-grandworld' => VinWondersSafariPrices::payload(),
            'cap-treo-hon-thom' => HonThomCableCarPrices::payload(),
            'ice-jungle' => IceJunglePrices::payload(),
            'tau-superdong-express' => SuperDongExpressPrices::payload(),
            'sunset-sanato' => SunsetSanatoPrices::payload(),
            'thuyen-thung-kayak-cua-can' => CuaCanKayakPrices::payload(),
            default => null,
        };
    }

    /**
     * @return list<string>
     */
    public static function ids(): array
    {
        return array_column(self::all(), 'id');
    }

    /**
     * @return list<array{question: string, answer: string}>
     */
    public static function faqs(): array
    {
        return [
            [
                'question' => 'Trang này bán vé những gì ở Phú Quốc?',
                'answer' => 'Sáu danh mục: VinWonders & Safari – Grand World, cáp treo Hòn Thơm, Ice Jungle, tàu Superdong & Express, Sunset Sanato, thuyền thúng và kayak Cửa Cạn.',
            ],
            [
                'question' => 'Bảng giá chi tiết lấy ở đâu?',
                'answer' => 'Cả sáu danh mục đều có bảng giá trên từng trang. Nhắn Zalo 0379 324 928 hoặc gọi hotline để nhân viên xác nhận theo ngày đi.',
            ],
            [
                'question' => 'Vé điện tử dùng thế nào?',
                'answer' => 'Sau khi xác nhận, bạn nhận mã QR hoặc hướng dẫn qua Zalo/email. Đưa mã tại cổng, ga cáp treo hoặc bến tàu.',
            ],
            [
                'question' => 'Có hoàn vé hoặc đổi ngày không?',
                'answer' => 'Tùy nhà cung cấp. Ghi chú khi đặt nếu cần dời lịch; chúng tôi xác nhận trước khi thanh toán.',
            ],
            [
                'question' => 'Có đặt combo nhiều danh mục không?',
                'answer' => 'Có. Nhắn Zalo combo (ví dụ VinWonders + Hòn Thơm + tàu) hoặc gọi 0379 324 928. Nhân viên xác nhận giá từng mục theo ngày đi.',
            ],
            [
                'question' => 'Cần có mặt trước giờ tham quan bao lâu?',
                'answer' => 'Công viên và cáp treo nên có mặt trước 15–30 phút. Tàu cao tốc nên có mặt 45–60 phút trước giờ khởi hành để làm thủ tục.',
            ],
        ];
    }
}
