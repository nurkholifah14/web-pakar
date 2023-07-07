<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejalakulit;
use App\Models\Jeniskulit;
use App\Models\Hasil;
use App\Models\RiwayatDiagnosa;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Paginator;
use RealRashid\SweetAlert\Facades\Alert;



class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    Public function riwayat(Request $request)
    {
        $cek = RiwayatDiagnosa::where('id', @$request->id)->first();
        if ($cek) {
            RiwayatDiagnosa::where('id', $request->id)->update([
                'hasil_diagnosa' => null
            ]);
            Hasil::where('id_riwayat', $request->id)->delete();
            $id = $request->id;
            $gejala = Gejalakulit::where('id', '1')->first();
            $no = 1;
            return view('diagnosa.index', compact('id', 'gejala', 'no'));
        } else {
            $id = time();
            $waktu = Carbon::now();
            $id_user = Auth::user()->id;
            $request->validate([
                'nama' => 'required',
                'umur' => 'required|max:3',
                'alamat' => 'required',
                'telp' => 'required|min:10|max:13'
            ]);
            RiwayatDiagnosa::create([
                'id' => $id,
                'id_user' => $id_user,
                'nama' => $request->nama,
                'umur' => $request->umur,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'tanggal_konsultasi' => Carbon::now()

            ]);

            $gejala = Gejalakulit::where('id', '1')->first();
            $no = 1;
            return view('diagnosa.index', compact('id', 'gejala', 'no'));
        }
    }

    public function process(Request $request)
    {
    // fungsi menyimpan data pada tabel hasil di database
   $cek = Hasil::where('id_riwayat', $request->idAnalisa)->where('id_gejala', $request->premis)->first();
   if (!$cek) {
       $gejala = Gejalakulit::find($request->premis)->gejala;
       Hasil::create([
           'id_riwayat' => $request->idAnalisa,
           'id_gejala' => $request->premis,
           'gejala' => $gejala,
           'jawaban' => $request->Jawaban
       ]);
   }
//-------------------------------------------------------------------------------------------------------------
//Variabel yang mengambil hasil jawaban iya
   $subGoal = Jeniskulit::all();
   $hasil = Hasil::where('id_riwayat', $request->idAnalisa)->where('jawaban', 1)->get();
   $goal = [];
   foreach ($subGoal as $g) {
       foreach ($g->rule as $gRule) {
           $goal[$g->id][] = $gRule->id_gejala;
       }
   }

   $subHasil = [];
   foreach ($hasil as $h) {
       $subHasil[] = $h->id_gejala;
   }
//queque variabel penampung data yang dipilih iya
//skipped variabel penampung data yang dilewati/data yang dipilih tidak
   $queue = [];
   $skipped = [];
   for ($i = 0; $i < count($subHasil); $i++) {
       foreach ($goal as $gKey => $gVal) {
           if (array_search($gKey, $skipped) !== false) {
               // Skipp goal
           } else {
               if (@$gVal[$i] == $subHasil[$i]) {
                   // Add to queue
                   if (array_search($gKey, $queue) !== false) {
                   } else {
                       $queue[] = $gKey;
                   }
               } else {
                   // Remove From Queue
                   $key = array_search($gKey, $queue);
                   if ($key !== false) {
                       unset($queue[$key]);
                   }

                   // Add for skip goal
                   if (array_search($gKey, $skipped) !== false) {
                   } else {
                       $skipped[] = $gKey;
                   }
               }
           }
       }
   }
//--------------------------------------------------------------------------------------------------------------------
// Variabel yang mengambil hasil pilihan jawaban tidak 
   $ignoreHasil = Hasil::where('id_riwayat', $request->idAnalisa)->where('jawaban', 0)->get();
   if (count($ignoreHasil) > 0) {
       foreach ($ignoreHasil as $ignore) {
           foreach ($goal as $gKey => $gVal) {
               foreach ($gVal as $g) {
                   if ($ignore->id_gejala == $g) {
                       $key = array_search($gKey, $queue);
                       if ($key !== false) {
                           unset($queue[$key]);
                       }

                       $sKey = array_search($gKey, $skipped);
                       if ($sKey !== false) {
                           # code...
                       } else {
                           $skipped[] = $gKey;
                       }
                   }
               }
           }
       }
   }
//---------------------------------------------------
//menghitung jumlah jenis kulit yang sesuai data gejala, jika jenis kulit yang sesuai data gejala 0 maka diagnosa failed
   if (count($queue) == 0) {
       if (count($goal) == count($skipped)) {
           RiwayatDiagnosa::where('id', $request->idAnalisa)->update([
               'hasil_diagnosa' => 'failed'
           ]);
           return response()->json('failed');
       }
//--------------------------------------------------------------------------------------------------------------------
// mengambil semua data gejala untuk dihitung dan dilakukan perulangan data yang akan ditampilkan pada aplikasi
       $premisTotal = Gejalakulit::all();
       $premisTotal = count($premisTotal);
       $premisDone = Hasil::where('id_riwayat', $request->idAnalisa)->get();
       $nextPremisNo = count($premisDone) + 1;
       $nextPremis =   $nextPremisNo;
       for ($i = $nextPremisNo; $i <= $premisTotal; $i++) {
           $premisCheck = Hasil::where('id_riwayat', $request->idAnalisa)->where('id_gejala', $nextPremis)->first();
           if (!$premisCheck) {
               foreach ($goal as $gKey => $gVal) {
                   if ($gVal[0] == $nextPremis) {
                       $premis = Gejalakulit::where('id', $nextPremis)->first();
                       $no = $request->no + 1;
                       return response()->json([
                           "no" => $no,
                           "premis" => $premis->id,
                           "gejala" => $premis->gejala,
                           "goal" => $goal,
                           "queue" => $queue,
                           "skipped" => $skipped
                       ]);
                   }
               }
           }
           $nextPremisNo = $nextPremisNo + 1;
           $nextPremis =   $nextPremisNo;
       }
//----------------------------------------------------------------------------------------------//
//menghitung sisa gejala yang dipilih jika gejala habis dan tidak ada jenis kulit yang sesuai maka hasil diagnosa failed
//queque variabel array penampung data gejala yang sudah ada dalam pohon aturan

       RiwayatDiagnosa::where('id', $request->idAnalisa)->update([
           'hasil_diagnosa' => 'failed'
       ]);
       return response()->json('failed');
   } elseif (count($queue) == 1) {
       $queue = reset($queue);
       $sisa = array_diff($goal[$queue], $subHasil);
       if (count($sisa) > 0) {
           $sisa = reset($sisa);
           $premis = Gejalakulit::where('id', $sisa)->first();
           $no = $request->no + 1;
           return response()->json([
               "no" => $no,
               "premis" => $premis->id,
               "gejala" => $premis->gejala,
               "goal" => $goal,
               "queue" => $queue
           ]);
       } else {
           RiwayatDiagnosa::where('id', $request->idAnalisa)->update([
               'hasil_diagnosa' => Jeniskulit::find($queue)->nama_jeniskulit,
               'rekomendasi_treatment' => Jeniskulit::find($queue)->rekomendasi_treatment
           ]);
           return response()->json('selesai');
       }
   } elseif (count($queue) > 1) {
       $premisTotal = Gejalakulit::all();
       $premisTotal = count($premisTotal);
       $premisDone = Hasil::where('id_riwayat', $request->idAnalisa)->get();
       $nextPremisNo = count($premisDone) + 1;
       $nextPremis =   $nextPremisNo;
//-----------------------------------------------------------------------------------------------//
//oren buat fornt end next pertanyaan(gejala)
//biru $ variabel dari fungsi diatas nya
//biru -> sesuai field di tabel database
       for ($i = $nextPremisNo; $i <= $premisTotal; $i++) {
           $premisCheck = Hasil::where('id_riwayat', $request->idAnalisa)->where('id_gejala', $nextPremis)->first();
           if (!$premisCheck) {
               foreach ($queue as $q) {
                   $testLoop[] = $q;
                   if (array_search($nextPremis, $goal[$q]) !== false) {
                       $premis = Gejalakulit::where('id', $nextPremis)->first();
                       $no = $request->no + 1;
                       return response()->json([
                           "no" => $no,
                           "premis" => $premis->id,
                           "gejala" => $premis->gejala,
                           "goal" => $goal,
                           "queue" => $queue
                       ]);
                   }
               }
           }
           $nextPremisNo = $nextPremisNo + 1;
           $nextPremis =   $nextPremisNo;
       }
   }
}


    public function hasil_diagnosa($id)
    {
        $riwayat = RiwayatDiagnosa::where('id', $id)->where('hasil_diagnosa', '!=', null)->first();
        return view('diagnosa.hasil', compact('riwayat'));
    }

    public function cetak_pdf($id)
    {
        $riwayat = RiwayatDiagnosa::where('id', $id)->where('hasil_diagnosa', '!=', null)->first();

        $pdf = PDF::loadview('diagnosa.cetak-hasil', ['riwayat' => $riwayat]);
        return $pdf->stream('Hasil-Diagnosa');
    }


    public function riwayat_diagnosa()
    {
        $riwayat = RiwayatDiagnosa::orderBy('created_at', 'asc')->paginate(10);
        return view('riwayat_diagnosa.index', compact('riwayat'));
    }

    public function riwayatDiagnosa()
    {
        $user = Auth::user()->id;
        $riwayat = RiwayatDiagnosa::riwayat_byuserid($user);
        // $riwayat = RiwayatDiagnosa::orderBy('created_at', 'asc')->paginate(20);
        return view('riwayat_diagnosa.user', compact('riwayat'));
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RiwayatDiagnosa::destroy($id);
        Alert::success('Berhasil', 'Data Berhasil dihapus');
        return redirect('/admin/riwayat-diagnosa');
    }
}
