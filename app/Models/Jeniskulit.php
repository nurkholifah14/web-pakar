<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeniskulit extends Model
{
    use HasFactory;

    
    protected $table = 'jeniskulits';

    protected $guarded = [];

    public $fillable = [
        'id',
        'kode_jenis',
        'nama_jeniskulit',
        'rekomendasi_treatment',
    ];
    public $incrementing = false;

    public function rule()
    {
        return $this->hasMany(Diagnosa::class, 'kode_jeniskulit', 'kode_jenis')->orderBy('id_gejala');
    }
}
