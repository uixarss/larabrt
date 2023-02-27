<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    public function getAllPromo()
    {

        $data_promo = Promo::orderBy('tanggal_mulai', 'DESC')->where('tanggal_akhir', '>=', date("Y-m-d"))
                            ->where('tanggal_mulai', '<=', date("Y-m-d"))->get();
        return response()->json($data_promo);
    }
}
