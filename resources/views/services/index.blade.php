@extends('layouts.site')
@section('title', 'Services – Rovan System & Solution')
@section('description', 'Services Rovan System & Solution: web design, pembuatan aplikasi, managed services, dan AI Tools.')
@section('content')
<section><div class="wrap">
<h1 style="font-size:2.2rem">Our Services</h1>
<p class="sub">Dari tampilan depan sampai infrastruktur di belakangnya.</p>
<div class="grid">
@foreach($services as $s)
<a class="card" href="{{ route('service', $s['slug']) }}"><div class="ic">{{ $s['icon'] }}</div><h3>{{ $s['title'] }}</h3><p>{{ $s['summary'] }}</p>
<p class="meta" style="margin-top:10px">{{ count($s['items']) }} services →</p></a>
@endforeach
</div></div></section>
@endsection
