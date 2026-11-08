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

## Peran pengguna dashboard
Jalankan `php artisan migrate` (menambah kolom `role`). Akun pertama otomatis menjadi **Super admin**.
- Super admin: News, Portfolio, dan menu Users (tambah/hapus pengguna).
- Editor: hanya News. Portfolio manager: hanya Portfolio.
Pengguna baru dibuat di `/admin/users`. Pastikan registrasi publik (`register`) sudah dihapus dari `routes/auth.php`.

## Form kontak
- Data kontak (alamat, telepon, WhatsApp, email, jam operasional, titik peta) ada di `config/rovan.php`; bisa juga diisi lewat `.env` (`ROVAN_ADDRESS`, `ROVAN_PHONE`, `ROVAN_WA`, `ROVAN_EMAIL`, `ROVAN_HOURS`, `ROVAN_MAP_QUERY`).
- Pesan masuk tersimpan di database dan dibaca Super admin di `/admin/messages`. Jalankan `php artisan migrate`.

## Email notifikasi pesan kontak
Di `.env`:
```
MAIL_MAILER=smtp        # untuk uji lokal pakai: log (isi email ditulis ke storage/logs)
MAIL_HOST=...           # dari penyedia SMTP Anda
MAIL_PORT=587
MAIL_USERNAME=...
MAIL_PASSWORD=...
MAIL_FROM_ADDRESS="hello@rovansolution.com"
MAIL_FROM_NAME="Rovan System & Solution"
ROVAN_NOTIFY_EMAIL=email-penerima@domain.com
```
Hapus pesan lama: `php artisan rovan:prune-messages 365`. Untuk otomatis harian, tambahkan di `routes/console.php`:
`Schedule::command('rovan:prune-messages 365')->daily();` (dan `use Illuminate\Support\Facades\Schedule;`).

## Email notifikasi
Isi `MAIL_*` di `.env` (SMTP) dan `ROVAN_NOTIFY_EMAIL`. Selama `MAIL_MAILER=log` (bawaan Laravel), email hanya ditulis ke `storage/logs/laravel.log`. Jika pengiriman gagal, pesan tetap tersimpan di dashboard Messages.
