<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'news_title',
        'news_slug',
        'news_url',
        'news_view',
        'news_desc',
        'news_image',
        'news_thumb',
        'news_stat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
