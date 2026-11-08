<?php
namespace App\Http\Controllers;

use App\Support\ServiceCatalog;

class ServicePageController extends Controller
{
    public function about()    { return view('pages.about'); }
    public function contact()  { return view('pages.contact'); }
    public function privacy()  { return view('pages.privacy'); }

    public function faq()
    {
        $faq = ServiceCatalog::faq();
        $faqLd = json_encode([
            '@context' => 'https://schema.org', '@type' => 'FAQPage',
            'mainEntity' => array_map(fn ($f) => [
                '@type' => 'Question', 'name' => $f[0],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]],
            ], $faq),
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return view('pages.faq', compact('faq', 'faqLd'));
    }

    public function services()
    {
        return view('services.index', ['services' => ServiceCatalog::all()]);
    }

    public function serviceItem(string $category, string $item)
    {
        $all = ServiceCatalog::all();
        abort_unless(isset($all[$category]), 404);
        $s = $all[$category];
        $it = collect($s['items'])->firstWhere('slug', $item);
        abort_unless($it, 404);
        $others = array_values(array_filter($s['items'], fn ($x) => $x['slug'] !== $item));
        $ld = json_encode([
            '@context' => 'https://schema.org', '@type' => 'Service',
            'name' => $it['title'], 'description' => $it['desc'],
            'serviceType' => $s['title'], 'areaServed' => 'ID',
            'provider' => ['@type' => 'Organization', 'name' => 'Rovan System & Solution', 'url' => url('/')],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return view('services.item', compact('s', 'it', 'others', 'ld'));
    }

    public function service(string $slug)
    {
        $all = ServiceCatalog::all();
        abort_unless(isset($all[$slug]), 404);
        $others = array_filter($all, fn ($s) => $s['slug'] !== $slug);
        return view('services.show', ['s' => $all[$slug], 'others' => $others]);
    }
}
