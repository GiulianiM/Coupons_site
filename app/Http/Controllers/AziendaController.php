<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Azienda;
use Illuminate\Support\Facades\Storage;

class AziendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isAdmin');
    }

    public function create()
    {
        return view('admin.crud.azienda');
    }


    public function store(Request $request)
    {
        $azienda = new Azienda;
        $validatedData = $this->validateStoreData($request);

        //Controlla se è stato caricato un file
        //Se si, allora salvalo in locale
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images/aziende'), $fileName);
        }

        $azienda->fill($validatedData);
        $azienda->logo = $fileName;
        $azienda->save();

        return redirect()->route('admin.aziende');
    }


    public function edit(Azienda $azienda)
    {
        return view('admin.crud.azienda', compact('azienda'));
    }

    public function update(Request $request, Azienda $azienda)
    {
        //dd($azienda);
        $validatedData = $this->validateUpdateData($request);

        //Controlla se è stato caricato un file
        //Se si, allora salvalo in locale ed elimina il vecchio file
        //Altrimenit mantieni il vecchio file
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images/aziende'), $fileName);
            if ($azienda->logo && file_exists(public_path('images/aziende/' . $azienda->logo))) {
                unlink(public_path('images/aziende/' . $azienda->logo));
            }
        }else{
            $fileName = $azienda->logo;
        }

        $azienda->fill($validatedData);
        $azienda->logo = $fileName;
        $azienda->save();
        return redirect()->route('admin.aziende');
    }

    public function delete($idAzienda)
    {
        $idAzienda = Azienda::find($idAzienda);

        if ($idAzienda) {
            $idAzienda->delete();
        }

        return redirect()->route('admin.aziende');
    }


    private function validateStoreData(Request $request): array
    {
        return $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'via' => ['required', 'string', 'max:255'],
            'citta' => ['required', 'string', 'max:255'],
            'cap' => ['required', 'numeric', 'digits_between:1,5', 'between:00100,99100'],
            'logo' => ['required', 'image', 'mimes:jpeg,png,gif,svg'],
            'numero_civico' => ['required', 'integer', 'min:1', 'max:300'],
            'ragione_sociale' => ['required', 'string'],
            'descrizione' => ['required', 'string', 'max:1200'],
            'tipologia' => ['required', 'string'],
        ]);
    }

    private function validateUpdateData(Request $request): array
    {
        return $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'via' => ['required', 'string', 'max:255'],
            'citta' => ['required', 'string', 'max:255'],
            'cap' => ['required', 'numeric', 'digits_between:1,5', 'between:00100,99100'],
            'logo' => ['sometimes', 'image', 'mimes:jpeg,png,gif,svg'],
            'numero_civico' => ['required', 'integer', 'min:1', 'max:300'],
            'ragione_sociale' => ['required', 'string'],
            'descrizione' => ['required', 'string', 'max:1200'],
            'tipologia' => ['required', 'string'],
        ]);
    }
}
