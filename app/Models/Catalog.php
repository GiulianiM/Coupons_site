<?php

namespace App\Models;

use App\Models\Resources\Category;
use App\Models\Resources\Product;

class Catalog {

    public function getTopCats() {
        return Category::where('parId', 0)->get();
    }

    public function getCatsByParId($topId) {
        return Category::whereIn('parId', $topId)->get();
    }

    // Estrae i prodotti della categoria/e $catId (tutti o solo quelli in sconto), eventualmente ordinati
    public function getProdsByCat($catId, $paged = 1, $order = null, $discounted = false) {

        $prods = Product::whereIn('catId', $catId)
                ->orWhereHas('prodCat', function ($query) use ($catId) {
                        $query->whereIn('parId', $catId);
        });
        if ($discounted) {
            $prods = $prods->where('discounted', true);
        }
        if (!is_null($order)) {
            $prods = $prods->orderBy('discountPerc', $order);
        }
        return $prods->paginate($paged);
    }

}
