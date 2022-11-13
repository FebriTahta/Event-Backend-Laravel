<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['kategori_name','kategori_slug'];
    use HasFactory;

    public function event()
    {
        return $this->belongsToMany(Event::class);
    }
}
