<?php

namespace App\Models\oldModels;

use App\Models\oldModels\Resources\Category;

class Admin {

    public function getProdsCats() {
        return Category::where('parId', '!=', 0)->get();
    }

}
