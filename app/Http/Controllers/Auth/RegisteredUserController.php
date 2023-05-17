<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.signup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'nome' => [ 'required', 'string', 'max:255'],
            'cognome' => [ 'required', 'string', 'max:255'],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:utente,email'],
            'password' => [ 'required', 'string', Rules\Password::defaults()],
            'genere' => ['required', 'integer', 'in:0,1'],
            'username' => ['required', 'string', 'max:255', 'unique:utente,username'],
            'telefono' => ['required', 'string', 'max:10'],
            'eta' => ['required', 'integer', 'min:16', 'max:99'],
        ];
        $messages = [
            'nome.required' => 'Il campo nome è obbligatorio.',
            'cognome.required' => 'Il campo cognome è obbligatorio.',
            'email.required' => 'Il campo email è obbligatorio.',
            'email.email' => 'Inserisci un indirizzo email valido.',
            'email.unique' => 'Utente già registrato con questa email.',
            'password.required' => 'Il campo password è obbligatorio.',
            'password.min' => 'La password deve essere di almeno 4 caratteri.',
            'genere.required' => 'Il campo genere è obbligatorio.',
            'genere.in' => 'Seleziona un genere valido.',
            'username.required' => 'Il campo username è obbligatorio.',
            'username.unique' => 'Username già utilizzato.',
            'telefono.required' => 'Il campo telefono è obbligatorio.',
            'eta.required' => 'Il campo età è obbligatorio.',
            'eta.integer' => 'Il campo età deve essere un numero intero.',
            'eta.min' => 'Devi avere almeno 16 anni.',
            'eta.max' => 'Il campo età deve essere inferiore a 100 anni.',
        ];


        $request->validate($rules);

        $user = User::create([
            'nome' => $request->nome,
            'cognome' => $request->cognome,
            'email' => $request->email,
            'username' => $request->username,
            'telefono' => $request->telefono,
            'eta' => $request->eta,
            'genere' => $request->genere,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
