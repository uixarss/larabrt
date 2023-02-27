<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Halte;
use Illuminate\Support\Facades\Auth;

class HalteController extends Controller
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
        $data_halte = Halte::all();

        return view('admin.halte.index',compact([
            'data_halte'
        ]));
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
            'alamat' => 'required',
        ]);

        Halte::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'long' => $request->long,
            'lat' => $request->lat,
            'keterangan' => $request->keterangan,
            'created_by' => Auth::id()
        ]);

        return redirect()->back()->with([
            'success' => 'Berhasil menambah halte!'
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $halte = Halte::find($id);

        return view('admin.halte.edit', compact([
            'halte'
        ]));
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
        $halte = Halte::find($id);

        $halte->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'long' => $request->long,
            'lat' => $request->lat,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'updated_by' => Auth::id()
        ]);
        return redirect()->back()->with([
            'success' => 'Berhasil mengubah data halte!'
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
        $halte = Halte::find($id);

        $halte->delete($halte);

        return redirect()->back()->with([
            'success' => 'Berhasil menghapus halte!'
        ]);
    }
}
