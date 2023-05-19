<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Azienda;
use App\Models\Resources\Promozione;
use Illuminate\Http\Request;

class PromozioneController extends Controller
{
    public function create()
    {
        $aziende = Azienda::orderBy('nome')->get();
        return view('staff.crud.promozione', compact('aziende'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        $promozione = new Promozione;
        $promozione->fill($validatedData);
        $promozione->save();

        return redirect()->route('staff.promos');
    }

    public function edit(Promozione $promo)
    {
        $aziende = Azienda::orderBy('nome')->get();
        return view('staff.crud.promozione', compact('promo', 'aziende'));
    }

    public function update(Request $request, Promozione $promozione)
    {
        $validatedData = $this->validateData($request);

        $promozione->fill($validatedData);
        $promozione->save();

        return redirect()->route('staff.promos');
    }

    public function delete($idPromozione)
    {
        $idPromozione = Promozione::find($idPromozione);

        if ($idPromozione) {
            $idPromozione->delete();
        }

        return redirect()->route('staff.promos');
    }

    private function validateData(Request $request): array
    {
        $validatedData = $request->validate([
            'idAzienda' => ['required', 'integer'],
            'titolo' => ['required', 'string', 'max:50'],
            'descrizione' => ['required', 'string', 'max:1200'],
            'modalita' => ['required', 'string', 'max:255'],
            'luogo' => ['required', 'string', 'max:255'],
            'inizio' => ['required', 'date'],
            'fine' => ['required', 'date'],
            'sconto' => ['required', 'string', 'max:255'],
            'valore_sconto' => ['required', 'string', 'max:255'],
            'immagine' => ['required', 'string', 'max:2048'],
        ]);
        return $validatedData;
    }
}
