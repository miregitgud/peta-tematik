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

    public function luas()
    {
        $regencies = Regency::all();

        return view('regency.luas', [
            'title' => 'Luas Wilayah | DKI Jakarta',
            'regencies' => $regencies
        ]);
    }

    public function penyakit()
    {
        $regencies = Regency::all();

        return view('regency.penyakit', [
            'title' => 'Penyakit | DKI Jakarta',
            'regencies' => $regencies
        ]);
    }
}
