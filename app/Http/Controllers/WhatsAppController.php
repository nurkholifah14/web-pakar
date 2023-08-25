<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatDiagnosa;
use Illuminate\Support\Facades\Http;

class WhatsAppController extends Controller
{
    public function sendMessage(Request $request)
    {
        
        $phone = '+6283823094765'; // Ganti dengan nomor telepon yang ingin Anda tuju
        $nama = $request->input('nama');
        $usia = $request->input('usia');
        $alamat = $request->input('alamat');
        $tipeWajah = $request->input('tipe_wajah');
        $keluhanWajah = $request->input('keluhan_wajah');
        $riwayatCream = $request->input('riwayat_cream');
    
        // Ubah nomor telepon menjadi format internasional
        $phone = str_replace(['+', ' '], '', $phone);
    
        // Pesan yang ingin dikirimkan melalui WhatsApp
        $message = "Form Konsultasi Diva Glam\n\n";
        $message .= "Nama: {$nama}\n";
        $message .= "Usia: {$usia}\n";
        $message .= "Alamat: {$alamat}\n";
        $message .= "Tipe Wajah: {$tipeWajah}\n";
        $message .= "Keluhan Wajah: {$keluhanWajah}\n";
        $message .= "Riwayat Pemakaian Cream Sebelumnya: {$riwayatCream}\n";
    
    
        // Buat URL untuk mengirim pesan WhatsApp
        $url = "https://api.whatsapp.com/send?phone={$phone}&text=" . urlencode($message);
    
        // Redirect pengguna ke URL WhatsApp
        return redirect()->away($url);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('diagnosa.form-whatsapp');
    // }

    public function index($id){

        $riwayat = RiwayatDiagnosa::with(['user'])->find($id);
        return view('diagnosa\form-whatsapp', compact('riwayat'))->with('success', $riwayat->nama);
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
        //
    }
}
