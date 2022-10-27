<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Producto;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [

        'name',
        'slug',
        'description',
        'image',
        'status',

    ];

    public function products() {

        return $this->hasMany(Producto::class, 'category_id', 'id');

    }
}
