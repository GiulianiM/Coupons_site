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
    public function adminCompanies() {
        return view('admin/aziende');
    }
    public function adminFaq() {
        return view('admin/faq');
    }
    public function adminUsers() {
        return view('admin/utenti');
    }
    public function adminStaff() {
        return view('admin/staff');
    }
    public function staffPromo() {
        return view('staff/promozioni');
    }

}
