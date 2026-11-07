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

    public function service(string $slug)
    {
        $all = ServiceCatalog::all();
        abort_unless(isset($all[$slug]), 404);
        $others = array_filter($all, fn ($s) => $s['slug'] !== $slug);
        return view('services.show', ['s' => $all[$slug], 'others' => $others]);
    }
}
