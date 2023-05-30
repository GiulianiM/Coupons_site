<?php

namespace App\Http\Controllers;

use App\Models\Resources\Faq;
use Illuminate\Validation\Rules;
use App\Models\Resources\Promozione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isStaff')->only('promos');
        $this->middleware('can:isAdmin')->except('promos');
    }

    public function promos()
    {
        $promos = Promozione::where('visibile', true)->get();
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

        return response()->json(['redirect' => route('admin.staff')]);
    }

    public function edit(User $staff)
    {
        if (!$staff->hasLivello('staff')) {
            abort(404);
        }
        return view('admin.crud.staff', compact('staff'));
    }


    public function update(Request $request, User $staff)
    {
        $validatedData = $this->validateData($request);

        $staff->fill($validatedData);
        $staff->save();

        return response()->json(['redirect' => route('admin.staff')]);
    }

    public function delete($idStaff)
    {
        User::where('idUtente', $idStaff)
            ->update(['visibile' => false]);
        return redirect()->route('admin.staff');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'nome' => ['required', 'string', 'max:255'],
            'cognome' => ['required', 'string', 'max:255'],
            'password' => ['sometimes', 'string', Rules\Password::defaults()],
            'username' => ['sometimes', 'string', 'max:255', 'unique:utente,username'],
        ];

        return $request->validate($rules);
    }

}
