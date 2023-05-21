<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\oldModels\Admin;
use App\Models\Resources\Faq;
use App\Models\Resources\Promozione;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Resources\Coupon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:isAdmin');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $orderby = $request->input('order_by');

        $aziende = Azienda::query();

        if ($search) {
            $aziende->where('nome', 'LIKE', "%{$search}%")
                ->orWhere('tipologia', 'LIKE', "%{$search}%");
        }

        if ($orderby) {
            if ($orderby == 'localizzazione') {
                $aziende->orderBy('citta')->orderBy('via')->orderBy('numero_civico');
            } else {
                $aziende->orderBy($orderby);
            }
        }

        $aziende = $aziende->get();

        return view('admin.aziende', compact('aziende', 'orderby', 'search'));
    }

    public function faq(Request $request)
    {
        $search = $request->input('search');
        $orderby = $request->input('order_by');

        $faqs = Faq::query();

        if ($search) {
            $faqs->where('titolo', 'LIKE', "%{$search}%");
        }

        if ($orderby) {
            $faqs->orderBy($orderby);
        }

        $faqs = $faqs->get();
        return view('admin.faq', compact('faqs', 'orderby', 'search'));
    }

    public function staff(Request $request)
    {
        $search = $request->input('search');
        $orderby = $request->input('order_by');

        $staff = User::query();
        $staff->where('livello', 'staff');
        if ($search) {
            $staff->where(function ($query) use ($search) {
                $query->where('nome', 'LIKE', "%{$search}%")
                    ->orWhere('cognome', 'LIKE', "%{$search}%");
            });
        }

        if ($orderby) {
            $staff->orderBy($orderby);
        }

        $staffs = $staff->get();
        return view('admin.staff', compact('staffs', 'orderby', 'search'));
    }


    public function users(Request $request)
    {
        $search = $request->input('search');
        $orderby = $request->input('order_by');

        $users = User::query();

        $users->where('livello', 'user');

        if ($search) {
            $users->where(function ($query) use ($search) {
                $query->where('nome', 'LIKE', "%{$search}%")
                    ->orWhere('cognome', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        if ($orderby) {
            $users->orderBy($orderby);
        }

        $users = $users->get();
        return view('admin.utenti', compact('users', 'orderby', 'search'));
    }



    public function stats(Request $request)
    {
        // Calcola il numero totale di coupon emessi
        $numeroCouponTotali = Coupon::count();

        // Ottieni gli utenti con il conteggio dei coupon riscattati
        $userSearch = $request->input('userSearch');
        $userStats = Coupon::select('coupon.idUtente', 'utente.nome', 'utente.cognome',
            DB::raw('COUNT(coupon.idCoupon) as numero_coupon'))
            ->join('utente', 'coupon.idUtente', '=', 'utente.idUtente')
            ->when($userSearch, function ($query) use ($userSearch) {
                $query->where('utente.nome', 'LIKE', "%{$userSearch}%")
                    ->orWhere('utente.cognome', 'LIKE', "%{$userSearch}%");
            })
            ->groupBy('coupon.idUtente', 'utente.nome', 'utente.cognome')
            ->get();

        // Ottieni le promozioni con il conteggio dei coupon riscattati e il loro stato
        $promozioneSearch = $request->input('promozioneSearch');
        $promozioneStats = Coupon::join('promozione', 'coupon.idPromozione', '=', 'promozione.idPromozione')
            ->select('coupon.idPromozione', 'promozione.titolo', DB::raw('COUNT(coupon.idCoupon) as numero_coupon'),
                DB::raw('CASE WHEN promozione.inizio <= CURDATE() AND promozione.fine >= CURDATE() THEN "Attiva"
                ELSE "Scaduta" END as stato'))
            ->when($promozioneSearch, function ($query) use ($promozioneSearch) {
                $query->where('promozione.titolo', 'LIKE', "%{$promozioneSearch}%");
            })
            ->groupBy('coupon.idPromozione', 'promozione.titolo', 'promozione.inizio', 'promozione.fine')
            ->get();

        // Passa il numero totale di coupon alla vista
        return view('admin.stats', compact('numeroCouponTotali', 'userStats', 'userSearch', 'promozioneStats', 'promozioneSearch'));

        /*$userSearch = $request->input('user_search');
        $promozioneSearch = $request->input('promozione_search');

        $userStats = User::query();
        $promozioneStats = Promozione::query();

        if ($userSearch) {
            $userStats->where('nome', 'LIKE', "%{$userSearch}%")
                    ->orWhere('cognome', 'LIKE', "%{$userSearch}%");

        }

        if ($promozioneSearch) {
            $promozioneStats->where('titolo', 'LIKE', "%{$promozioneSearch}%");
        }

        $userStats = $userStats->get();
        $promozioneStats = $promozioneStats->get();

        //return view('admin.stats', compact('stats'));
        return view('admin.stats', compact('userStats', 'userSearch', 'promozioneStats', 'promozioneSearch'));*/
    }


    /* public function index() {
         return view('admin');
     }

     public function addProduct() {
         $prodCats = $this->_adminModel->getProdsCats()->pluck('name', 'catId');
         return view('product.insert')
                         ->with('cats', $prodCats);
     }

     public function storeProduct(NewProductRequest $request) {

         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imageName = $image->getClientOriginalName();
         } else {
             $imageName = NULL;
         }

         $product = new Product;
         $product->fill($request->validated());
         $product->image = $imageName;
         $product->save();

         if (!is_null($imageName)) {
             $destinationPath = public_path() . '/images/products';
             $image->move($destinationPath, $imageName);
         };

         return redirect()->action([AdminController::class, 'index']);
     }*/

}
