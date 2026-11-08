<?php
namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Post;

class PageController extends Controller
{
    public function home()
    {
        $faq = \App\Support\ServiceCatalog::faq();
        $faqLd = json_encode([
            '@context' => 'https://schema.org', '@type' => 'FAQPage',
            'mainEntity' => array_map(fn ($f) => [
                '@type' => 'Question', 'name' => $f[0],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]],
            ], $faq),
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        return view('home', [
            'faq' => $faq, 'faqLd' => $faqLd,
            'portfolios' => Portfolio::live()->take(4)->get(),
            'posts' => Post::live()->latest('published_at')->take(3)->get(),
        ]);
    }

    public function news()
    {
        return view('news.index', ['posts' => Post::live()->latest('published_at')->paginate(9)]);
    }

    public function post(string $slug)
    {
        $post = Post::live()->where('slug', $slug)->firstOrFail();
        $ld = json_encode([
            '@context' => 'https://schema.org', '@type' => 'Article',
            'headline' => $post->title,
            'datePublished' => $post->published_at->toIso8601String(),
            'dateModified' => $post->updated_at->toIso8601String(),
            'image' => $post->cover ? asset('storage/' . $post->cover) : null,
            'publisher' => ['@type' => 'Organization', 'name' => 'Rovan System & Solution'],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return view('news.show', compact('post', 'ld'));
    }

    public function portfolio()
    {
        return view('portfolio.index', ['items' => Portfolio::live()->get()]);
    }

    public function sitemap()
    {
        $urls = [[url('/'), now()], [route('news'), now()], [route('portfolio'), now()],
            [route('about'), now()], [route('services'), now()], [route('faq'), now()], [route('contact'), now()], [route('privacy'), now()]];
        foreach (\App\Support\ServiceCatalog::all() as $sv) {
            $urls[] = [route('service', $sv['slug']), now()];
            foreach ($sv['items'] as $it) $urls[] = [route('service.item', [$sv['slug'], $it['slug']]), now()];
        }
        foreach (Post::live()->get() as $p) $urls[] = [route('post', $p->slug), $p->updated_at];
        $xml = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($urls as [$loc, $at]) $xml .= '<url><loc>' . e($loc) . '</loc><lastmod>' . $at->toDateString() . '</lastmod></url>';
        return response($xml . '</urlset>', 200, ['Content-Type' => 'application/xml']);
    }
}
