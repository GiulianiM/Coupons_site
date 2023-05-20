<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\oldModels\Admin;
use App\Models\Resources\Faq;
use App\Models\Resources\Promozione;
use App\Models\User;
use Illuminate\Http\Request;

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



    public function stats()
    {
        $stats = Stat::all();
        //return view('admin.stats', compact('stats'));
        return view('admin.stats', compact('stats'));
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
