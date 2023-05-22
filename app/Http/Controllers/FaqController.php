<?php

namespace App\Http\Controllers;

use App\Models\Resources\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isAdmin');
    }

    public function create()
    {
        return view('admin.crud.faq');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        $faq = new Faq;
        $faq->fill($validatedData);
        $faq->save();

        return redirect()->route('admin.faq');
    }

    public function edit(Faq $faq)
    {
        return view('admin.crud.faq', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validatedData = $this->validateData($request);

        $faq->fill($validatedData);
        $faq->save();

        return redirect()->route('admin.faq');
    }

    public function delete($idFaq)
    {
        $idFaq = Faq::find($idFaq);

        if ($idFaq) {
            $idFaq->delete();
        }

        return redirect()->route('admin.faq');
    }

    private function validateData(Request $request): array
    {
        $validatedData = $request->validate([
            'titolo' => ['required', 'string', 'max:50'],
            'descrizione' => ['required', 'string', 'max:1200'],
        ]);
        return $validatedData;
    }
}
