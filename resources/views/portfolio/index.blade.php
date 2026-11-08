@extends('layouts.site')
@section('title', 'Portfolio – Rovan System & Solution')
@section('description', 'Portfolio Rovan System & Solution: contoh pekerjaan dan mockup website, aplikasi, managed services, dan AI Tools.')
@section('content')
<section><div class="wrap">
<h1 style="font-size:2.2rem">Portfolio</h1>
<p class="sub">Contoh pekerjaan dan mockup yang terkait dengan layanan kami.</p>
<div class="chips">
<a class="chip {{ $cat ? '' : 'on' }}" href="{{ route('portfolio') }}">Semua</a>
@foreach($cats as $k => $c)
<a class="chip {{ $cat === $k ? 'on' : '' }}" href="{{ route('portfolio', ['category' => $k]) }}">{{ $c['title'] }}</a>
@endforeach
</div>
<div class="grid">
@forelse($items as $p)
@include('partials.work-card', ['p' => $p])
@empty
<p class="sub">Belum ada portfolio di kategori ini.</p>
@endforelse
</div></div></section>
@endsection
