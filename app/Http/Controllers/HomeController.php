<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // qui ci passso la funzzione per il web:
    public function home() {
        // Restituisco la view:
        return view('initial');
    }
}
