<?php
namespace App\Models;

use App\Support\ServiceCatalog;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public const TYPES = [
        'client' => 'Proyek Klien',
        'sample' => 'Contoh / Mockup',
        'internal' => 'Proyek Internal',
    ];

    protected $guarded = [];
    protected $casts = ['is_published' => 'boolean'];

    public function scopeLive($q) {
        return $q->where('is_published', true)->orderBy('sort_order')->latest();
    }

    /** ['category' => [...], 'item' => [...]] untuk sub-layanan terkait, atau null. */
    public function serviceInfo(): ?array
    {
        return $this->service_slug ? ServiceCatalog::lookup($this->service_slug) : null;
    }
}
