@extends('layouts.site')
@section('title', $s['title'] . ' – Rovan System & Solution')
@section('description', $s['summary'])
@section('content')
<section><div class="wrap">
<p class="meta"><a href="{{ route('services') }}">Services</a> › {{ $s['title'] }}</p>
<h1 style="font-size:2.2rem">{{ $s['icon'] }} {{ $s['title'] }}</h1>
<p class="sub">{{ $s['intro'] }}</p>
<div class="grid">
@foreach($s['items'] as [$name, $desc])
<div class="card"><h3>{{ $name }}</h3><p>{{ $desc }}</p></div>
@endforeach
</div></div></section>
<section><div class="wrap"><div class="cta">
<h2>Tertarik dengan {{ $s['title'] }}?</h2>
<p>Ceritakan kebutuhan Anda, kami mulai dari define your baseline.</p>
<a class="btn" href="https://wa.me/6281234567890?text={{ rawurlencode('Halo, saya ingin konsultasi tentang ' . $s['title']) }}" target="_blank" rel="noopener">Konsultasi via WhatsApp</a>
</div></div></section>
<section><div class="wrap">
<h2>Other Services</h2>
<div class="grid">
@foreach($others as $o)
<a class="card" href="{{ route('service', $o['slug']) }}"><div class="ic">{{ $o['icon'] }}</div><h3>{{ $o['title'] }}</h3><p>{{ $o['summary'] }}</p></a>
@endforeach
</div></div></section>
@endsection
