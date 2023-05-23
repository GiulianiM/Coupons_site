<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Azienda;
use App\Models\Resources\Promozione;
use Illuminate\Http\Request;

class PromozioneController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isStaff');
    }
    public function create()
    {
        $aziende = Azienda::orderBy('idAzienda')->get();
        return view('staff.crud.promozione', compact('aziende'));
    }

    public function store(Request $request)
    {
        $promozione = new Promozione;
        $validatedData = $this->validateStoreData($request);
        //Controlla se è stato caricato un file
        //Se si, allora salvalo in locale
        if ($request->hasFile('immagine')) {
            $file = $request->file('immagine');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images/promozioni'), $fileName);
        }

        $promozione->fill($validatedData);
        $promozione->immagine = $fileName;
        $promozione->save();

        return redirect()->route('staff.promos');
    }

    public function edit(Promozione $promo)
    {
        $aziende = Azienda::orderBy('idAzienda')->get();
        return view('staff.crud.promozione', compact('promo', 'aziende'));
    }

    public function update(Request $request, Promozione $promo)
    {

        $validatedData = $this->validateUpdateData($request);

        //Controlla se è stato caricato un file
        //Se si, allora salvalo in locale ed elimina il vecchio file
        //Altrimenit mantieni il vecchio file
        if ($request->hasFile('immagine')) {
            $file = $request->file('immagine');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images/promozioni'), $fileName);
            if ($promo->immagine && file_exists(public_path('images/promozioni/' . $promo->immagine))) {
                unlink(public_path('images/promozioni/' . $promo->immagine));
            }
        }else{
            $fileName = $promo->immagine;
        }

        $promo->fill($validatedData);
        $promo->immagine = $fileName;
        $promo->save();

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

    private function validateStoreData(Request $request): array
    {
       return $request->validate([
            'idAzienda' => ['required', 'integer'],
            'titolo' => ['required', 'string', 'max:50'],
            'descrizione' => ['required', 'string', 'max:1200'],
            'modalita' => ['required', 'string', 'max:255'],
            'luogo' => ['required', 'string', 'max:255'],
            'inizio' => ['required', 'date'],
            'fine' => ['required', 'date'],
            'sconto' => ['required', 'string', 'max:255'],
            'valore_sconto' => ['required', 'string', 'max:255'],
            'immagine' => ['required', 'image', 'mimes:jpeg,png,gif,svg'],
        ]);
    }

    private function validateUpdateData(Request $request): array
    {
      return $request->validate([
            'idAzienda' => ['required', 'integer'],
            'titolo' => ['required', 'string', 'max:50'],
            'descrizione' => ['required', 'string', 'max:1200'],
            'modalita' => ['required', 'string', 'max:255'],
            'luogo' => ['required', 'string', 'max:255'],
            'inizio' => ['required', 'date'],
            'fine' => ['required', 'date'],
            'sconto' => ['required', 'string', 'max:255'],
            'valore_sconto' => ['required', 'string', 'max:255'],
            'immagine' =>  ['sometimes', 'image', 'mimes:jpeg,png,gif,svg'],
        ]);
    }
}
