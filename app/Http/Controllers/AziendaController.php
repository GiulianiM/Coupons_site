<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Azienda;
use Illuminate\Support\Facades\Storage;

class AziendaController extends Controller
{
    public function create()
    {
        return view('admin.crud.azienda');
    }

    public function store(Request $request)
    {
        if ($request->logo == null) {
            $validatedData = $this->validateData($request, true);
        } else {
            $validatedData = $this->validateData($request, false);
        }


        $azienda = new Azienda;
        $azienda->fill($validatedData);
        $azienda->save();

        return redirect()->route('admin.aziende');
    }


    public function edit(Azienda $azienda)
    {
        return view('admin.crud.azienda', compact('azienda'));
    }

    public function update(Request $request, Azienda $azienda)
    {
        if ($request->logo == null) {
            $request->merge(['logo' => $request->old_logo]);
            $validatedData = $this->validateData($request, true);
        }

        $azienda->fill($validatedData);
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


    private function validateData(Request $request, bool $logoNull): array
    {
        if ($logoNull) {
            $validatedData = $request->validate([
                'nome' => ['required', 'string', 'max:255'],
                'via' => ['required', 'string', 'max:255'],
                'citta' => ['required', 'string', 'max:255'],
                'cap' => ['required', 'integer', 'min:100', 'max:98168'],
                //'logo' => ['required', 'image', 'mimes:jpeg,png,gif,svg', 'max:2048'],
                'logo' => ['required', 'string', 'max:2048'],
                'numero_civico' => ['required', 'integer', 'min:1', 'max:300'],
                'ragione_sociale' => ['required', 'string'],
                'descrizione' => ['required', 'string', 'max:1200'],
                'tipologia' => ['required', 'string'],
            ]);
        } else {
            $validatedData = $request->validate([
                'nome' => ['required', 'string', 'max:255'],
                'via' => ['required', 'string', 'max:255'],
                'citta' => ['required', 'string', 'max:255'],
                'cap' => ['required', 'integer', 'min:100', 'max:98168'],
                'logo' => ['required', 'image', 'mimes:jpeg,png,gif,svg', 'max:2048'],
                //'logo'=> ['required', 'string', 'max:2048'],
                'numero_civico' => ['required', 'integer', 'min:1', 'max:300'],
                'ragione_sociale' => ['required', 'string'],
                'descrizione' => ['required', 'string', 'max:1200'],
                'tipologia' => ['required', 'string'],
            ]);
        }

        return $validatedData;
    }
}
