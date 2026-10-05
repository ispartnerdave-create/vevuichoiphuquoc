# Vé Phú Quốc

Landing page khu vực Phú Quốc. Laravel 13 + Inertia 3 + React 19.

Danh mục (bảng giá chi tiết sẽ bổ sung sau):

1. VinWonders & Safari – GrandWorld Phú Quốc
2. Cáp Treo Hòn Thơm Phú Quốc
3. Ice Jungle Phú Quốc
4. Vé Tàu Superdong & Express Phú Quốc
5. Vé Sunset Sanato Phú Quốc
6. Vé Thuyền Thúng & Kayak Cửa Cạn Phú Quốc

## Chạy local

```bash
cd vephuquoc
php artisan migrate
npm run build
php artisan serve
```

Mở http://localhost:8000.

## Docker

Trong thư mục `vephuquoc`:

```bash
docker compose up --build
docker compose exec app php artisan migrate
```

Nginx: http://localhost:8080.
