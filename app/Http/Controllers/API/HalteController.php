<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Halte;
use Illuminate\Http\Request;

class HalteController extends Controller
{

    public function getAllHalte()
    {
        // $data_halte = Halte::orderBy('nama', 'ASC')->with(['dibuatoleh','diupdateoleh'])->get();
        $data_halte = Halte::orderBy('nama', 'ASC')->get();


        return response()->json($data_halte);
    }
}
