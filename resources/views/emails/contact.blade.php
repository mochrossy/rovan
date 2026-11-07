<div style="font-family:Arial,sans-serif;font-size:15px;line-height:1.6;color:#222">
<h2 style="margin:0 0 12px">Pesan baru dari form kontak</h2>
<p><b>Nama:</b> {{ $m->name }}<br>
<b>Email:</b> {{ $m->email }}<br>
<b>Telepon:</b> {{ $m->phone ?: '-' }}<br>
<b>Layanan:</b> {{ $m->service ?: '-' }}</p>
<p style="padding:12px;background:#f4f5f9;border-radius:8px">{!! nl2br(e($m->message)) !!}</p>
<p><a href="{{ url('/admin/messages/' . $m->id) }}">Buka di dashboard</a></p>
</div>
