<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_name','event_slug','event_url','event_link','event_deadline','event_source','event_rank','event_cost',
        'event_image','event_thumb','event_desc','event_key','event_stat','created_at','updated_at','event_view'
    ];

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class);
    }
}
