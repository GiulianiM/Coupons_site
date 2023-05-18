<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules;
use App\Models\Resources\Promozione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isStaff')->except('edit', 'update', 'create', 'store');
    }

    public function promos()
    {
        $promos = Promozione::all();
        return view('staff.promozioni', compact('promos'));
    }

    public function create()
    {
        return view('admin.crud.staff');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        $staff = new User;
        $staff->fill($validatedData);
        $staff->livello = 'staff';
        $staff->password = Hash::make($validatedData['password']);
        $staff->save();

        return redirect()->route('admin.staff');
    }

    public function edit(User $staff)
    {
        return view('admin.crud.staff', compact('staff'));
    }


    public function update(Request $request, User $staff)
    {
        $validatedData = $this->validateData($request);

        $staff->fill($validatedData);
        $staff->save();

        return redirect()->route('admin.staff');
    }

    private function validateData(Request $request): array
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cognome' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', Rules\Password::defaults()],
            'username' => ['required', 'string', 'max:255', 'unique:utente,username'],
        ]);
        return $validatedData;
    }
}
