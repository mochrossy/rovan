@extends('layouts.admin')
@section('content')
<h2>Tambah Pengguna</h2>
<form method="post" action="{{ route('admin.users.store') }}" class="frm">
@csrf
<label>Nama *<input type="text" name="name" value="{{ old('name') }}">@error('name')<small class="err">{{ $message }}</small>@enderror</label>
<label>Email *<input type="email" name="email" value="{{ old('email') }}">@error('email')<small class="err">{{ $message }}</small>@enderror</label>
<label>Peran *
<select name="role">
@foreach(\App\Support\Roles::LABELS as $k => $v)<option value="{{ $k }}" @selected(old('role') === $k)>{{ $v }}</option>@endforeach
</select></label>
<label>Password * (min. 10 karakter)<input type="password" name="password">@error('password')<small class="err">{{ $message }}</small>@enderror</label>
<button class="btn">Simpan</button>
</form>
@endsection
