<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskon;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class InfodiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diskon = Diskon::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.informasi.diskon.index', compact('diskon'));
    }

    public function diskon()
    {
        $diskon = Diskon::with('category')->get();
        return view('user.informasi.diskon', [
            'diskon' => Diskon::all(),  'categories'=>Category::get(),
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $diskon = Diskon::all();
        return view('admin.informasi.diskon.tambah', compact('categories', 'diskon'));
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
            'gambar' => 'required|image|mimes:png,jpg,jpeg',
            'category_id' => 'required|exists:categories,id',
        ]);

        
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('post-diskon');
        }
        
        Diskon::create($validatedData);        
    
        Alert::success('Berhasil', 'Data Berhasil ditambahkan');
        return redirect('diskon');
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
        $categories = Category::all();
        $diskon = Diskon::all();
        $edit = Diskon::find($id);
        return view('admin.informasi.diskon.edit', compact('categories', 'diskon', 'edit'));
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
        $rules = [
            'gambar' => 'image|mimes:png,jpg,jpeg',
            'category_id' => 'required|exists:categories,id',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $validatedData['gambar'] = $request->file('gambar')->store('post-diskon');
        }

            Diskon::where('id', $request->id)
                        ->update($validatedData);

        Alert::success('Berhasil', 'Data Berhasil diubah');
        return redirect('diskon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $diskon = Diskon::findOrFail($id);
        
            if ($diskon->gambar) {
                Storage::delete($diskon->gambar);
            }
        
            $diskon->delete();
        
            Alert::success('Berhasil', 'Data Berhasil dihapus');
            return redirect('diskon');
        
    }
}
