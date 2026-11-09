@extends('layouts.site')
@section('title','Rovan System & Solution – Your Partner to Enhance Your Business to the Next Level')
@push('head')<script type="application/ld+json">{!! $faqLd !!}</script>@endpush
@push('scripts')<script src="{{ asset('js/site.js') }}"></script>@endpush
@section('content')

<div class="hero-bg"><div class="wrap hero">
<span class="tag"><i class="dot"></i> IT System Integrator &amp; Software House</span>
<h1>Your Partner to Enhance <em>Your Business to The Next Level</em></h1>
<p>Rovan System & Solution membantu menaikkan dan memudahkan bisnis Anda lewat website, aplikasi, dan layanan IT yang tepat guna.</p>
<div class="cta-row"><a class="btn lg" href="{{ route('contact') }}">Get Started →</a> <button class="btn o lg" id="demoBtn" type="button">▶ Watch Demo</button></div>
<div class="trust"><small>TEKNOLOGI YANG KAMI GUNAKAN</small><div><span>Laravel</span><span>MariaDB</span><span>Docker</span><span>Nginx</span><span>Linux</span><span>Android</span></div></div>
</div></div>

<section class="showcase"><div class="wrap">
<div class="win">
<div class="wbar"><b></b><b></b><b></b><span>Rovan Attendance · Dashboard</span></div>
<div class="wbody">
<div class="side"><small>OVERVIEW</small><a class="on">Dashboard</a><a>Karyawan</a><a>Absensi</a><a>Cuti</a><a>Payroll</a></div>
<div class="main">
<div class="stats">
<div class="stat"><b>128</b><small>Hadir hari ini</small><em>▲ 2.4%</em></div>
<div class="stat"><b>6</b><small>Terlambat</small><em>▼ 1.1%</em></div>
<div class="stat"><b>9</b><small>Sedang cuti</small><em>▲ 3</em></div>
<div class="stat"><b>97.2%</b><small>Tingkat kehadiran</small><em>▲ 0.8%</em></div>
</div>
<div class="panels">
<div class="pan">Kehadiran · 7 hari terakhir
<div class="bars"><div><i style="height:70%"></i>Sen</div><div><i style="height:82%"></i>Sel</div><div><i style="height:76%"></i>Rab</div><div><i style="height:90%"></i>Kam</div><div><i style="height:64%"></i>Jum</div><div><i style="height:40%"></i>Sab</div><div><i style="height:22%"></i>Min</div></div></div>
<div class="pan">Laporan Payroll<div class="bub">Rekap Nov 2026</div><div class="bub in">128 karyawan, jam kerja terhitung otomatis. Siap diproses.</div></div>
</div></div></div>
<button class="playov" type="button" aria-label="Watch Demo" onclick="document.getElementById('demoBtn').click()">▶</button>
</div>
<p class="note">Mockup dengan data contoh. Aplikasi sebenarnya dapat disesuaikan dengan kebutuhan Anda.</p>
<h2 style="margin-top:50px;text-align:center">Tampilan Aplikasi</h2><p class="sub" style="text-align:center">Beberapa layar yang bisa disesuaikan untuk bisnis Anda.</p>
<div class="slider" id="sl">
@forelse($slides as $sl)
<div class="slide">
@if($sl->image)
<img src="{{ asset('storage/' . $sl->image) }}" alt="{{ $sl->title }}" loading="lazy" class="shot">
@else
<div class="screen"><i></i><i></i><i></i><i></i></div>
@endif
<b>{{ $sl->title }}</b><small>{{ $sl->caption }}</small>
</div>
@empty
(biarkan 4 slide contoh lama di sini)
@endforelse
</div>
<div class="sl-nav"><button id="sp" type="button" aria-label="Sebelumnya">‹</button><button id="sn" type="button" aria-label="Berikutnya">›</button></div>
</div></section>

<section id="about"><div class="wrap about">
<div><h2>About Us</h2><p class="sub">Rovan System & Solution IT system integrator dan software house yang telah berpengalaman lebih dari 19+ tahun.</p>
<p style="color:var(--muted)">Kami hadir sebagai partner yang menjadi alat bantu untuk menaikkan dan memudahkan bisnis Anda, mulai dari website, aplikasi absensi dan HRIS, hingga pengelolaan server dan endpoint. Pendekatan kami bertahap, terukur, dan selalu terbuka pada masukan.</p></div>
<div class="card"><h3>Misi Kami</h3><p>Menjadi partner teknologi yang membantu bisnis tumbuh lewat solusi tepat guna, dirawat berkelanjutan, dan disempurnakan bersama klien.</p></div>
</div></section>

<section id="services"><div class="wrap">
<h2>Our Services</h2><p class="sub">Dari tampilan depan sampai infrastruktur di belakangnya.</p>
<div class="grid">
@foreach(\App\Support\ServiceCatalog::all() as $sv)
<a class="card" href="{{ route('service', $sv['slug']) }}"><div class="ic">{{ $sv['icon'] }}</div><h3>{{ $sv['title'] }}</h3><p>{{ $sv['summary'] }}</p></a>
@endforeach
</div>
<p style="margin-top:20px"><a href="{{ route('services') }}"><b>View all services →</b></a></p></div></section>

<section id="method"><div class="wrap">
<h2>Cara Kami Membantu</h2><p class="sub">Lima langkah sederhana untuk hasil yang terukur.</p>
<div class="grid">
<div class="card"><div class="num">01</div><h3>Define your baseline</h3><p>Memetakan kondisi bisnis dan sistem Anda saat ini.</p></div>
<div class="card"><div class="num">02</div><h3>Set clear micro goals</h3><p>Memecah target besar menjadi tahapan kecil yang jelas.</p></div>
<div class="card"><div class="num">03</div><h3>Embrace feedback</h3><p>Masukan Anda menjadi arah pengembangan.</p></div>
<div class="card"><div class="num">04</div><h3>Maintenance feedback</h3><p>Umpan balik dipantau dan dirawat secara berkelanjutan.</p></div>
<div class="card"><div class="num">05</div><h3>Review and refine</h3><p>Evaluasi berkala untuk terus menyempurnakan hasil.</p></div>
</div></div></section>

<section id="portfolio"><div class="wrap">
<h2>Portfolio</h2><p class="sub">Proyek dan klien yang telah bekerja sama dengan kami.</p>
<div class="grid">
@forelse($portfolios as $p)
@include('partials.work-card', ['p' => $p])
@empty<p class="sub">Belum ada portfolio.</p>@endforelse
</div>
<p style="margin-top:20px"><a href="{{ route('portfolio') }}"><b>Lihat semua →</b></a></p></div></section>

<section id="news"><div class="wrap">
<h2>News &amp; Blog</h2><p class="sub">Artikel dan berita terbaru dari kami.</p>
<div class="grid">
@forelse($posts as $p)
<a class="card" href="{{ route('post', $p->slug) }}"><div class="meta">{{ $p->published_at->translatedFormat('d M Y') }}</div><h3>{{ $p->title }}</h3><p>{{ $p->excerpt }}</p></a>
@empty<p class="sub">Belum ada artikel.</p>@endforelse
</div>
<p style="margin-top:20px"><a href="{{ route('news') }}"><b>Lihat semua →</b></a></p></div></section>

<section id="faq"><div class="wrap">
<h2>FAQ</h2><p class="sub">Pertanyaan yang sering diajukan.</p>
@foreach($faq as [$q,$ans])<details><summary>{{ $q }}</summary><p>{{ $ans }}</p></details>@endforeach
</div></section>

<section id="contact"><div class="wrap"><div class="cta">
<h2>Siap naik ke level berikutnya?</h2><p>Ceritakan kebutuhan bisnis Anda, kami bantu rancang langkah pertamanya.</p>
<a class="btn" href="{{ route('contact') }}">Hubungi Rovan</a>
</div></div></section>

<dialog id="demo"><div class="dh"><h3>Demo Aplikasi Absensi</h3><button class="x" id="demoX" type="button" aria-label="Tutup">×</button></div>
<video id="demoVideo" controls hidden></video>
<div class="demo" id="demoMock"><div class="phone"><small>Selasa, 3 Nov 2026</small><div class="clk" id="clk">08:00</div><button class="ci" id="ci" type="button">Check-in</button><div class="row"><span>Masuk</span><b id="tin">--:--</b></div><div class="row"><span>Pulang</span><b id="tout">--:--</b></div><div class="row"><span>Jam kerja</span><b id="twh">0j 0m</b></div></div>
<p>Mockup interaktif: coba tekan Check-in dan Check-out. Video demo aplikasi absensi Rovan akan ditampilkan di sini setelah aplikasinya selesai dibuat.</p></div></dialog>
@endsection
