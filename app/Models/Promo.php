<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Promo extends Model
{

    protected $fillable = [
        'title', 'thumbnail', 'lokasi_thumbnail',
        'deskripsi', 'artikel', 'status',
        'tanggal_mulai', 'tanggal_akhir', 'nama_vendor'
    ];

    public function getPhotoFullLinkAttribute()
    {
        return env('APP_URL', true).Storage::url($this->attributes['id']) ;
    }
}
