@extends('layouts.site')
@section('title', 'FAQ – Rovan System & Solution')
@section('description', 'Pertanyaan yang sering diajukan seputar pembuatan website, aplikasi, dan layanan IT Rovan System & Solution.')
@push('head')<script type="application/ld+json">{!! $faqLd !!}</script>@endpush
@section('content')
<section><div class="wrap" style="max-width:800px">
<h1 style="font-size:2.2rem">FAQ</h1><p class="sub">Pertanyaan yang sering diajukan.</p>
@foreach($faq as [$q, $a])
<details><summary>{{ $q }}</summary><p>{{ $a }}</p></details>
@endforeach
</div></section>
@endsection
