<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gejalakulit;
use App\Models\Jeniskulit;
use App\Models\RiwayatDiagnosa;


class AdminController extends Controller
{
    public function dashboard(){

        $data["count_pengguna"] = User::where("role", "user")->count();
        $data["count_gejala"] = Gejalakulit::count();
        $data["count_jeniskulit"] = Jeniskulit::count();
        $data["count_riwayat"] = RiwayatDiagnosa::count();

       
        return view('admin.dashboard.index', $data);
    }
}
