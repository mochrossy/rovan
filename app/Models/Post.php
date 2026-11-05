<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    protected $casts = ['published_at' => 'datetime'];

    public function scopeLive($q) {
        return $q->whereNotNull('published_at')->where('published_at', '<=', now());
    }
}
