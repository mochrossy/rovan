@extends('layouts.site')
@section('title', $p->title . ' – Portfolio – Rovan System & Solution')
@section('description', \Illuminate\Support\Str::limit($p->description, 155))
@if($p->image)
@section('og_image')<meta property="og:image" content="{{ asset('storage/' . $p->image) }}">@endsection
@endif
@section('content')
<section><div class="wrap" style="max-width:920px">
<p class="meta"><a href="{{ route('portfolio') }}">Portfolio</a> › {{ $p->title }}</p>
<h1 style="font-size:2.2rem">{{ $p->title }}</h1>
<p class="meta">{{ \App\Models\Portfolio::TYPES[$p->type] ?? 'Proyek' }}@if($p->client) · {{ $p->client }}@endif @if($p->year) · {{ $p->year }}@endif</p>
@if($p->image)
<img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->title }}" class="thumb" style="margin:18px 0">
@endif
<p class="sub">{{ $p->description }}</p>
@if($p->type === 'sample')
<p class="note" style="text-align:left">Ini adalah contoh atau mockup untuk memperlihatkan kemampuan kami, bukan proyek klien.</p>
@endif
<div class="grid" style="margin-top:20px">
@if($p->challenge)
<div class="card"><div class="num">01</div><h3>Kondisi awal (baseline)</h3><p>{{ $p->challenge }}</p></div>
@endif
@if($p->solution)
<div class="card"><div class="num">02</div><h3>Solusi</h3><p>{{ $p->solution }}</p></div>
@endif
@if($p->result)
<div class="card"><div class="num">03</div><h3>Hasil</h3><p>{{ $p->result }}</p></div>
@endif
</div>
@if($p->tech)
<p style="margin-top:20px"><b>Teknologi:</b> {{ $p->tech }}</p>
@endif
@if($p->serviceInfo())
<p>Layanan terkait: <a href="{{ route('service.item', [$p->serviceInfo()['category']['slug'], $p->serviceInfo()['item']['slug']]) }}"><b>{{ $p->serviceInfo()['category']['title'] }} › {{ $p->serviceInfo()['item']['title'] }} →</b></a></p>
@endif
@if($p->url)
<p><a href="{{ $p->url }}" target="_blank" rel="noopener"><b>Kunjungi proyek →</b></a></p>
@endif
</div></section>
<section><div class="wrap"><div class="cta">
<h2>Butuh solusi serupa?</h2>
<p>Ceritakan kondisi Anda saat ini, kami mulai dari define your baseline.</p>
<a class="btn" href="{{ route('contact', ['service' => $p->serviceInfo()['item']['title'] ?? null]) }}">Hubungi Rovan</a>
</div></div></section>
@endsection
