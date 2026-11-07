@php
    $steps = [
        ['Define your baseline', 'Kami memetakan kondisi Anda saat ini.'],
        ['Set clear micro goals', 'Target dipecah menjadi tahapan kecil dengan kriteria selesai.'],
        ['Embrace feedback', 'Demo berkala dan masukan Anda mengarahkan pengerjaan.'],
        ['Maintenance feedback', 'Setelah rilis, umpan balik dipantau dan dirawat.'],
        ['Review and refine', 'Evaluasi berkala terhadap baseline untuk penyempurnaan.'],
    ];
@endphp
@extends('layouts.site')
@section('title', $it['title'] . ' – ' . $s['title'] . ' – Rovan System & Solution')
@section('description', \Illuminate\Support\Str::limit($it['desc'], 155))
@push('head')<script type="application/ld+json">{!! $ld !!}</script>@endpush
@section('content')
<section><div class="wrap" style="max-width:920px">
<p class="meta"><a href="{{ route('services') }}">Services</a> › <a href="{{ route('service', $s['slug']) }}">{{ $s['title'] }}</a> › {{ $it['title'] }}</p>
<h1 style="font-size:2.2rem">{{ $it['title'] }}</h1>
<p class="sub">{{ $it['desc'] }}</p>
<div class="grid" style="grid-template-columns:repeat(auto-fit,minmax(280px,1fr))">
<div class="card"><h3>Yang Anda dapatkan</h3>
<ul class="list">
@foreach($it['features'] as $f)
<li>{{ $f }}</li>
@endforeach
</ul></div>
<div class="card"><h3>Cocok untuk</h3><p>{{ $it['for'] }}</p>
<h3 style="margin-top:18px">Hasil yang diterima</h3>
<ul class="list">
@foreach($it['output'] as $o)
<li>{{ $o }}</li>
@endforeach
</ul></div>
</div>
@if($it['note'])
<p class="note" style="text-align:left">Catatan: {{ $it['note'] }}</p>
@endif
</div></section>

<section><div class="wrap" style="max-width:920px">
<h2>Bagaimana Kami Mengerjakannya</h2>
<p class="sub">Setiap proyek mengikuti metode Rovan di dalam siklus SDLC, supaya hasilnya terukur. <a href="{{ route('about') }}"><b>Pelajari metode kami →</b></a></p>
<div class="grid">
@foreach($steps as $n => [$h, $p])
<div class="card"><div class="num">0{{ $n + 1 }}</div><h3>{{ $h }}</h3><p>{{ $p }}</p></div>
@endforeach
</div></div></section>

<section><div class="wrap"><div class="cta">
<h2>Tertarik dengan {{ $it['title'] }}?</h2>
<p>Ceritakan kondisi Anda saat ini, kami mulai dari define your baseline.</p>
<a class="btn" href="{{ route('contact', ['service' => $it['title']]) }}">Hubungi Rovan</a>
</div></div></section>

@if(count($others))
<section><div class="wrap">
<h2>Layanan Lain di {{ $s['title'] }}</h2>
<div class="grid">
@foreach($others as $o)
<a class="card" href="{{ route('service.item', [$s['slug'], $o['slug']]) }}"><h3>{{ $o['title'] }}</h3><p>{{ \Illuminate\Support\Str::limit($o['desc'], 100) }}</p></a>
@endforeach
</div></div></section>
@endif
@endsection
