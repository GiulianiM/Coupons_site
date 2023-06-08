<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Resources\Faq;
use App\Models\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:isAdmin');
    }

    public function index()
    {
        $aziende = Azienda::where('visibile', true)->get();
        return view('admin.aziende', compact('aziende'));
    }

    public function faq()
    {
        $faqs = Faq::all();
        return view('admin.faq', compact('faqs'));
    }

    public function staff()
    {
        $staffs = User::where('livello', 'staff')
            ->where('visibile', true)
            ->get();
        return view('admin.staff', compact('staffs'));
    }


    public function users()
    {
        $users = User::where('livello', 'user')
            ->where('visibile', true)
            ->get();
        return view('admin.utenti', compact('users'));
    }

}
