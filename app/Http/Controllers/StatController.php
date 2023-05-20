<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resources\Coupon;
use App\Models\Resources\Promozione;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{
    public function stats()
    {
        // Calcola il numero totale di coupon emessi
        $numeroCouponTotali = Coupon::count();

        // Ottieni gli utenti con il conteggio dei coupon riscattati
        $users = Coupon::select('idUtente', DB::raw('COUNT(idCoupon) as numero_coupon'))
            ->groupBy('idUtente')
            ->get();

        //Ottieni le promozioni con il conteggio dei coupon riscattati e il loro stato
        $promozioni = Coupon::join('promozione', 'coupon.idPromozione', '=', 'promozione.idPromozione')
            ->select('coupon.idPromozione', DB::raw('COUNT(coupon.idCoupon) as numero_coupon'),
                DB::raw('CASE WHEN promozione.inizio <= CURDATE() AND promozione.fine >= CURDATE() THEN "Attiva"
                ELSE "Scaduta" END as stato'))
            ->groupBy('coupon.idPromozione', 'promozione.inizio', 'promozione.fine')
            ->get();

        // Passa il numero totale di coupon alla vista
        return view('admin.stats', compact('numeroCouponTotali', 'users', 'promozioni'));
    }
    
}
