@extends('layouts.admin')
@section('content')
<div class="bar"><h2>Users</h2><a class="btn" href="{{ route('admin.users.create') }}">+ Tambah</a></div>
@if(session('ok'))<p class="ok">{{ session('ok') }}</p>@endif
<table>
<tr><th>Nama</th><th>Email</th><th>Peran</th><th></th></tr>
@foreach($users as $u)
<tr>
<td>{{ $u->name }}</td><td>{{ $u->email }}</td>
<td>{{ \App\Support\Roles::LABELS[$u->role] ?? $u->role }}</td>
<td class="act">
@if($u->id !== auth()->id())
<form method="post" action="{{ route('admin.users.destroy', $u->id) }}" onsubmit="return confirm('Hapus pengguna ini?')">@csrf @method('DELETE')<button class="lnk">Hapus</button></form>
@endif
</td>
</tr>
@endforeach
</table>
@endsection
