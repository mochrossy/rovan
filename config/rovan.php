<?php
// Data kontak perusahaan. Isi di .env (ROVAN_...) atau ubah nilai bawaan di sini.
return [
    'address'   => env('ROVAN_ADDRESS', 'Jl. KenangaIII No. 1 Perum D.Indah, Bekasi, Jawa Barat 17413'),
    'phone'     => env('ROVAN_PHONE', '+62 851-1982-0599'),
    'whatsapp'  => env('ROVAN_WA', '6285119820599'),
    'email'     => env('ROVAN_EMAIL', 'hello@rovansolution.com'),
    'notify_email' => env('ROVAN_NOTIFY_EMAIL', env('ROVAN_EMAIL', 'hello@rovansolution.com')),
    // Tujuan email notifikasi pesan baru (butuh pengaturan MAIL_* di .env)
    'notify_email' => env('ROVAN_NOTIFY_EMAIL', env('ROVAN_EMAIL', 'hello@rovansolution.com')),
    'hours'     => env('ROVAN_HOURS', 'Senin – Jumat, 09.00 – 17.00 WIB'),
    // Titik peta: nama tempat atau "lat,lng" (contoh: -6.2383,106.9756). Kosong = pakai alamat.
    'map_query' => env('-6.281817564941292,106.93887463003118'),
];
