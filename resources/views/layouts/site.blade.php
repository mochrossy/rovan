<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
@php
$t = trim($__env->yieldContent('title')) ?: 'Rovan System & Solution – Your Partner to Enhance Your Business to the Next Level';
$d = trim($__env->yieldContent('description')) ?: 'Rovan System & Solution: IT system integrator dan software house. Web design, aplikasi absensi, payroll, HRIS, aplikasi custom, managed services, dan AI Tools.';
$orgLd = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'Rovan System & Solution',
    'alternateName' => 'Rovan System',
    'legalName' => 'PT Rovan Alfa Sejati',
    'slogan' => 'Your Partner to Enhance Your Business to the Next Level',
    'url' => url('/'),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp
<title>{{ $t }}</title>
<meta name="description" content="{{ $d }}">
<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Rovan System & Solution">
<meta property="og:title" content="{{ $t }}">
<meta property="og:description" content="{{ $d }}">
<meta property="og:url" content="{{ url()->current() }}">
{!! trim($__env->yieldContent('og_image')) ?: '<meta property="og:image" content="' . asset('images/og-default.png') . '">' !!}
<link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
<link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
<meta name="twitter:card" content="summary_large_image">
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
<script>try{var m=localStorage.getItem("rv-theme");if(m)document.documentElement.setAttribute("data-theme",m)}catch(e){}</script>
<script type="application/ld+json">{!! $orgLd !!}</script>
@stack('head')
</head>
<body>
<header><div class="wrap"><nav>
<a class="logo" href="{{ url('/') }}" aria-label="Rovan System & Solution">@include('partials.logo')</a>
<ul>
<li><a href="{{ route('about') }}">About</a></li>
<li><a href="{{ route('services') }}">Services</a></li>
<li><a href="{{ route('portfolio') }}">Portfolio</a></li>
<li><a href="{{ route('news') }}">News</a></li>
<li><a href="{{ route('faq') }}">FAQ</a></li>
<li><a href="{{ route('contact') }}">Contact</a></li>
<li><a href="https://toko.rovansolution.com" rel="noopener">Store</a></li>
</ul>
<div class="navr"><button id="thm" type="button" aria-label="Toggle theme">◐</button><a class="btn sm" href="{{ route('contact') }}">Get Started →</a></div>
</nav></div></header>
<main>@yield('content')</main>
{{-- Ganti nomor WhatsApp; nanti bisa diganti widget Chatwoot --}}
<a class="wa" href="https://wa.me/{{ config('rovan.whatsapp') }}?text=Halo%20Rovan%20System%20%26%20Solution" target="_blank" rel="noopener">💬 Chat WhatsApp</a>
<footer>
<div class="wrap fgrid">
<div>
<a class="logo" href="{{ url('/') }}">@include('partials.logo')</a>
<p style="margin:12px 0">Your partner to enhance your business to the next level.</p>
<a class="btn sm" href="{{ route('contact') }}">Hubungi Rovan →</a>
</div>
<div><h4>Menu</h4><ul>
<li><a href="{{ route('about') }}">About</a></li>
<li><a href="{{ route('services') }}">Services</a></li>
<li><a href="{{ route('portfolio') }}">Portfolio</a></li>
<li><a href="{{ route('news') }}">News</a></li>
<li><a href="{{ route('faq') }}">FAQ</a></li>
<li><a href="{{ route('contact') }}">Contact</a></li>
<li><a href="https://toko.rovansolution.com" rel="noopener">Store</a></li>
</ul></div>
<div><h4>Services</h4><ul>
@foreach(\App\Support\ServiceCatalog::all() as $sv)
<li><a href="{{ route('service', $sv['slug']) }}">{{ $sv['title'] }}</a></li>
@endforeach
</ul></div>
<div><h4>Kontak</h4>
<p>{{ config('rovan.address') }}</p>
<p><a href="tel:{{ preg_replace('/[^+\d]/', '', config('rovan.phone')) }}">{{ config('rovan.phone') }}</a></p>
<p><a href="mailto:{{ config('rovan.email') }}">{{ config('rovan.email') }}</a></p>
</div>
</div>
<div class="wrap fbottom">© {{ date('Y') }} PT Rovan Alfa Sejati · Rovan System & Solution · <a href="{{ route('privacy') }}">Kebijakan Privasi</a></div>
</footer>
<script>document.getElementById("thm").onclick=function(){var r=document.documentElement,n=r.getAttribute("data-theme")==="light"?"dark":"light";r.setAttribute("data-theme",n);try{localStorage.setItem("rv-theme",n)}catch(e){}}</script>
<script src="{{ asset('js/lightbox.js') }}" defer></script>
@stack('scripts')
</body>
</html>
