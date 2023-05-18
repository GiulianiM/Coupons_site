<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\oldModels\Admin;
use App\Models\Resources\Promozione;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct() {
        $this->middleware('can:isStaff');
    }
    public function promos() {
        $promos = Promozione::all();
        return view('staff.blade.php.promozioni', compact('promos'));
    }
}
