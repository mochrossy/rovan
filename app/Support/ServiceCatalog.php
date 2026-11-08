<?php
namespace App\Support;

/** Konten Services & FAQ. Ubah teks di sini (draf awal, silakan disesuaikan). */
class ServiceCatalog
{
    private static function i(string $slug, string $title, string $desc, array $features, string $for, array $output, ?string $note = null): array
    {
        return compact('slug', 'title', 'desc', 'features', 'for', 'output', 'note');
    }

    public static function all(): array
    {
        return [
            'web-design' => [
                'slug' => 'web-design', 'icon' => '🌐', 'title' => 'Web Design',
                'summary' => 'Landing page, company profile, toko online, serta optimasi SEO dan AI SEO.',
                'intro' => 'Website yang tampil profesional, cepat dibuka, dan mudah ditemukan calon pelanggan.',
                'items' => [
                    self::i('landing-page', 'Landing Page',
                        'Satu halaman yang fokus pada satu tujuan, seperti promosi produk, pendaftaran, atau pengumpulan kontak. Cocok untuk kampanye dan peluncuran produk.',
                        ['Satu tujuan jelas dengan ajakan bertindak (CTA) yang menonjol', 'Tampilan responsif di ponsel, tablet, dan desktop', 'Formulir kontak atau tombol WhatsApp', 'Pengaturan dasar SEO dan kecepatan muat', 'Pelacakan kunjungan (analytics) dasar'],
                        'Promosi produk, pendaftaran acara, atau pengumpulan calon pelanggan.',
                        ['Desain halaman (mockup) untuk disetujui', 'Website siap tayang', 'Panduan singkat mengubah konten']),
                    self::i('company-profile', 'Company Profile',
                        'Website resmi perusahaan yang memperkenalkan profil, layanan, portfolio, dan kontak. Dilengkapi halaman berita agar mudah diperbarui.',
                        ['Halaman About, Services, Portfolio, News, dan Contact', 'Dashboard untuk mengunggah berita dan portfolio', 'Peran pengguna berbeda untuk pengelola konten', 'Struktur SEO: meta tag, sitemap, dan data terstruktur', 'Formulir kontak dengan kotak masuk'],
                        'Perusahaan yang ingin tampil profesional dan bisa memperbarui kontennya sendiri.',
                        ['Mockup dan desain untuk disetujui', 'Website beserta dashboard admin', 'Pelatihan singkat penggunaan dashboard']),
                    self::i('web-e-commerce', 'Web E-Commerce / Toko Online',
                        'Toko online dengan katalog produk, keranjang, pembayaran, dan pengelolaan pesanan. Cocok untuk bisnis yang ingin berjualan online selain di toko fisik.',
                        ['Katalog produk dan kategori', 'Keranjang dan checkout', 'Integrasi payment gateway dan ongkos kirim', 'Manajemen stok dan pesanan', 'Peran pengguna untuk staf toko'],
                        'Bisnis yang ingin berjualan di website sendiri, tidak hanya lewat marketplace.',
                        ['Toko online siap dipakai', 'Konfigurasi pembayaran dan pengiriman', 'Pelatihan pengelolaan produk dan pesanan']),
                    self::i('seo-optimization', 'SEO Optimization',
                        'Penataan struktur halaman, meta tag, kecepatan, sitemap, dan data terstruktur supaya website lebih mudah ditemukan di mesin pencari.',
                        ['Audit kondisi SEO saat ini sebagai baseline', 'Riset kata kunci sesuai bisnis dan target pelanggan', 'Perbaikan meta tag, struktur heading, dan tautan internal', 'Optimasi kecepatan dan tampilan di ponsel', 'Sitemap, robots.txt, dan data terstruktur', 'Pemantauan lewat Google Search Console'],
                        'Website yang sudah ada tetapi sulit ditemukan di pencarian.',
                        ['Laporan audit awal', 'Daftar perbaikan yang sudah dikerjakan', 'Laporan berkala dibandingkan dengan baseline'],
                        'Peringkat bergantung pada banyak faktor (persaingan, konten, waktu), sehingga tidak dapat dijamin.'),
                    self::i('ai-seo', 'AI SEO',
                        'Penyusunan konten dan struktur informasi agar bisnis Anda lebih mudah dipahami dan dirujuk oleh pencarian berbasis AI.',
                        ['Konten berformat jelas: pertanyaan dan jawaban, ringkasan, data terstruktur', 'Penyelarasan informasi bisnis (nama, alamat, layanan) di berbagai sumber', 'Halaman FAQ dan konten yang menjawab pertanyaan calon pelanggan', 'Pengecekan bagaimana bisnis Anda muncul di asisten dan pencarian berbasis AI'],
                        'Bisnis yang ingin lebih mudah dipahami dan dirujuk oleh pencarian berbasis AI.',
                        ['Audit kesiapan konten', 'Perbaikan struktur dan konten', 'Laporan pengecekan berkala'],
                        'Pencarian berbasis AI berubah cepat; hasil tidak dapat dijamin.'),
                ],
            ],
            'aplikasi' => [
                'slug' => 'aplikasi', 'icon' => '📱', 'title' => 'Pembuatan Aplikasi',
                'summary' => 'Absensi, payroll, HRIS, aplikasi Android, dan aplikasi custom pengganti sistem lama.',
                'intro' => 'Aplikasi yang dirancang dari kebutuhan nyata bisnis Anda, dari analisis sampai uji penerimaan pengguna (UAT).',
                'items' => [
                    self::i('aplikasi-absensi', 'Aplikasi Absensi',
                        'Check-in dan check-out real-time, perhitungan jam kerja otomatis, serta rekap kehadiran per karyawan dan per periode.',
                        ['Check-in dan check-out real-time', 'Perhitungan jam kerja otomatis', 'Rekap kehadiran per karyawan dan per periode', 'Pengajuan izin dan cuti', 'Laporan yang siap diekspor', 'REST API untuk integrasi dengan sistem lain'],
                        'Perusahaan yang masih mencatat kehadiran secara manual atau di spreadsheet.',
                        ['Aplikasi absensi berbasis web', 'Data karyawan terimpor', 'UAT dan pelatihan pengguna']),
                    self::i('aplikasi-payroll', 'Aplikasi Payroll',
                        'Perhitungan gaji dari data kehadiran, tunjangan, dan potongan, lengkap dengan laporan yang siap diproses.',
                        ['Komponen gaji, tunjangan, dan potongan yang dapat diatur', 'Perhitungan otomatis dari data kehadiran', 'Slip gaji dan laporan penggajian', 'Riwayat periode penggajian', 'Hak akses terbatas untuk data sensitif'],
                        'Perusahaan yang menghitung gaji secara manual dan ingin mengurangi kesalahan.',
                        ['Aplikasi payroll', 'Template slip gaji dan laporan', 'Uji perhitungan bersama tim HR']),
                    self::i('sistem-hris', 'Sistem HRIS',
                        'Pengelolaan data karyawan, cuti, absensi, dan penggajian dalam satu sistem terintegrasi.',
                        ['Data karyawan terpusat', 'Absensi, cuti, dan payroll yang saling terhubung', 'Peran dan hak akses per bagian', 'Laporan SDM', 'Dikembangkan bertahap sesuai micro goals'],
                        'Perusahaan yang membutuhkan satu sistem untuk mengelola SDM.',
                        ['Sistem HRIS yang dirilis bertahap', 'Dokumentasi dan pelatihan', 'Rencana pengembangan modul berikutnya']),
                    self::i('android-apps', 'Android Apps',
                        'Aplikasi Android untuk kebutuhan operasional atau pelanggan, termasuk pengganti aplikasi lama.',
                        ['Aplikasi untuk operasional lapangan atau pelanggan', 'Terhubung ke sistem web atau API yang sudah ada', 'Antarmuka sederhana dan mudah dipakai', 'Pembaruan dan perbaikan berkala'],
                        'Bisnis yang membutuhkan aplikasi di ponsel, termasuk pengganti aplikasi lama.',
                        ['Aplikasi Android siap pakai', 'Dokumentasi teknis', 'Dukungan setelah rilis', 'Bantuan publikasi ke Google Play (opsional)']),
                    self::i('custom-apps', 'Custom Apps',
                        'Aplikasi berbasis web yang disesuaikan dengan alur kerja bisnis Anda dan menggantikan aplikasi yang sudah tidak memadai.',
                        ['Analisis alur kerja dan kebutuhan', 'Prototipe untuk disetujui sebelum dibangun', 'Pengembangan bertahap dengan demo berkala', 'Migrasi data dari aplikasi lama', 'UAT sebelum rilis'],
                        'Bisnis dengan alur kerja khusus yang tidak terpenuhi oleh aplikasi umum.',
                        ['Aplikasi sesuai kebutuhan', 'Dokumentasi', 'Rencana pemeliharaan']),
                ],
            ],
            'managed-services' => [
                'slug' => 'managed-services', 'icon' => '🛠️', 'title' => 'Managed Services',
                'summary' => 'Pengelolaan endpoint, server, dan aplikasi agar operasional berjalan stabil.',
                'intro' => 'Kami merawat infrastruktur IT Anda agar tim bisa fokus ke bisnis.',
                'items' => [
                    self::i('endpoint-services', 'Endpoint Services',
                        'Pengelolaan komputer dan perangkat pengguna: instalasi, pembaruan, troubleshooting, dan pemantauan.',
                        ['Inventaris perangkat dan perangkat lunak', 'Pembaruan sistem dan antivirus berkala', 'Troubleshooting dan bantuan pengguna', 'Pemantauan kondisi perangkat', 'Laporan berkala'],
                        'Perusahaan dengan banyak komputer atau perangkat pengguna.',
                        ['Daftar aset perangkat', 'Jadwal pemeliharaan', 'Laporan bulanan']),
                    self::i('server-maintenance', 'Server Maintenance',
                        'Pemeliharaan server berkala: pembaruan keamanan, backup, pemantauan, dan penanganan gangguan.',
                        ['Pembaruan keamanan (patching) terjadwal', 'Backup dan uji pemulihan', 'Pemantauan ketersediaan dan penggunaan sumber daya', 'Penanganan gangguan', 'Dokumentasi konfigurasi'],
                        'Perusahaan dengan server sendiri, VPS, atau server di cloud.',
                        ['Jadwal pemeliharaan', 'Laporan kondisi server', 'Prosedur pemulihan (recovery) yang terdokumentasi']),
                    self::i('apps-maintenance', 'Apps Maintenance',
                        'Perawatan aplikasi yang sudah berjalan: perbaikan bug, pembaruan, dan penyesuaian fitur.',
                        ['Perbaikan bug', 'Pembaruan dependensi dan keamanan', 'Penyesuaian dan penambahan fitur kecil', 'Pemantauan error', 'Antrean permintaan yang terdokumentasi'],
                        'Aplikasi yang sudah berjalan, baik buatan kami maupun pihak lain.',
                        ['Laporan perawatan', 'Riwayat perubahan (changelog)', 'Evaluasi berkala']),
                ],
            ],
            'ai-tools' => [
                'slug' => 'ai-tools', 'icon' => '🤖', 'title' => 'AI Tools',
                'summary' => 'Alat berbasis AI sebagai peningkat performa usaha Anda.',
                'intro' => 'AI yang dipakai untuk pekerjaan nyata: melayani pelanggan lebih cepat dan mengurangi tugas berulang.',
                'items' => [
                    self::i('chatbot-whatsapp-web', 'Chatbot WhatsApp & Web',
                        'Asisten otomatis yang menjawab pertanyaan pelanggan di WhatsApp dan website, dengan serah-terima ke staf bila diperlukan.',
                        ['Menjawab pertanyaan umum pelanggan sepanjang waktu', 'Terhubung ke WhatsApp dan website', 'Serah-terima ke staf manusia bila diperlukan', 'Memakai informasi produk dan layanan Anda', 'Riwayat percakapan untuk evaluasi'],
                        'Bisnis yang menerima banyak pertanyaan berulang.',
                        ['Chatbot terhubung ke kanal pilihan', 'Basis pengetahuan awal', 'Evaluasi dan penyempurnaan berkala'],
                        'Integrasi WhatsApp memerlukan akun WhatsApp Business dan mengikuti ketentuan penyedia layanan.'),
                    self::i('otomasi-pekerjaan', 'Otomasi Pekerjaan Berulang',
                        'Mengotomasi pelaporan, pengolahan dokumen, dan tugas rutin agar tim fokus pada pekerjaan utama.',
                        ['Mengidentifikasi tugas berulang yang paling memakan waktu', 'Otomasi pelaporan, rekap, dan pengolahan dokumen', 'Notifikasi dan alur persetujuan otomatis', 'Pengukuran waktu yang dihemat dibandingkan baseline'],
                        'Tim yang menghabiskan banyak waktu untuk pekerjaan administratif berulang.',
                        ['Daftar alur kerja yang diotomasi', 'Otomasi yang sudah berjalan', 'Laporan penghematan waktu']),
                    self::i('asisten-internal', 'Asisten Internal',
                        'Asisten AI yang membantu tim mencari informasi dan menyusun draf berdasarkan data perusahaan.',
                        ['Mencari informasi dari dokumen dan data perusahaan', 'Membantu menyusun draf surat, laporan, dan ringkasan', 'Akses dibatasi sesuai peran pengguna', 'Pengelolaan data mengikuti kebijakan perusahaan'],
                        'Tim yang sering mencari informasi di banyak dokumen.',
                        ['Asisten internal', 'Pengaturan hak akses', 'Panduan penggunaan']),
                ],
            ],
        ];
    }

    /** Cari sub-layanan berdasarkan slug. */
    public static function lookup(string $itemSlug): ?array
    {
        foreach (self::all() as $cat) {
            foreach ($cat['items'] as $it) {
                if ($it['slug'] === $itemSlug) return ['category' => $cat, 'item' => $it];
            }
        }
        return null;
    }

    /** Pilihan untuk dropdown: slug => "Kategori › Layanan". */
    public static function options(): array
    {
        $o = [];
        foreach (self::all() as $cat) foreach ($cat['items'] as $it) $o[$it['slug']] = $cat['title'] . ' › ' . $it['title'];
        return $o;
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
