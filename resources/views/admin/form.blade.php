@extends('layouts.admin')
@section('content')
<h2>{{ $item->exists ? 'Edit' : 'Tambah' }} {{ $c['label'] }}</h2>
<form method="post" enctype="multipart/form-data" class="frm"
  action="{{ $item->exists ? route('admin.update', [$type, $item->id]) : route('admin.store', $type) }}">
@csrf
@if($item->exists) @method('PUT') @endif
@foreach($c['fields'] as $name => [$kind, $req])
<label>{{ str($name)->replace('_', ' ')->title() }}@if($req) *@endif
@if($kind === 'textarea')
<textarea name="{{ $name }}" rows="{{ $name === 'body' ? 12 : 3 }}">{{ old($name, $item->$name) }}</textarea>
@elseif($kind === 'file')
<input type="file" name="{{ $name }}" accept="image/*">
@if($item->$name)<small>Saat ini: {{ $item->$name }}</small>@endif
@else
<input type="{{ $kind }}" name="{{ $name }}" value="{{ old($name, ($kind === 'datetime-local' && $item->$name) ? $item->$name->format('Y-m-d\TH:i') : $item->$name) }}">
@endif
@error($name)<small class="err">{{ $message }}</small>@enderror
</label>
@endforeach
@if($type === 'portfolios')
<label class="chk"><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $item->is_published ?? true))> Tampilkan di situs</label>
@endif
@if($type === 'posts')<small>Kosongkan "Published At" untuk menyimpan sebagai draft.</small>@endif
<button class="btn">Simpan</button>
</form>
@endsection
