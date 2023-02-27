<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
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
        $data_promo = Promo::all();

        return view('admin.promo.index', compact('data_promo'));
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
        $this->validate($request, [
            'title' => 'required',
            'nama_vendor' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'file_promo' => 'required'
        ]);

        if ($request->hasFile('file_promo')) {
            $filenameWithExt = $request->file('file_promo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            $extension = $request->file('file_promo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $file_location = Storage::putFileAs('public/promo', $request->file('file_promo'), $filenameSimpan);

            $promo = Promo::create([
                'title' => $request->title,
                'nama_vendor' => $request->nama_vendor,
                'deskripsi' => $request->deskripsi,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'thumbnail' => $filenameSimpan,
                'lokasi_thumbnail' => $file_location
            ]);

            return redirect()->route('admin.edit.promo', ['id' => $promo->id])->with([
                'success' => 'Berhasil menambah promo'
            ]);
        } else {
            $promo = Promo::create([
                'title' => $request->title,
                'nama_vendor' => $request->nama_vendor,
                'deskripsi' => $request->deskripsi,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
            ]);
            return redirect()->route('admin.edit.promo', ['id' => $promo->id])->with([
                'success' => 'Berhasil menambah promo'
            ]);
        }
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
        $promo = Promo::find($id);

        return view('admin.promo.edit', compact('promo'));
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
        $promo = Promo::find($id);

        if ($request->hasFile('file_promo')) {
            if ($promo->thumbnail != null) {
                Storage::delete('public/promo/' . $promo->thumbnail);
            }
            $filenameWithExt = $request->file('file_promo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            $extension = $request->file('file_promo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $file_location = Storage::putFileAs('public/promo', $request->file('file_promo'), $filenameSimpan);
            $promo->update([
                'title' => $request->title,
                'nama_vendor' => $request->nama_vendor,
                'deskripsi' => $request->deskripsi,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'thumbnail' => $filenameSimpan,
                'lokasi_thumbnail' => $file_location,
                'artikel' => $request->artikel
            ]);
            return redirect()->route('admin.list.promo')->with([
                'success' => 'Berhasil mengubah promo ' . $promo->title . ' vendor ' . $promo->nama_vendor
            ]);
        } else {
            $promo->update([
                'title' => $request->title,
                'nama_vendor' => $request->nama_vendor,
                'deskripsi' => $request->deskripsi,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'artikel' => $request->artikel
            ]);
            return redirect()->route('admin.list.promo')->with([
                'success' => 'Berhasil mengubah promo ' . $promo->title . ' vendor ' . $promo->nama_vendor
            ]);
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promo = Promo::find($id);

        if ($promo->thumbnail != null) {
            Storage::delete('public/promo/' . $promo->thumbnail);
            $promo->delete($promo);

            return redirect()->back()->with([
                'error' => 'Berhasil menghapus data promo'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Gagal menghapus data promo'
        ]);
    }
}
