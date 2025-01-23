<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regency;

class RegencyController extends Controller
{
    public function populasi()
    {
        $regencies = Regency::all();

        return view('regency.populasi', [
            'title' => 'Populasi | DKI Jakarta',
            'regencies' => $regencies
        ]);
    }
}
