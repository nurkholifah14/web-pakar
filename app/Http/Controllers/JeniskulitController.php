<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jeniskulit;
use RealRashid\SweetAlert\Facades\Alert;

class JeniskulitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeniskulits = Jeniskulit::orderBy('created_at', 'asc')->paginate(5);
        return view('admin.jeniskulit.datajeniskulit', compact('jeniskulits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jeniskulit.tambahdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_jenis' => 'required|unique:jeniskulits,kode_jenis',
            'nama_jeniskulit' => 'required',
            'rekomendasi_treatment' => 'required',
        ]);
        
        $jeniskulits = Jeniskulit::create([
            'kode_jenis' => $request->kode_jenis,
            'nama_jeniskulit' => $request->nama_jeniskulit,
            'rekomendasi_treatment' => $request->rekomendasi_treatment,
        ]);
        
        Alert::success('Berhasil', 'Data Berhasil ditambahkan');
        return redirect('/jeniskulit');
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
        $edit = Jeniskulit::find($id);
        return view('admin.jeniskulit.editdata', compact('edit'));
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
        $request->validate([
            'kode_jenis' => 'required',
            'nama_jeniskulit' => 'required',
            'rekomendasi_treatment' => 'required',
        ]);

        Jeniskulit::where('id', $id)->update([
            'kode_jenis' => $request->kode_jenis,
            'nama_jeniskulit' => $request->nama_jeniskulit,
            'rekomendasi_treatment' => $request->rekomendasi_treatment,
        ]);

        Alert::success('Berhasil', 'Data Berhasil diubah');
        return redirect('/jeniskulit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jeniskulit::destroy($id);
        Alert::success('Berhasil', 'Data Berhasil dihapus');
        return redirect('/jeniskulit');
    }

}
