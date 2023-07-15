<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Treatment;
use RealRashid\SweetAlert\Facades\Alert;


class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treatment = Treatment::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.informasi.treatment.datatreatment', compact('treatment'));
    }

    public function treatment()
    {
        $treatment = Treatment::get();
        return view('user.informasi.treatment', compact('treatment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.informasi.treatment.tambahtreatment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_treatment' => 'required|max:255',
            'gambar' => 'required|image|mimes:png,jpg,jpeg',
            'fungsi' => 'required|max:255',
            'harga' => 'required',
            'deskripsi' => 'required|max:255',
        ]);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('post-treatments');
        }

        Treatment::create($validatedData);
        
        Alert::success('Berhasil', 'Data Berhasil ditambahkan');
        return redirect('/treatment');
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
        $edit = Treatment::find($id);
        return view('admin.informasi.treatment.edittreatment', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treatment $treatment)
    {
        $rules = [
            'nama_treatment' => 'required|max:255',
            'gambar' => 'image|mimes:png,jpg,jpeg',
            'fungsi' => 'required|max:255',
            'harga' => 'required',
            'deskripsi' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $validatedData['gambar'] = $request->file('gambar')->store('post-treatments');
        }

            Treatment::where('id', $treatment->id)
                        ->update($validatedData);

        Alert::success('Berhasil', 'Data Berhasil diubah');
        return redirect('/treatment');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatment $treatment)
    {
        if($treatment->gambar) {
            Storage::delete($treatment->gambar);
        }
        Treatment::destroy($treatment->id);
        Alert::success('Berhasil', 'Data Berhasil dihapus');
        return redirect('/treatment');
    }
}