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
        'image',
        'thumbnail',
        'news_stat',
        'tag_id',
        'news_views'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function getThumbnailAttribute($value)
    {
        return asset('image_news/'.$value);
    }

    public function getImageAttribute($value)
    {
        return asset('news_image/'.$value);
    }

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d m Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d m Y');
    }
}
