@extends('layouts.site')
@section('title', 'Kebijakan Privasi – Rovan System & Solution')
@section('description', 'Kebijakan privasi Rovan System & Solution: data apa yang kami kumpulkan lewat website, untuk apa, dan hak Anda.')
@section('content')
<section><div class="wrap legal" style="max-width:780px">
<h1 style="font-size:2.2rem">Kebijakan Privasi</h1>
<p>Terakhir diperbarui: November 2026</p>
<p>Halaman ini menjelaskan bagaimana PT Rovan Alfa Sejati (Rovan System & Solution) memperlakukan data pribadi yang Anda berikan melalui website ini.</p>

<h2>Data yang kami kumpulkan</h2>
<ul>
<li>Data yang Anda isi di formulir kontak: nama, email, nomor telepon (opsional), layanan yang diminati, dan isi pesan.</li>
<li>Alamat IP pengirim formulir, yang kami simpan untuk keamanan dan pencegahan spam.</li>
</ul>

<h2>Tujuan penggunaan</h2>
<ul>
<li>Menanggapi pertanyaan dan permintaan konsultasi Anda.</li>
<li>Menyusun penawaran atau tindak lanjut layanan yang Anda minati.</li>
<li>Menjaga keamanan website dan mencegah penyalahgunaan.</li>
</ul>

<h2>Penyimpanan dan keamanan</h2>
<p>Data disimpan di server yang dikelola oleh kami atau penyedia hosting kami dan hanya dapat diakses oleh pihak yang berwenang. Kami menyimpan data selama diperlukan untuk tujuan di atas, lalu menghapusnya atau menjadikannya anonim.</p>

<h2>Layanan pihak ketiga</h2>
<p>Halaman Contact menampilkan peta dari Google Maps, sehingga Google dapat memproses data teknis kunjungan Anda sesuai kebijakan Google. Kami tidak menjual data pribadi Anda kepada pihak lain.</p>

<h2>Hak Anda</h2>
<p>Anda dapat meminta akses, perbaikan, atau penghapusan data pribadi Anda dengan menghubungi kami melalui email {{ config('rovan.email') }}.</p>

<h2>Perubahan kebijakan</h2>
<p>Kebijakan ini dapat diperbarui sewaktu-waktu. Versi terbaru selalu ditampilkan di halaman ini.</p>

<h2>Kontak</h2>
<p>{{ config('rovan.address') }}<br>{{ config('rovan.email') }} · {{ config('rovan.phone') }}</p>
<p><a href="{{ route('contact') }}"><b>Hubungi Rovan →</b></a></p>
</div></section>
@endsection
