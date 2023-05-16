<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AziendaController extends Controller
{
    public function index() {
        return view('azienda');
    }
}
