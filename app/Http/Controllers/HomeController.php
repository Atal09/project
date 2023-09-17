<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index($naam = 'gast')
    {
        $welkomstTekst = "Welkom op onze website!";

        // Controleren of $naam is ingevuld en zo ja, de welkomsttekst aanpassen
        if ($naam) {
            $welkomstTekst = "Hallo $naam";
        }

        return view('home', compact('welkomstTekst'));
    }
}
