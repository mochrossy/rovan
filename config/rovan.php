<?php
// Data kontak perusahaan. Isi di .env (ROVAN_...) atau ubah nilai bawaan di sini.
return [
    'address'   => env('ROVAN_ADDRESS', 'Jl. KenangaIII No. 1, Bekasi, Jawa Barat 17413'),
    'phone'     => env('ROVAN_PHONE', '+62 815-1982-0559'),
    'whatsapp'  => env('ROVAN_WA', '6285119820559'),
    'email'     => env('ROVAN_EMAIL', 'hello@rovansolution.com'),
    'hours'     => env('ROVAN_HOURS', 'Senin – Jumat, 09.00 – 17.00 WIB'),
    // Titik peta: nama tempat atau "lat,lng" (contoh: -6.2383,106.9756). Kosong = pakai alamat.
    'map_query' => env('-6.281798350535142, 106.93887094989039'),
];
