<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $fillable = ['province_id', 'name', 'alt_name', 'latitude', 'longitude', 'luas', 'populasi', 'kekerasan', 'type_polygon', 'polygon'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
