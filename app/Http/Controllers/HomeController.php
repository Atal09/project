<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        return view('home');

        $welkomstTekst = "Welkom op onze website!";
        return view('home', compact('welkomstTekst'));
    }
}
