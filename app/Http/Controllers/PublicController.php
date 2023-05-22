<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Resources\Faq;
use App\Models\Resources\Promozione;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $searchCompany = $request->input('company');
        $searchDescription = $request->input('description');
        $promozioniCarosello = null;

        if ($searchCompany || $searchDescription) {
            $query = Promozione::query();

            if ($searchCompany) {
                $query->whereHas('azienda', function ($query) use ($searchCompany) {
                    $query->where('nome', 'LIKE', "%{$searchCompany}%");
                });
            }

            if ($searchDescription) {
                $query->where('fine', '>', Carbon::now())->where('descrizione', 'LIKE', "%{$searchDescription}%");
            }

            $promozioniPaginated = $query->paginate(12);
        } else {
            $promozioniCarosello = Promozione::where('inizio', '>=', Carbon::now()->subDays(2))->where('fine', '>', Carbon::now())->get();
            $promozioniPaginated = Promozione::where('fine', '>', Carbon::now())->paginate(12);
        }

        return view('homepage', compact('promozioniCarosello', 'promozioniPaginated'));
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

        if (Carbon::now()->isAfter($promozione->fine)) {
            return view('expired_promozione');
        }

        return view('promozione', compact('promozione'));
    }

    public function faq() {
        $faqs = FAQ::all();
        return view('faq', compact('faqs'));
    }

}
