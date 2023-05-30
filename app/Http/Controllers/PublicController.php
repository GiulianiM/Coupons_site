<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Resources\Faq;
use App\Models\Resources\Promozione;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PublicController extends Controller
{
    public function index()
    {
        $promozioniCarosello = Promozione::where('inizio', '>=', Carbon::now()->subDays(2))
            ->where('fine', '>', Carbon::now())
            ->where('visibile', true)
            ->get();

        $promozioni = Promozione::where('fine', '>', Carbon::now())->get();
        $promozioniPaginated = Promozione::where('fine', '>', Carbon::now())->paginate(12);

        return view('homepage', compact('promozioniCarosello', 'promozioni', 'promozioniPaginated'));
    }

    public function aziende()
    {
        $aziende = Azienda::where('visibile', true)
            ->paginate(16);
        return view('aziende', compact('aziende'));
    }

    public function azienda($id)
    {
        $azienda = Azienda::findOrFail($id);
        $promozioni = Promozione::where('idAzienda', $id)->where('fine', '>', Carbon::now())->paginate(8);
        return view('azienda', compact('azienda', 'promozioni'));
    }

    public function promozione($id)
    {
        $promozione = Promozione::findOrFail($id);

        if (Carbon::now()->isAfter($promozione->fine)) {
            return view('expired_promozione');
        }

        return view('promozione', compact('promozione'));
    }

    public function faq()
    {
        $faqs = FAQ::all();
        return view('faq', compact('faqs'));
    }

    public function company()
    {
        return view('footer.company');
    }

    public function utilizzo()
    {
        return view('footer.utilizzo');
    }

    public function collabora()
    {
        return view('footer.collabora');
    }

    public function diritti()
    {
        return view('footer.diritti');
    }
}
