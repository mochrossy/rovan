<?php
namespace App\Support;

/** Konten layanan & FAQ. Ubah teks di sini (draf awal, silakan disesuaikan). */
class ServiceCatalog
{
    public static function all(): array
    {
        return [
            'web-design' => [
                'slug' => 'web-design', 'icon' => '🌐', 'title' => 'Web Design',
                'summary' => 'Landing page, company profile, toko online, serta optimasi SEO dan AI SEO.',
                'intro' => 'Website yang tampil profesional, cepat dibuka, dan mudah ditemukan calon pelanggan.',
                'items' => [
                    ['Landing Page', 'Satu halaman yang fokus pada satu tujuan, seperti promosi produk, pendaftaran, atau pengumpulan kontak. Cocok untuk kampanye dan peluncuran produk.'],
                    ['Company Profile', 'Website resmi perusahaan yang memperkenalkan profil, layanan, portfolio, dan kontak. Dilengkapi halaman berita agar mudah diperbarui.'],
                    ['Web E-Commerce / Toko Online', 'Toko online dengan katalog produk, keranjang, pembayaran, dan pengelolaan pesanan. Cocok untuk bisnis yang ingin berjualan online selain di toko fisik.'],
                    ['SEO Optimization', 'Penataan struktur halaman, meta tag, kecepatan, sitemap, dan data terstruktur supaya website lebih mudah ditemukan di mesin pencari.'],
                    ['AI SEO', 'Penyusunan konten dan struktur informasi agar bisnis Anda lebih mudah dipahami dan dirujuk oleh pencarian berbasis AI. Hasil tidak dapat dijamin, tetapi fondasinya diperkuat.'],
                ],
            ],
            'aplikasi' => [
                'slug' => 'aplikasi', 'icon' => '📱', 'title' => 'Pembuatan Aplikasi',
                'summary' => 'Absensi, payroll, HRIS, aplikasi Android, dan aplikasi custom pengganti sistem lama.',
                'intro' => 'Aplikasi yang dirancang dari kebutuhan nyata bisnis Anda, dari analisis sampai uji penerimaan pengguna (UAT).',
                'items' => [
                    ['Aplikasi Absensi', 'Check-in dan check-out real-time, perhitungan jam kerja otomatis, serta rekap kehadiran per karyawan dan per periode.'],
                    ['Aplikasi Payroll', 'Perhitungan gaji dari data kehadiran, tunjangan, dan potongan, lengkap dengan laporan yang siap diproses.'],
                    ['Sistem HRIS', 'Pengelolaan data karyawan, cuti, absensi, dan penggajian dalam satu sistem terintegrasi.'],
                    ['Android Apps', 'Aplikasi Android untuk kebutuhan operasional atau pelanggan, termasuk pengganti aplikasi lama.'],
                    ['Custom Apps', 'Aplikasi berbasis web yang disesuaikan dengan alur kerja bisnis Anda dan menggantikan aplikasi yang sudah tidak memadai.'],
                ],
            ],
            'managed-services' => [
                'slug' => 'managed-services', 'icon' => '🛠️', 'title' => 'Managed Services',
                'summary' => 'Pengelolaan endpoint, server, dan aplikasi agar operasional berjalan stabil.',
                'intro' => 'Kami merawat infrastruktur IT Anda agar tim bisa fokus ke bisnis.',
                'items' => [
                    ['Endpoint Services', 'Pengelolaan komputer dan perangkat pengguna: instalasi, pembaruan, troubleshooting, dan pemantauan.'],
                    ['Server Maintenance', 'Pemeliharaan server berkala: pembaruan keamanan, backup, pemantauan, dan penanganan gangguan.'],
                    ['Apps Maintenance', 'Perawatan aplikasi yang sudah berjalan: perbaikan bug, pembaruan, dan penyesuaian fitur.'],
                ],
            ],
            'ai-tools' => [
                'slug' => 'ai-tools', 'icon' => '🤖', 'title' => 'AI Tools',
                'summary' => 'Alat berbasis AI sebagai peningkat performa usaha Anda.',
                'intro' => 'AI yang dipakai untuk pekerjaan nyata: melayani pelanggan lebih cepat dan mengurangi tugas berulang.',
                'items' => [
                    ['Chatbot WhatsApp & Web', 'Asisten otomatis yang menjawab pertanyaan pelanggan di WhatsApp dan website, dengan serah-terima ke staf bila diperlukan.'],
                    ['Otomasi Pekerjaan Berulang', 'Mengotomasi pelaporan, pengolahan dokumen, dan tugas rutin agar tim fokus pada pekerjaan utama.'],
                    ['Asisten Internal', 'Asisten AI yang membantu tim mencari informasi dan menyusun draf berdasarkan data perusahaan.'],
                ],
            ],
        ];
    }

    public static function faq(): array
    {
        return [
            ['Berapa lama pembuatan website atau aplikasi?', 'Tergantung cakupan. Setelah tahap baseline, kami susun micro goals dan estimasi waktu per tahap.'],
            ['Apakah bisa mengganti aplikasi lama kami?', 'Bisa. Kami membangun aplikasi web atau Android pengganti, termasuk migrasi data.'],
            ['Apakah ada layanan pemeliharaan setelah selesai?', 'Ada. Managed services kami mencakup endpoint, server, dan apps maintenance.'],
            ['Bagaimana cara memulai?', 'Hubungi kami untuk konsultasi awal, lalu kami mulai dengan define your baseline.'],
        ];
    }
}
