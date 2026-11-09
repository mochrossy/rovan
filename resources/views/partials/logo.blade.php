@if(file_exists(public_path('images/logo.png')))
<img src="{{ asset('images/logo.png') }}" alt="Logo Rovan">
@else
<i></i>
@endif
<span class="wm"><b>ROVAN</b><small>SYSTEM &amp; SOLUTION</small></span>
