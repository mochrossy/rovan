@extends('layouts.admin')
@section('content')
<p><a href="{{ route('admin.messages') }}">← Kembali</a></p>
<h2>{{ $m->name }}</h2>
<p class="meta">{{ $m->created_at->translatedFormat('d F Y H:i') }}@if($m->service) · {{ $m->service }}@endif</p>
<div class="card" style="max-width:720px">{!! nl2br(e($m->message)) !!}</div>
<p style="margin-top:16px">
Email: <a href="mailto:{{ $m->email }}">{{ $m->email }}</a>
@if($m->phone)
<br>Telepon: {{ $m->phone }} ·
<a href="https://wa.me/{{ preg_replace('/\D/', '', $m->phone) }}" target="_blank" rel="noopener">WhatsApp</a>
@endif
</p>
<form method="post" action="{{ route('admin.messages.destroy', $m->id) }}" onsubmit="return confirm('Hapus pesan ini?')">@csrf @method('DELETE')<button class="lnk">Hapus pesan</button></form>
@endsection
