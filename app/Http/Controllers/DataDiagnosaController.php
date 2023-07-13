<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\Jeniskulit;
use App\Models\Gejalakulit;
use RealRashid\SweetAlert\Facades\Alert;

class DataDiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnosa = Diagnosa::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.data_diagnosa.index', compact('diagnosa'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jeniskulit = Jeniskulit::all();
        $gejalakulit = Gejalakulit::all();
        return view('admin.data_diagnosa.tambah', compact('jeniskulit', 'gejalakulit'));

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
            'kode_gejala' => 'required',
            'kode_jeniskulit' => 'required',
        ]);

        $diagnosa = Diagnosa::create([
            'id_gejala' => $request->kode_gejala,
            'kode_jeniskulit' => $request->kode_jeniskulit,
        ]);

        Alert::success('Berhasil', 'Data Berhasil ditambahkan');
        return redirect('/data-diagnosa');
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
        
        $jeniskulit = Jeniskulit::all();
        $gejalakulit = Gejalakulit::all();
        $edit = Diagnosa::find($id);
    
        return view('admin.data_diagnosa.edit', compact('jeniskulit', 'gejalakulit', 'edit'));
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
            'kode_gejala' => 'required',
            'kode_jeniskulit' => 'required',
        ]);

        Diagnosa::where('id', $id)->update([
            'id_gejala' => $request->kode_gejala,
            'kode_jeniskulit' => $request->kode_jeniskulit,
        ]);

        Alert::success('Berhasil', 'Data Berhasil diubah');
        return redirect('/data-diagnosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Diagnosa::destroy($id);
        Alert::success('Berhasil', 'Data Berhasil dihapus');
        return redirect('/data-diagnosa');
    }
}
