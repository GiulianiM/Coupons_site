<?php

namespace App\Http\Controllers;
use App\Models\Resources\Coupon;
use App\Models\Resources\Promozione;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller {
    public function __construct()
    {
        $this->middleware('can:isAdmin')->only('delete');
    }

    public function profilo() {
        $utente = auth()->user();
        $coupons = $utente->coupons()->paginate(8);
        return view('user.profilo', compact('utente', 'coupons'));
    }

    public function riscatta($id)
    {
        $promozione = Promozione::findOrFail($id);
        $userId = auth()->user()->idUtente;

        $existingCoupon = Coupon::where('idPromozione', $promozione->idPromozione)
            ->where('idUtente', $userId)
            ->first();

        if ($existingCoupon) {
            // User already has a coupon for this promozione
            return redirect()->route('coupon', ['promozione' => $promozione->idPromozione, 'coupon' => $existingCoupon->idCoupon])
                ->with('message', 'Hai già riscattato un coupon per questa promozione.');
        }

        $coupon = Coupon::create([
            'codice' => Str::random(6),
            'idPromozione' => $promozione->idPromozione,
            'idUtente' => $userId,
        ]);

        return redirect()->route('coupon', ['promozione' => $promozione->idPromozione, 'coupon' => $coupon->idCoupon]);
    }

    public function coupon($idCoupon) {
        $coupon = Coupon::findOrFail($idCoupon);
        return view('user.coupon', compact('coupon'));
    }

    public function couponProfilo($idCoupon) {
        $coupon = Coupon::findOrFail($idCoupon);
        return view('user.coupon', compact('coupon'));
    }

    public function delete($dUser)
    {
        $dUser = User::find($dUser);

        if ($dUser) {
            $dUser->delete();
        }

        return redirect()->route('admin.users');
    }
}
