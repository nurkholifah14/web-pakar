<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejalakulit extends Model
{
    use HasFactory;

    
    protected $table = 'gejalakulit';

    protected $guarded = [];

    public $fillable = [
        'id',
        'kode_gejala',
        'gejala',
    ];

    public function rule()
    {
        return $this->hasMany(Diagnosa::class, 'id_gejala', 'id');
    }
}
