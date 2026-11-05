@extends('layouts.site')
@section('title', 'Portfolio – Rovan System & Solution')
@section('description', 'Proyek dan klien yang telah bekerja sama dengan Rovan System & Solution: HRIS, aplikasi custom, migrasi database, dan managed services.')
@section('content')
<section><div class="wrap">
<h1 style="font-size:2.2rem">Portfolio</h1>
<div class="grid">
@forelse($items as $p)
<div class="card">
@if($p->image)<img src="{{ asset('storage/'.$p->image) }}" alt="{{ $p->title }}" loading="lazy" class="thumb">@endif
<div class="meta">{{ $p->client }} · {{ $p->category }}</div><h3>{{ $p->title }}</h3><p>{{ $p->description }}</p>
@if($p->tech)<p class="meta" style="margin-top:8px">{{ $p->tech }}</p>@endif
</div>
@empty
<p class="sub">Belum ada portfolio.</p>
@endforelse
</div></div></section>
@endsection
