<?php
// Data kontak perusahaan. Isi di .env (ROVAN_...) atau ubah nilai bawaan di sini.
return [
    'address'   => env('ROVAN_ADDRESS', 'Jl. Contoh No. 1, Bekasi, Jawa Barat 17000'),
    'phone'     => env('ROVAN_PHONE', '+62 812-3456-7890'),
    'whatsapp'  => env('ROVAN_WA', '6281234567890'),
    'email'     => env('ROVAN_EMAIL', 'hello@rovansolution.com'),
    'notify_email' => env('ROVAN_NOTIFY_EMAIL', env('ROVAN_EMAIL', 'hello@rovansolution.com')),
    // Tujuan email notifikasi pesan baru (butuh pengaturan MAIL_* di .env)
    'notify_email' => env('ROVAN_NOTIFY_EMAIL', env('ROVAN_EMAIL', 'hello@rovansolution.com')),
    'hours'     => env('ROVAN_HOURS', 'Senin – Jumat, 09.00 – 17.00 WIB'),
    // Titik peta: nama tempat atau "lat,lng" (contoh: -6.2383,106.9756). Kosong = pakai alamat.
    'map_query' => env('ROVAN_MAP_QUERY'),
];
