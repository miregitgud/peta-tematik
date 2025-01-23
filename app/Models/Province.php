<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['name', 'alt_name', 'latitude', 'longitude'];

    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }
}
