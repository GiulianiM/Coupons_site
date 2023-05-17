<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Resources\Faq;
use App\Models\Resources\Promozione;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
        $promozioni = Promozione::all();
        return view('homepage', compact('promozioni'));
    }

    public function aziende() {
        $aziende = Azienda::all();
        return view('aziende', compact('aziende'));
    }

    public function faq() {
        return view('faq');
    }

    public function login() {
        return view('login');
    }

    public function signup() {
        return view('auth/signup');
    }
}
