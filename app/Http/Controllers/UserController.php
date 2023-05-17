<?php

namespace App\Http\Controllers;
use App\Models\User;

class userController extends Controller {

    public function profilo() {
        $utente = auth()->user();
        $promozioni = $utente->promozioni;
        return view('user.profilo', compact('utente', 'promozioni'));
    }
}
