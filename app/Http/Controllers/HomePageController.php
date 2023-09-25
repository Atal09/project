<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomePageController extends Controller
{
    public function index($naam = 'gast')
    {
        $welkomstTekst = "Welkom op onze website!";

        if ($naam) {
            $welkomstTekst = "Hallo $naam";
        }

        return view('home_page', compact('welkomstTekst'));
    }
}
