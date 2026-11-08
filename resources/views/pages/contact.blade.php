@extends('layouts.site')
@section('title', 'Contact – Rovan System & Solution')
@section('description', 'Hubungi Rovan System & Solution untuk konsultasi website, aplikasi, dan layanan IT. Alamat, telepon, email, dan formulir kontak.')
@php
    $c = config('rovan');
    $mapQ = urlencode($c['map_query'] ?: $c['address']);
    $groups = array_map(fn ($s) => ['title' => $s['title'], 'items' => array_column($s['items'], 'title')], \App\Support\ServiceCatalog::all());
    $ld = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => 'Rovan System & Solution',
        'url' => url('/'),
        'telephone' => $c['phone'],
        'email' => $c['email'],
        'address' => ['@type' => 'PostalAddress', 'streetAddress' => $c['address'], 'addressCountry' => 'ID'],
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp
@push('head')<script type="application/ld+json">{!! $ld !!}</script>@endpush
@section('content')
<section><div class="wrap">
<h1 style="font-size:2.2rem">Hubungi Kami</h1>
<p class="sub">Ceritakan kebutuhan bisnis Anda, kami bantu rancang langkah pertamanya.</p>
<div class="cgrid">
<div class="cinfo">
<div class="card"><h3>📍 Alamat</h3><p>{{ $c['address'] }}</p>
<p style="margin-top:8px"><a href="https://www.google.com/maps/search/?api=1&query={{ $mapQ }}" target="_blank" rel="noopener"><b>Buka di Google Maps →</b></a></p></div>
<div class="card"><h3>📞 Telepon</h3><p><a href="tel:{{ preg_replace('/[^+\d]/', '', $c['phone']) }}">{{ $c['phone'] }}</a></p></div>
<div class="card"><h3>✉️ Email</h3><p><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></p></div>
<div class="card"><h3>🕒 Jam Operasional</h3><p>{{ $c['hours'] }}</p></div>
<a class="btn" style="text-align:center" href="https://wa.me/{{ $c['whatsapp'] }}?text={{ rawurlencode('Halo Rovan System & Solution') }}" target="_blank" rel="noopener">💬 Chat WhatsApp</a>
</div>

<form id="form" method="post" action="{{ route('contact.store') }}" class="frm card">
@csrf
<h3>Kirim Pesan</h3>
@if(session('sent'))<p class="ok">Terima kasih! Pesan Anda sudah kami terima dan akan dibalas secepatnya.</p>@endif
<label>Nama *<input type="text" name="name" value="{{ old('name') }}" autocomplete="name">@error('name')<small class="err">{{ $message }}</small>@enderror</label>
<label>Email *<input type="email" name="email" value="{{ old('email') }}" autocomplete="email">@error('email')<small class="err">{{ $message }}</small>@enderror</label>
<label>Telepon / WhatsApp<input type="tel" name="phone" value="{{ old('phone') }}" autocomplete="tel">@error('phone')<small class="err">{{ $message }}</small>@enderror</label>
<label>Layanan yang diminati
<select name="service">
<option value="">Pilih layanan (opsional)</option>
@foreach($groups as $g)
<optgroup label="{{ $g['title'] }}">
<option value="{{ $g['title'] }}" @selected(old('service', request('service')) === $g['title'])>{{ $g['title'] }} (umum)</option>
@foreach($g['items'] as $t)
<option value="{{ $t }}" @selected(old('service', request('service')) === $t)>{{ $t }}</option>
@endforeach
</optgroup>
@endforeach
<option value="Lainnya" @selected(old('service', request('service')) === 'Lainnya')>Lainnya</option>
</select></label>
<label>Pesan *<textarea name="message" rows="5">{{ old('message') }}</textarea>@error('message')<small class="err">{{ $message }}</small>@enderror</label>
<div class="hp" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
<label class="chk"><input type="checkbox" name="consent" value="1" @checked(old('consent'))> Saya setuju data saya digunakan untuk menanggapi pesan ini, sesuai <a href="{{ route('privacy') }}" target="_blank">Kebijakan Privasi</a>.</label>
@error('consent')<small class="err">Mohon centang persetujuan.</small>@enderror
<button class="btn">Kirim Pesan</button>
</form>
</div>

<iframe class="map" title="Lokasi Rovan System & Solution" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
 src="https://www.google.com/maps?q={{ $mapQ }}&output=embed"></iframe>
</div></section>
@endsection
