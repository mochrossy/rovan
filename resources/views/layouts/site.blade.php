<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
@php
$t = trim($__env->yieldContent('title')) ?: 'Rovan System & Solution – Your Partner to Enhanced to the Next Level';
$d = trim($__env->yieldContent('description')) ?: 'Rovan System & Solution: IT system integrator dan software house. Web design, aplikasi absensi, payroll, HRIS, aplikasi custom, managed services, dan AI Tools.';
$orgLd = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'Rovan System & Solution',
    'alternateName' => 'Rovan System',
    'legalName' => 'PT Rovan Alfa Sejati',
    'slogan' => 'your partner to enhanced to the next level',
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
@yield('og_image')
<meta name="twitter:card" content="summary_large_image">
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
<script>try{var m=localStorage.getItem("rv-theme");if(m)document.documentElement.setAttribute("data-theme",m)}catch(e){}</script>
<script type="application/ld+json">{!! $orgLd !!}</script>
@stack('head')
</head>
<body>
<header><div class="wrap"><nav>
<a class="logo" href="{{ url('/') }}"><i></i>Rovan <span>System & Solution</span></a>
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
<a class="wa" href="https://wa.me/6281234567890?text=Halo%20Rovan%20System" target="_blank" rel="noopener">💬 Chat WhatsApp</a>
<footer><div class="wrap">© {{ date('Y') }} PT Rovan Alfa Sejati · Rovan System & Solution</div></footer>
<script>document.getElementById("thm").onclick=function(){var r=document.documentElement,n=r.getAttribute("data-theme")==="light"?"dark":"light";r.setAttribute("data-theme",n);try{localStorage.setItem("rv-theme",n)}catch(e){}}</script>
@stack('scripts')
</body>
</html>
