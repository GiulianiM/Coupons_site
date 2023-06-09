<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Azienda;
use Illuminate\Support\Str;

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
        $validatedData = $this->validateData($request);

        //Controlla se è stato caricato un file
        //Se si, allora salvalo in locale
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::random(10) . '.' . $extension;
            $file->move(public_path('images/aziende'), $fileName);
        } else {
            $fileName = 'company.png';
        }

        $azienda->fill($validatedData);
        $azienda->logo = $fileName;
        $azienda->save();

        return response()->json(['redirect' => route('admin.aziende')]);
    }


    public function edit(Azienda $azienda)
    {
        return view('admin.crud.azienda', compact('azienda'));
    }

    public function update(Request $request, Azienda $azienda)
    {
        $validatedData = $this->validateData($request);

        //Controlla se è stato caricato un file
        //Se si, allora salvalo in locale ed elimina il vecchio file
        //Altrimenit mantieni il vecchio file
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::random(10) . '.' . $extension;
            $file->move(public_path('images/aziende'), $fileName);
            if ($azienda->logo && file_exists(public_path('images/aziende/' . $azienda->logo))) {
                unlink(public_path('images/aziende/' . $azienda->logo));
            }
        } else {
            $fileName = $azienda->logo;
        }

        $azienda->fill($validatedData);
        $azienda->logo = $fileName;
        $azienda->save();
        return response()->json(['redirect' => route('admin.aziende')]);
    }

    public function delete($idAzienda)
    {
        Azienda::where('idAzienda', $idAzienda)
            ->update(['visibile' => false]);
        return redirect()->route('admin.aziende');
    }


    private function validateData(Request $request): array
    {
        return $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'via' => ['required', 'string', 'max:255'],
            'citta' => ['required', 'string', 'max:255'],
            'cap' => ['required', 'numeric', 'digits_between:1,5', 'between:00100,99100'],
            'logo' => ['sometimes', 'image', 'mimes:jpeg,png,gif,svg'],
            'numero_civico' => ['required', 'numeric', 'digits_between:1,3', 'between:1,300'],
            'ragione_sociale' => ['required', 'string', 'max:255'],
            'descrizione' => ['required', 'string', 'max:1200'],
            'tipologia' => ['required', 'string', 'in:Alimentari,Moda,Tecnologia'],
        ]);
    }
}
