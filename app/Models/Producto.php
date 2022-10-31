<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PeoductoImage;
use App\Models\Category;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        
        'category_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status'
    ]; 

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productImages() {
        
        return $this->hasMany(ProductoImage::class, 'producto_id', 'id');
    }
}


