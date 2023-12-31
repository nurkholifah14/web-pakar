<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Diskon extends Model
{
    use HasFactory;

    protected $table = 'diskon';
    protected $fillable = [
        'category_id',
        'gambar',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    

}
