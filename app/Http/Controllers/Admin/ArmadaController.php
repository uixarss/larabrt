<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Armada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArmadaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_armada = Armada::all();

        return view('admin.armada.index', compact('data_armada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'kode_armada' => 'required|unique:armadas',
            'no_polisi' => 'required|unique:armadas',
            'no_bpkb' => 'required|unique:armadas',
            'no_stnk' => 'required|unique:armadas'
        ]);

        Armada::create([
            'nama' => $request->nama,
            'kode_armada' => $request->kode_armada,
            'no_polisi' => $request->no_polisi,
            'no_stnk' => $request->no_stnk,
            'no_bpkb' => $request->no_bpkb,
            'keterangan' => $request->keterangan,
            'created_by' => Auth::id()
        ]);

        return redirect()->back()->with([
            'success' => 'Berhasil menambah armada'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $armada = Armada::find($id);

        return view('admin.armada.edit', compact('armada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $armada = Armada::find($id);

        $armada->update([
            'nama' => $request->nama,
            'kode_armada' => $request->kode_armada,
            'no_polisi' => $request->no_polisi,
            'no_stnk' => $request->no_stnk,
            'no_bpkb' => $request->no_bpkb,
            'keterangan' => $request->keterangan,
            'updated_by' => Auth::id()
        ]);
        return redirect()->back()->with([
            'success' => 'Berhasil mengubah data armada '. $armada->nama
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $armada = Armada::find($id);

        $armada->delete($armada);
        return redirect()->back()->with([
            'success' => 'Berhasil menghapus data armada '. $armada->nama
        ]);
    }
}
