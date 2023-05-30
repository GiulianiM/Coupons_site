<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Azienda;
use App\Models\Resources\Promozione;
use Illuminate\Support\Str;

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
        $validatedData = $this->validateData($request);

        //Controlla se è stato caricato un file
        //Se si, allora salvalo in locale
        if ($request->hasFile('immagine')) {
            $file = $request->file('immagine');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::random(10) . '.' . $extension;
            $file->move(public_path('images/promozioni'), $fileName);
        } else {
            $fileName = 'promozione.png';
        }

        if ($validatedData['sconto'] == 'quantita') {
            $promozione->valore_sconto = $request->input('valore_sconto_select');
        } else {
            $promozione->valore_sconto = $request->input('valore_sconto_text');
        }

        $promozione->fill($validatedData);
        $promozione->immagine = $fileName;
        $promozione->save();
        return response()->json(['redirect' => route('staff.promos')]);
    }

    public function edit(Promozione $promo)
    {
        $aziende = Azienda::orderBy('idAzienda')->get();
        return view('staff.crud.promozione', compact('promo', 'aziende'));
    }

    public function update(Request $request, Promozione $promo)
    {
        $validatedData = $this->validateData($request);

        //Controlla se è stato caricato un file
        //Se si, allora salvalo in locale ed elimina il vecchio file
        //Altrimenit mantieni il vecchio file
        if ($request->hasFile('immagine')) {
            $file = $request->file('immagine');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::random(10) . '.' . $extension;
            $file->move(public_path('images/promozioni'), $fileName);
            if ($promo->immagine && file_exists(public_path('images/promozioni/' . $promo->immagine))) {
                unlink(public_path('images/promozioni/' . $promo->immagine));
            }
        } else {
            $fileName = $promo->immagine;
        }

        if ($validatedData['sconto'] == 'quantita') {
            $promo->valore_sconto = $request->input('valore_sconto_select');
        } else {
            $promo->valore_sconto = $request->input('valore_sconto_text');
        }

        $promo->fill($validatedData);
        $promo->immagine = $fileName;
        $promo->save();
        return response()->json(['redirect' => route('staff.promos')]);
    }

    public function delete($idPromozione)
    {
        Promozione::where('idPromozione', $idPromozione)
            ->update(['visibile' => false]);
        return redirect()->route('staff.promos');
    }

    private function validateData(Request $request): array
    {
        $validationRules = [
            'idAzienda' => ['required', 'integer'],
            'titolo' => ['required', 'string', 'max:50'],
            'descrizione' => ['required', 'string', 'max:1200'],
            'modalita' => ['required', 'string', 'in:online,negozio'],
            'luogo' => ['required', 'string', 'max:255'],
            'inizio' => ['required', 'date'],
            'fine' => ['required', 'date', 'after:inizio'],
            'sconto' => ['required', 'string', 'in:prezzo_fisso,percentuale,quantita'],
            'immagine' => ['sometimes', 'image', 'mimes:jpeg,png,gif,svg'],
        ];

        $scontoValue = $request->input('sconto');
        if ($scontoValue === 'quantita') {
            $validationRules['valore_sconto_select'] = ['required', 'string', 'in:2x1,3x2,4x2,5x3'];
        } else {
            $validationRules['valore_sconto_text'] = ['required', 'string'];
        }

        $messages = [
            'idAzienda.integer' => 'Selezionare un\'azienda.',
        ];

        return $request->validate($validationRules, $messages);
    }
}
