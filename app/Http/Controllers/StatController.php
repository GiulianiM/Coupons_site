<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Resources\Promozione;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Resources\Coupon;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isAdmin');
    }

    public function couponStats()
    {
        $numeroCouponTotali = Coupon::count();

        // Ottieni le statistiche dei coupon

        return view('admin.coupon_stats', compact('numeroCouponTotali'));
    }
    public function utentiStats()
    {
        // Ottieni gli utenti con il conteggio dei coupon riscattati
        $userStats = User::select('utente.idUtente', 'utente.nome', 'utente.cognome')
            ->withCount('coupons AS numero_coupon')
            ->groupBy('utente.idUtente', 'utente.nome', 'utente.cognome')
            ->where('utente.livello', 'user')
            ->get();

        return view('admin.utenti_stats', compact('userStats'));
    }

    public function promozioniStats()
    {
        // Ottieni le promozioni con il conteggio dei coupon riscattati e il loro stato

        $promozioneStats = Coupon::join('promozione', 'coupon.idPromozione', '=', 'promozione.idPromozione')
            ->select('coupon.idPromozione', 'promozione.titolo', DB::raw('COUNT(coupon.idCoupon) as numero_coupon'),
                DB::raw('CASE WHEN promozione.inizio <= CURDATE() AND promozione.fine >= CURDATE() THEN "Attiva"
                ELSE "Scaduta" END as stato'))
            ->groupBy('coupon.idPromozione', 'promozione.titolo', 'promozione.inizio', 'promozione.fine')
            ->get();

        return view('admin.promozioni_stats', compact ('promozioneStats'));
    }
}
