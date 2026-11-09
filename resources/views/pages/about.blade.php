@extends('layouts.site')
@section('title', 'About – Rovan System & Solution')
@section('description', 'Rovan System & Solution adalah IT system integrator dan software house. Kami memadukan SDLC (Waterfall dan Agile) dengan metode Rovan agar hasil proyek terukur.')
@php
    $steps = [
        ['Define your baseline', 'Memetakan kondisi bisnis dan sistem Anda saat ini.'],
        ['Set clear micro goals', 'Memecah target besar menjadi tahapan kecil yang jelas.'],
        ['Embrace feedback', 'Masukan Anda menjadi arah pengembangan.'],
        ['Maintenance feedback', 'Umpan balik dipantau dan dirawat secara berkelanjutan.'],
        ['Review and refine', 'Evaluasi berkala untuk terus menyempurnakan hasil.'],
    ];
    $methods = [
        ['Waterfall', 'Tahapan berurutan: kebutuhan, desain, pengembangan, uji, lalu rilis.', 'Lingkup, jadwal, dan dokumentasi sangat jelas.', 'Kurang luwes bila kebutuhan berubah di tengah jalan.', 'Proyek dengan kebutuhan tetap dan persetujuan formal per tahap.'],
        ['Agile / Scrum', 'Pengembangan dalam siklus pendek (sprint) dengan demo dan umpan balik rutin.', 'Mudah menyesuaikan perubahan, hasil terlihat lebih cepat.', 'Tanpa target terukur, lingkup bisa melebar.', 'Aplikasi baru atau kebutuhan yang masih berkembang.'],
        ['Metode Rovan (Hybrid)', 'Baseline dan lingkup jelas seperti Waterfall, pelaksanaan iteratif seperti Agile, dengan micro goals dan umpan balik di setiap siklus.', 'Terukur sekaligus fleksibel.', 'Butuh keterlibatan klien di tiap siklus.', 'Sebagian besar proyek kami: website, HRIS, dan aplikasi custom.'],
    ];
    $phases = [
        ['1. Planning & Requirements', 'Mengumpulkan kebutuhan, mengukur kondisi saat ini, menyepakati lingkup.', 'Define your baseline', 'Dokumen kebutuhan dan baseline yang disepakati (mis. waktu proses, jumlah kesalahan, biaya).'],
        ['2. Analysis & Design', 'Merancang alur sistem, basis data, dan tampilan (mockup).', 'Set clear micro goals', 'Desain dan daftar micro goals; tiap fitur punya kriteria selesai (acceptance criteria).'],
        ['3. Development', 'Membangun dalam siklus pendek dengan demo berkala.', 'Embrace feedback', 'Progres per micro goal terlihat; masukan klien tercatat dan ditindaklanjuti.'],
        ['4. Testing & UAT', 'Uji fungsi, keamanan, dan uji penerimaan pengguna (UAT).', 'Embrace feedback', 'Hasil uji dan daftar perbaikan; UAT disetujui klien sebelum rilis.'],
        ['5. Deployment', 'Rilis ke lingkungan produksi, migrasi data, dan pelatihan pengguna.', 'Review and refine', 'Rilis terkontrol dengan rencana pemulihan (rollback) dan pengguna yang siap memakai.'],
        ['6. Maintenance', 'Pemantauan, perbaikan, dan pembaruan; permintaan dikelola sebagai antrean tiket.', 'Maintenance feedback, lalu Review and refine', 'Laporan berkala dibandingkan dengan baseline; hasilnya menjadi masukan siklus berikutnya.'],
    ];
    $metrics = [
        ['Sebelum vs sesudah', 'Perbandingan dengan baseline, misalnya waktu proses, jumlah kesalahan, atau biaya operasional.'],
        ['Micro goals tercapai', 'Berapa target kecil yang selesai sesuai kriteria dan jadwal.'],
        ['Kualitas', 'Hasil UAT dan jumlah temuan perbaikan sebelum dan sesudah rilis.'],
        ['Keandalan', 'Ketersediaan sistem (uptime) dan waktu respons terhadap permintaan atau gangguan.'],
    ];
@endphp
@section('content')
<section><div class="wrap about">
<div><h1 style="font-size:2.2rem">Tentang Kami</h1>
<p class="sub">Rovan System & Solution adalah brand dari PT Rovan Alfa Sejati, IT system integrator dan software house.</p>
<p style="color:var(--muted)">Kami hadir sebagai partner yang menjadi alat bantu untuk menaikkan dan memudahkan bisnis Anda, mulai dari website, aplikasi absensi dan HRIS, hingga pengelolaan server dan endpoint. Pendekatan kami bertahap, terukur, dan selalu terbuka pada masukan.</p></div>
<div class="card"><h3>Your partner to enhance your business to the next level</h3><p>Menjadi partner teknologi yang membantu bisnis tumbuh lewat solusi tepat guna, dirawat berkelanjutan, dan disempurnakan bersama klien.</p></div>
</div></section>

<section><div class="wrap">
<h2>Cara Kami Membantu</h2><p class="sub">Lima langkah sederhana dari metode Rovan.</p>
<div class="grid">
@foreach($steps as $i => [$h, $p])
<div class="card"><div class="num">0{{ $i + 1 }}</div><h3>{{ $h }}</h3><p>{{ $p }}</p></div>
@endforeach
</div></div></section>

<section><div class="wrap">
<h2>Metode Kerja: SDLC + Metode Rovan</h2>
<p class="sub">Kami memadukan metode pengembangan perangkat lunak yang populer dengan metode Rovan, supaya setiap tahap punya target dan ukuran yang jelas.</p>
<div class="grid">
@foreach($methods as [$name, $desc, $good, $limit, $fit])
<div class="card">
<h3>{{ $name }}</h3><p>{{ $desc }}</p>
<p style="margin-top:10px"><b>Kekuatan:</b> {{ $good }}</p>
<p style="margin-top:6px"><b>Keterbatasan:</b> {{ $limit }}</p>
<p style="margin-top:6px"><b>Cocok untuk:</b> {{ $fit }}</p>
</div>
@endforeach
</div></div></section>

<section><div class="wrap">
<h2>Enam Fase SDLC dalam Setiap Proyek</h2>
<p class="sub">Tiap fase dipetakan ke langkah Rovan dan menghasilkan sesuatu yang bisa diperiksa bersama.</p>
<div class="tbl">
<table>
<tr><th>Fase SDLC</th><th>Kegiatan</th><th>Langkah Rovan</th><th>Hasil dan ukuran</th></tr>
@foreach($phases as [$ph, $act, $step, $out])
<tr><td><b>{{ $ph }}</b></td><td>{{ $act }}</td><td>{{ $step }}</td><td>{{ $out }}</td></tr>
@endforeach
</table>
</div>
<p class="note" style="text-align:left">Setelah fase Maintenance, hasil evaluasi menjadi baseline baru untuk siklus perbaikan berikutnya.</p>
</div></section>

<section><div class="wrap">
<h2>Bagaimana Hasil Diukur</h2>
<p class="sub">Indikator ditetapkan bersama Anda di tahap baseline dan disesuaikan dengan jenis proyek. Kami tidak menjanjikan angka sebelum kondisi awal diukur.</p>
<div class="grid">
@foreach($metrics as [$mh, $md])
<div class="card"><h3>{{ $mh }}</h3><p>{{ $md }}</p></div>
@endforeach
</div></div></section>

<section><div class="wrap"><div class="cta">
<h2>Mulai dari define your baseline</h2>
<p>Ceritakan kondisi bisnis Anda saat ini, kami bantu merancang langkah pertamanya.</p>
<a class="btn" href="{{ route('contact') }}">Hubungi Kami</a>
</div></div></section>
@endsection
