<?php

namespace App\Http\Controllers;
use App\Models\User;

class userController extends Controller {

    public function profilo() {
        $utente = auth()->user();
        $promozioni = $utente->promozioni()->paginate(8);
        return view('user.profilo', compact('utente', 'promozioni'));
    }
}
