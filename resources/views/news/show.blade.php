@extends('layouts.site')
@section('title', ($post->meta_title ?: $post->title) . ' – Rovan System & Solution')
@section('description', $post->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($post->excerpt ?: $post->body), 155))
@if($post->cover)
@section('og_image')<meta property="og:image" content="{{ asset('storage/'.$post->cover) }}">@endsection
@endif
@push('head')<script type="application/ld+json">{!! $ld !!}</script>@endpush
@section('content')
<article class="wrap post">
<p class="meta">{{ $post->published_at->translatedFormat('d F Y') }}</p>
<h1 style="font-size:2.2rem">{{ $post->title }}</h1>
@if($post->cover)<img src="{{ asset('storage/'.$post->cover) }}" alt="{{ $post->title }}" class="thumb">@endif
<div class="body">{!! nl2br(e($post->body)) !!}</div>
<p><a href="{{ route('news') }}">← Kembali ke News</a></p>
</article>
@endsection
