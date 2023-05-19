<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Azienda;

class AziendaController extends Controller
{
    public function create()
    {
        return view('admin.crud.azienda');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

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
        $validatedData = $this->validateData($request);

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


    private function validateData(Request $request): array
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'via' => ['required', 'string', 'max:255'],
            'citta' => ['required', 'string', 'max:255'],
            'cap' => ['required', 'integer', 'min:100', 'max:98168'],
            'logo' => ['required','string', 'max:2048'],
            'numero_civico' => ['required', 'integer', 'min:1', 'max:300'],
            'ragione_sociale' => ['required', 'string'],
            'descrizione' => ['required', 'string', 'max:1200'],
            'tipologia' => ['required', 'string'],
        ]);
        return $validatedData;
    }
}
