<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
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

    public function index()
    {
        $aziende = Azienda::all();
        return view('admin.aziende', compact('aziende'));
    }

    public function faq()
    {
        $faqs = Faq::all();
        return view('admin.faq', compact('faqs'));
    }

    public function staff()
    {
        $staffs = User::where('livello', 'staff')->get();
        return view('admin.staff', compact('staffs'));
    }


    public function users()
    {
        $users = User::where('livello', 'user')->get();
        return view('admin.utenti', compact('users'));
    }


    public function stats()
    {
        // Calcola il numero totale di coupon emessi
        $numeroCouponTotali = Coupon::count();

        // Ottieni gli utenti con il conteggio dei coupon riscattati
        $userStats = User::select('utente.idUtente', 'utente.nome', 'utente.cognome')
            ->withCount('coupons AS numero_coupon')
            ->groupBy('utente.idUtente', 'utente.nome', 'utente.cognome')
            ->where('utente.livello', 'user')
            ->get();


        // Ottieni le promozioni con il conteggio dei coupon riscattati e il loro stato

        $promozioneStats = Coupon::join('promozione', 'coupon.idPromozione', '=', 'promozione.idPromozione')
            ->select('coupon.idPromozione', 'promozione.titolo', DB::raw('COUNT(coupon.idCoupon) as numero_coupon'),
                DB::raw('CASE WHEN promozione.inizio <= CURDATE() AND promozione.fine >= CURDATE() THEN "Attiva"
                ELSE "Scaduta" END as stato'))
            ->groupBy('coupon.idPromozione', 'promozione.titolo', 'promozione.inizio', 'promozione.fine')
            ->get();

        // Passa il numero totale di coupon alla vista
        return view('admin.stats', compact('numeroCouponTotali', 'userStats', 'promozioneStats'));

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
