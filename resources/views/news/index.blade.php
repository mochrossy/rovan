@extends('layouts.site')
@section('title', 'News & Blog – Rovan System & Solution')
@section('description', 'Artikel dan berita terbaru seputar website, aplikasi absensi, HRIS, dan layanan IT dari Rovan System & Solution.')
@section('content')
<section><div class="wrap">
<h1 style="font-size:2.2rem">News &amp; Blog</h1>
<div class="grid">
@forelse($posts as $p)
<a class="card" href="{{ route('post', $p->slug) }}">
@if($p->cover)<img src="{{ asset('storage/'.$p->cover) }}" alt="{{ $p->title }}" loading="lazy" class="thumb">@endif
<div class="meta">{{ $p->published_at->translatedFormat('d M Y') }}</div><h3>{{ $p->title }}</h3><p>{{ $p->excerpt }}</p></a>
@empty
<p class="sub">Belum ada artikel.</p>
@endforelse
</div>
<div style="margin-top:24px">{{ $posts->links() }}</div>
</div></section>
@endsection
