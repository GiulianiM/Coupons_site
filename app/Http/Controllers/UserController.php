<?php

namespace App\Http\Controllers;
use App\Models\Resources\Coupon;
use App\Models\Resources\Promozione;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller {

    public function profilo() {
        $utente = auth()->user();
        $promozioni = $utente->promozioni()->paginate(8);
        return view('user.profilo', compact('utente', 'promozioni'));
    }

    public function riscatta($id) {
        $promozione = Promozione::findOrFail($id);

        $coupon = Coupon::create([
            'codice' => Str::random(6),
            'idPromozione' => $promozione->idPromozione,
            'idUtente' => auth()->user()->idUtente,
        ]);

        return redirect()->route('coupon', ['promozione' => $promozione->idPromozione, 'coupon' => $coupon->idCoupon]);
    }

    public function coupon($idPromozione, $idCoupon) {
        $coupon = Coupon::findOrFail($idCoupon);
        return view('user.coupon', compact('coupon'));
    }
}
