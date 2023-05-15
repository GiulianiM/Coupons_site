<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'product';
    protected $primaryKey = 'prodId';
    
    // prodId non modificabile da un HTTP Request (Mass Assignment)
    protected $guarded = ['prodId'];

    public $timestamps = false;

    public function getPrice($withDiscount = false) {
        $price = $this->price;
        if (true == ($this->discounted) && true == $withDiscount) {
            $discount = ($price * $this->discountPerc) / 100;
            $price = round($price - $discount, 2);
        }
        return $price;
    }

    // Realazione One-To-One con Category
    public function prodCat() {
        return $this->hasOne(Category::class, 'catId', 'catId');
    }

}
