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
        $this->middleware('can:isStaff')->except('edit', 'update', 'create', 'store', 'delete');
    }

    public function promos(Request $request)
    {
        $search = $request->input('search');
        $orderby = $request->input('order_by');

        $promos = Promozione::query();

        if ($search) {
            $promos->where('titolo', 'LIKE', "%{$search}%")
                ->orWhere('descrizione', 'LIKE', "%{$search}%");
        }

        if ($orderby) {
            if($orderby == 'azienda'){
                $promos->join('azienda', 'promozione.idAzienda', '=', 'azienda.idAzienda')
                    ->orderBy('azienda.nome');
            }else{
                $promos->orderBy($orderby);
            }
        }

        $promos = $promos->get();

        return view('staff.promozioni', compact('promos', 'orderby', 'search'));
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

    public function delete($idStaff)
    {
        $idStaff = User::find($idStaff);

        if ($idStaff) {
            $idStaff->delete();
        }

        return redirect()->route('admin.staff');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'nome' => ['required', 'string', 'max:255'],
            'cognome' => ['required', 'string', 'max:255'],
        ];

        if ($request->isMethod('post')) {
            // Creating a new staff user
            $rules['password'] = ['required', 'string', Rules\Password::defaults()];
            $rules['username'] = ['required', 'string', 'max:255', 'unique:utente,username'];
        }

        return $request->validate($rules);
    }

}
