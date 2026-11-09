@php
    $types = \App\Support\Roles::types(\App\Support\Roles::current());
    $isAdmin = \App\Support\Roles::isAdmin();
    $unread = $isAdmin ? \App\Models\ContactMessage::whereNull('read_at')->count() : 0;
@endphp
<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>Admin – Rovan System & Solution</title>
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head><body>
<header><div class="wrap"><nav>
<a class="logo" href="{{ url('/admin') }}"><span class="wm"><b>ROVAN</b><small>ADMIN</small></span></a>
<ul>
@if(in_array('posts', $types))
<li><a href="{{ route('admin.index', 'posts') }}">News</a></li>
@endif
@if(in_array('portfolios', $types))
<li><a href="{{ route('admin.index', 'portfolios') }}">Portfolio</a></li>
@endif
@if(in_array('slides', $types))
<li><a href="{{ route('admin.index', 'slides') }}">Slides</a></li>
@endif
@if($isAdmin)
<li><a href="{{ route('admin.messages') }}">Messages{{ $unread ? ' (' . $unread . ')' : '' }}</a></li>
<li><a href="{{ route('admin.users') }}">Users</a></li>
@endif
<li><a href="{{ url('/') }}" target="_blank">Lihat situs</a></li>
<li><form method="post" action="{{ route('logout') }}">@csrf<button class="lnk">Keluar</button></form></li>
</ul>
</nav></div></header>
<div class="wrap adm">@yield('content')</div>
</body></html>
