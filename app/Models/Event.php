<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_name','event_slug','event_url','event_link','event_deadline','event_source','event_rank','event_cost',
        'image','thumbnail','event_desc','event_key','event_stat','created_at','updated_at','event_view'
    ];

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class);
    }

    public function getThumbnailAttribute($value)
    {
        return asset('image_evnt/'.$value);
    }

    public function getImageAttribute($value)
    {
        return asset('evnt_image/'.$value);
    }

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d F Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d F Y');
    }

    public function getEventDeadlineAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d F Y');
    }
}
