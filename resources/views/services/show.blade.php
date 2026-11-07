@extends('layouts.site')
@section('title', $s['title'] . ' – Rovan System & Solution')
@section('description', $s['summary'])
@section('content')
<section><div class="wrap">
<p class="meta"><a href="{{ route('services') }}">Services</a> › {{ $s['title'] }}</p>
<h1 style="font-size:2.2rem">{{ $s['icon'] }} {{ $s['title'] }}</h1>
<p class="sub">{{ $s['intro'] }}</p>
<div class="grid">
@foreach($s['items'] as $it)
<a class="card" href="{{ route('service.item', [$s['slug'], $it['slug']]) }}"><h3>{{ $it['title'] }}</h3><p>{{ $it['desc'] }}</p><p class="meta" style="margin-top:10px">Detail →</p></a>
@endforeach
</div></div></section>
<section><div class="wrap"><div class="cta">
<h2>Tertarik dengan {{ $s['title'] }}?</h2>
<p>Ceritakan kebutuhan Anda, kami mulai dari define your baseline.</p>
<a class="btn" href="{{ route('contact', ['service' => $s['title']]) }}">Hubungi Rovan</a>
</div></div></section>
<section><div class="wrap">
<h2>Other Services</h2>
<div class="grid">
@foreach($others as $o)
<a class="card" href="{{ route('service', $o['slug']) }}"><div class="ic">{{ $o['icon'] }}</div><h3>{{ $o['title'] }}</h3><p>{{ $o['summary'] }}</p></a>
@endforeach
</div></div></section>
@endsection
