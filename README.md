# Rovan System – Laravel overlay

Berkas ini ditimpa/ditambahkan ke proyek Laravel baru (jalur folder sama dengan struktur Laravel).

## Pemasangan
```bash
composer create-project laravel/laravel rovan-web && cd rovan-web
# .env: DB_CONNECTION=mariadb (atau mysql), DB_DATABASE=rovan, DB_USERNAME, DB_PASSWORD
composer require laravel/breeze --dev
php artisan breeze:install blade
# salin isi folder ini ke dalam rovan-web (timpa routes/web.php)
php artisan migrate
php artisan storage:link
php artisan tinker   # buat akun admin:
#   App\Models\User::create(['name'=>'Admin','email'=>'anda@domain.com','password'=>Hash::make('PasswordKuat!')]);
php artisan serve
```
- Admin: `/login` lalu `/admin` (News dan Portfolio). Sitemap: `/sitemap.xml`.
- **Nonaktifkan registrasi publik:** hapus route `register` di `routes/auth.php`.
- Ganti nomor WhatsApp di `resources/views/layouts/site.blade.php`.
- Video demo: isi `DEMO_VIDEO` di `public/js/site.js`.
- Tambahkan `Sitemap: https://domain-anda/sitemap.xml` ke `public/robots.txt`.

## Catatan
- Paket ini hanya untuk **company profile** (rovansolution.com). Toko (toko.rovansolution.com) memakai proyek Bagisto terpisah; jangan dipasang di proyek yang sama.
- Di `.env` tiap aplikasi, set `APP_URL` sesuai domainnya dan `SESSION_COOKIE` yang berbeda (misal `rovan_site` dan `rovan_toko`).
- Menu "Toko" di `layouts/site.blade.php` mengarah ke https://toko.rovansolution.com.
