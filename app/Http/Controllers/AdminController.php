<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\oldModels\Admin;
use App\Models\Resources\Faq;
use App\Models\Resources\Promozione;
use App\Models\User;

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
        $faqs = FAQ::all();
        return view('admin.faq', compact('faqs'));
    }

    public function users()
    {
        $users = User::where('livello', 'user')->get();
        return view('admin.utenti', compact('users'));
    }

    public function staff()
    {
        $staff = User::where('livello', 'staff')->get();
        return view('admin.staff', compact('staff'));
    }

    public function stats()
    {
        //$stats = Stat::all();
        //return view('admin.stats', compact('stats'));
        return view('admin.statistiche');
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
