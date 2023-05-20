<?php

namespace App\Http\Controllers;
use App\Models\Resources\Coupon;
use App\Models\Resources\Promozione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

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

    public function edit()
    {
        $utente = auth()->user();
        return view('user.modificaProfilo', compact('utente'));
    }

    public function update(Request $request)
    {
        $validatedData = $this->validateData($request);

        $utente = auth()->user();
        $utente->nome = $validatedData['nome'];
        $utente->cognome = $validatedData['cognome'];
        $utente->telefono = $validatedData['telefono'];
        $utente->email = $validatedData['email'];
        $utente->eta = $validatedData['eta'];
        $utente->genere = $validatedData['genere'];

        if ($validatedData['newPassword']) {
            if (!Hash::check($validatedData['oldPassword'], $utente->password)) {
                return redirect()->back()->withErrors(['oldPassword' => 'La vecchia password non è corretta.']);
            }

            $utente->password = Hash::make($validatedData['newPassword']);
        }

        $utente->save();

        return redirect()->route('profilo');
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

    private function validateData(Request $request): array
    {
        $validatedData = $request->validate([
            'nome' => ['sometimes', 'required', 'string', 'max:255'],
            'cognome' => ['sometimes', 'nullable', 'string', 'max:255'],
            'telefono' => ['sometimes', 'nullable', 'string', 'max:255'],
            'email' => ['sometimes', 'nullable', 'string', 'email', 'max:255'],
            'eta' => ['sometimes', 'nullable', 'integer', 'min:16', 'max:99'],
            'genere' => ['sometimes', 'nullable', 'string', 'max:1'],
            'oldPassword' => ['sometimes', 'nullable', 'string', 'min:8', Rules\Password::defaults()],
            'newPassword' => ['sometimes', 'nullable', 'string', 'min:8', Rules\Password::defaults()],
        ]);

        return $validatedData;
    }
}
