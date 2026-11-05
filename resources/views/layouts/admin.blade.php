<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>Admin – Rovan System & Solution</title>
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head><body>
<header><div class="wrap"><nav>
<a class="logo" href="{{ url('/admin') }}">Rovan<span>Admin</span></a>
<ul><li><a href="{{ route('admin.index','posts') }}">News</a></li><li><a href="{{ route('admin.index','portfolios') }}">Portfolio</a></li><li><a href="{{ url('/') }}" target="_blank">Lihat situs</a></li>
<li><form method="post" action="{{ route('logout') }}">@csrf<button class="lnk">Keluar</button></form></li></ul>
</nav></div></header>
<div class="wrap adm">@yield('content')</div>
</body></html>
