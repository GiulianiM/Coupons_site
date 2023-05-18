<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Resources\Faq;
use App\Models\Resources\Promozione;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $promozioni = null;
        $promozioniPaginated = null;

        if ($search) {
            $promozioniPaginated = Promozione::query()
                ->where('titolo', 'LIKE', "%{$search}%")
                ->orWhere('descrizione', 'LIKE', "%{$search}%")
                ->paginate(12);
        } else {
            $promozioni = Promozione::all();
            $promozioniPaginated = Promozione::paginate(12);
        }

        return view('homepage', compact('promozioni', 'promozioniPaginated'));
    }


    public function aziende() {
        $aziende = Azienda::paginate(16);
        return view('aziende', compact('aziende'));
    }

    public function azienda($id) {
        $azienda = Azienda::findOrFail($id);
        $promozioni = Promozione::where('idAzienda', $id)->paginate(8);
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
