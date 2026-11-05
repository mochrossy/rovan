@extends('layouts.admin')
@section('content')
<div class="bar"><h2>{{ $c['label'] }}</h2><a class="btn" href="{{ route('admin.create', $type) }}">+ Tambah</a></div>
@if(session('ok'))<p class="ok">{{ session('ok') }}</p>@endif
<table>
<tr><th>Judul</th><th>Diubah</th><th></th></tr>
@forelse($items as $i)
<tr>
<td>{{ $i->title }}@if($type === 'posts' && !$i->published_at) <em>(draft)</em>@endif</td>
<td>{{ $i->updated_at->diffForHumans() }}</td>
<td class="act">
<a href="{{ route('admin.edit', [$type, $i->id]) }}">Edit</a>
<form method="post" action="{{ route('admin.destroy', [$type, $i->id]) }}" onsubmit="return confirm('Hapus data ini?')">@csrf @method('DELETE')<button class="lnk">Hapus</button></form>
</td>
</tr>
@empty
<tr><td colspan="3">Belum ada data.</td></tr>
@endforelse
</table>
{{ $items->links() }}
@endsection
