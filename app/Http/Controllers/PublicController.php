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

    public function azienda($id) {
        $azienda = Azienda::findOrFail($id);
        $promozioni = Promozione::where('idAzienda', $id)->get();
        return view('azienda', compact('azienda', 'promozioni'));
    }

    public function promozione($id) {
        $promozione = Promozione::findOrFail($id);
        return view('promozione', compact('promozione'));
    }

    public function faq() {
        $faqs = FAQ::all();
        return view('faq', compact('faqs'));
    }

}
