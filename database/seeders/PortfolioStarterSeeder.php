<?php
namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

/** php artisan db:seed --class=PortfolioStarterSeeder  (aman dijalankan ulang) */
class PortfolioStarterSeeder extends Seeder
{
    public function run(): void
    {
        Portfolio::firstOrCreate(['slug' => 'website-rovan-system-solution'], [
            'title' => 'Website Rovan System & Solution', 'type' => 'internal',
            'service_slug' => 'company-profile', 'client' => 'Rovan System & Solution', 'year' => 2026,
            'category' => 'Web Design',
            'description' => 'Website company profile dengan dashboard untuk mengelola News dan Portfolio, peran pengguna, SEO, dan formulir kontak.',
            'challenge' => 'Membutuhkan website company profile yang mudah diperbarui oleh beberapa orang tanpa menyentuh kode.',
            'solution' => 'Laravel dan MariaDB dengan dashboard admin berperan (Super admin, Editor, Portfolio manager), struktur SEO, dan kotak masuk pesan.',
            'result' => 'Website yang sedang Anda lihat ini.',
            'tech' => 'Laravel, MariaDB, Blade', 'sort_order' => 1, 'is_published' => true,
        ]);
        Portfolio::firstOrCreate(['slug' => 'mockup-aplikasi-absensi'], [
            'title' => 'Mockup Aplikasi Absensi', 'type' => 'sample',
            'service_slug' => 'aplikasi-absensi', 'client' => '', 'year' => 2026,
            'category' => 'Pembuatan Aplikasi',
            'description' => 'Rancangan antarmuka aplikasi absensi: dashboard kehadiran, check-in dan check-out, cuti, dan laporan payroll.',
            'solution' => 'Rancangan awal untuk memperlihatkan alur dan tampilan sebelum pengembangan.',
            'tech' => 'Laravel, MariaDB, REST API', 'sort_order' => 2, 'is_published' => true,
        ]);
    }
}
