<a class="card" href="{{ route('work', $p->slug ?: $p->id) }}">
@if($p->image)
<img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->title }}" loading="lazy" class="thumb">
@endif
<div class="meta">{{ \App\Models\Portfolio::TYPES[$p->type] ?? 'Proyek' }}@if($p->serviceInfo()) · {{ $p->serviceInfo()['item']['title'] }}@endif</div>
<h3>{{ $p->title }}</h3>
<p>{{ \Illuminate\Support\Str::limit($p->description, 110) }}</p>
</a>
