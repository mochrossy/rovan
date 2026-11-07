@extends('layouts.admin')
@section('content')
<div class="bar"><h2>Messages</h2></div>
@if(session('ok'))<p class="ok">{{ session('ok') }}</p>@endif
<table>
<tr><th>Dari</th><th>Layanan</th><th>Pesan</th><th>Tanggal</th></tr>
@forelse($items as $m)
<tr>
<td>{!! $m->read_at ? e($m->name) : '<b>' . e($m->name) . '</b>' !!}</td>
<td>{{ $m->service }}</td>
<td><a href="{{ route('admin.messages.show', $m->id) }}">{{ \Illuminate\Support\Str::limit($m->message, 70) }}</a></td>
<td>{{ $m->created_at->diffForHumans() }}</td>
</tr>
@empty
<tr><td colspan="4">Belum ada pesan.</td></tr>
@endforelse
</table>
{{ $items->links() }}
@endsection
