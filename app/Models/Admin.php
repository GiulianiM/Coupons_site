<?php

namespace App\Models;

use App\Models\Resources\Category;
use App\Models\Resources\Product;

class Admin {

    public function getProdsCats() {
        return Category::where('parId', '!=', 0)->get();
    }

}
