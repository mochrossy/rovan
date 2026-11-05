@extends('layouts.site')
@section('title', 'Tentang Kami – Rovan System & Solution')
@section('description', 'Rovan System & Solution adalah IT system integrator dan software house, partner Anda untuk menaikkan dan memudahkan bisnis.')
@section('content')
<section><div class="wrap about">
<div><h1 style="font-size:2.2rem">Tentang Kami</h1>
<p class="sub">Rovan System & Solution adalah brand dari PT Rovan Alfa Sejati, IT system integrator dan software house.</p>
<p style="color:var(--muted)">Kami hadir sebagai partner yang menjadi alat bantu untuk menaikkan dan memudahkan bisnis Anda, mulai dari website, aplikasi absensi dan HRIS, hingga pengelolaan server dan endpoint. Pendekatan kami bertahap, terukur, dan selalu terbuka pada masukan.</p></div>
<div class="card"><h3>Your partner to enhanced to the next level</h3><p>Menjadi partner teknologi yang membantu bisnis tumbuh lewat solusi tepat guna, dirawat berkelanjutan, dan disempurnakan bersama klien.</p></div>
</div></section>
<section><div class="wrap">
<h2>Cara Kami Membantu</h2><p class="sub">Lima langkah sederhana untuk hasil yang terukur.</p>
<div class="grid">
@foreach([['Define your baseline','Memetakan kondisi bisnis dan sistem Anda saat ini.'],['Set clear micro goals','Memecah target besar menjadi tahapan kecil yang jelas.'],['Embrace feedback','Masukan Anda menjadi arah pengembangan.'],['Maintenance feedback','Umpan balik dipantau dan dirawat secara berkelanjutan.'],['Review and refine','Evaluasi berkala untuk terus menyempurnakan hasil.']] as $i => [$h, $p])
<div class="card"><div class="num">0{{ $i + 1 }}</div><h3>{{ $h }}</h3><p>{{ $p }}</p></div>
@endforeach
</div></div></section>
@endsection
