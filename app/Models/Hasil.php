<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $table = 'hasil';

    public $fillable = [
        'id_riwayat',
        'id_gejala',
        'gejala',
        'jawaban',
    ];
    public function premis()
    {
        return $this->hasOne(Gejalakulit::class, 'id', 'id_gejala');
    }

}
