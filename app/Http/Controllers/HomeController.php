<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Halte;
use App\Models\Promo;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_armada = Armada::all();
        $data_halte = Halte::all();
        $data_user = User::all();
        $data_promo = Promo::all();
        return view('home', compact(['data_halte', 'data_armada', 'data_user','data_promo']));
    }
}
