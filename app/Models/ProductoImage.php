<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoImage extends Model
{
    use HasFactory;

    protected $table = 'productos_images';

    protected $fillable = [
        
        'producto_id',
        'image',
        
    ]; 
}
