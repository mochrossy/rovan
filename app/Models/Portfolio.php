<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = [];
    protected $casts = ['is_published' => 'boolean'];

    public function scopeLive($q) {
        return $q->where('is_published', true)->orderBy('sort_order')->latest();
    }
}
