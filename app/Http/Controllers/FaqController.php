<?php

namespace App\Http\Controllers;

use App\Models\Resources\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function create()
    {
        return view('admin.crud.faq');
    }

    public function store(Request $request)
    {
        // Validazione dei dati ricevuti dal form
        $validatedData = $this->validateData($request);

        // Creazione di una nuova istanza di Azienda
        $faq = new Faq;
        $faq->fill($validatedData);

        // Salvataggio dell'azienda nel database
        $faq->save();

        // Reindirizzamento alla pagina desiderata
        return redirect()->route('admin.faq');
    }

    public function edit(Faq $faq)
    {
        return view('admin.crud.faq', compact('faq'));
    }

    // Metodo per gestire la modifica di un'azienda esistente
    public function update(Request $request, Faq $faq)
    {
        // Validazione dei dati ricevuti dal form
        $validatedData = $this->validateData($request);

        // Aggiornamento dei dati dell'azienda
        $faq->fill($validatedData);
        $faq->save();

        // Reindirizzamento alla pagina desiderata
        return redirect()->route('admin.faq');
    }

    private function validateData(Request $request): array
    {
        $validatedData = $request->validate([
            'titolo' => ['required', 'string', 'max:50'],
            'descrzione' => ['required', 'string', 'max:1200'],
        ]);
        return $validatedData;
    }
}
