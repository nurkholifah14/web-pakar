<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use DateTimeInterface;

class RiwayatDiagnosa extends Model
{
    use HasFactory;
    protected $table = 'riwayat_diagnosa';
    // public $timestamp = true;
    protected $fillable = [
        'id',
        'id_user',
        'nama',
        'umur',
        'alamat',
        'telp',
        'hasil_diagnosa',
        'tanggal_konsultasi',
        'rekomendasi_treatment'
    ];

    public function goal()
    {
        return $this->hasOne(Jeniskulit::class, 'id', 'hasil_diagnosa');
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class, 'id_riwayat', 'id');
    }

    static function riwayat_byuserid($id_user){
        $data = DB::table('riwayat_diagnosa')->where('id_user', $id_user)->get();
        return $data;
    }

    protected function serializeDate(DateTimeInterface $date)
{
    return $date->format('Y-m-d H:i:s');
}

}
