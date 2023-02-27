<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Halte extends Model
{
    protected $fillable = [
        'nama', 'alamat', 'long', 'lat', 'status',
        'keterangan', 'created_by', 'updated_by'
    ];

    public function dibuatoleh()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function diupdateoleh()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
