<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $table = 'diagnosa';
    protected $fillable = [
        'id',
        'kode_jeniskulit',
        'id_gejala'
    ];

    public function goal()
    {
        return $this->hasOne(Jeniskulit::class, 'kode_jenis', 'kode_jeniskulit');
    }

    public function premis()
    {
        return $this->hasOne(Gejalakulit::class, 'id', 'id_gejala');
    }
}
