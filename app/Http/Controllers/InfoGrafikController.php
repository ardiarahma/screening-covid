<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoGrafikController extends Controller
{
    public function indexDIY()
    {
        return view('info-grafik.index');
    }

    public function indexJATENG()
    {
        return view('info-grafik.index-jateng');
    }
}
