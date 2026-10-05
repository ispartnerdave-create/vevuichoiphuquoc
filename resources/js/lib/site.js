export const SITE = {
    name: 'Vé vui chơi Phú Quốc',
    hotlineDisplay: '0379 324 928',
    hotlineTel: '+84379324928',
    zaloDisplay: '0379 324 928',
    zaloUrl: 'https://zalo.me/0379324928',
    area: 'Phú Quốc, Kiên Giang',
};

export const CATEGORY_UI = {
    'vinwonders-safari-grandworld': { short: 'VinWonders', badge: 'Siêu công viên', tone: 'sun' },
    'cap-treo-hon-thom': { short: 'Hòn Thơm', badge: 'Cáp treo vượt biển', tone: 'lagoon' },
    'ice-jungle': { short: 'Ice Jungle', badge: 'Hang động băng', tone: 'lagoon' },
    'tau-superdong-express': { short: 'Tàu cao tốc', badge: 'Rạch Giá, Hà Tiên · Phú Quốc', tone: 'sun' },
    'sunset-sanato': { short: 'Sunset Sanato', badge: 'Hoàng hôn Bãi Trường', tone: 'sun' },
    'thuyen-thung-kayak-cua-can': { short: 'Cửa Cạn', badge: 'Thúng & kayak', tone: 'lagoon' },
};

export function categoryUi(category) {
    return CATEGORY_UI[category.id] ?? { short: category.name, badge: 'Phú Quốc', tone: 'sun' };
}
