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
        // Validazione dei dati ricevuti dal form
        $validatedData = $this->validateData($request);

        // Creazione di una nuova istanza di Azienda
        $azienda = new Azienda;
        $azienda->fill($validatedData);

        // Salvataggio dell'azienda nel database
        $azienda->save();

        // Reindirizzamento alla pagina desiderata
        return redirect()->route('admin.aziende');
    }

    public function edit(Azienda $azienda)
    {
        return view('admin.crud.azienda', compact('azienda'));
    }

    // Metodo per gestire la modifica di un'azienda esistente
    public function update(Request $request, Azienda $azienda)
    {
        // Validazione dei dati ricevuti dal form
        $validatedData = $this->validateData($request);

        // Aggiornamento dei dati dell'azienda
        $azienda->fill($validatedData);
        $azienda->save();

        // Reindirizzamento alla pagina desiderata
        return redirect()->route('admin.aziende');
    }

    private function validateData(Request $request): array
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'via' => ['required', 'string', 'max:255'],
            'citta' => ['required', 'string', 'max:255'],
            'cap' => ['required', 'integer', 'min:00100', 'max:98168'],
            'logo' => ['required','string', 'max:2048'],
            'numero_civico' => ['required', 'integer', 'min:1', 'max:9999'],
            'ragione_sociale' => ['required', 'string'],
            'descrizione' => ['required', 'string', 'max:1200'],
            'tipologia' => ['required', 'string'],
        ]);
        return $validatedData;
    }
}
