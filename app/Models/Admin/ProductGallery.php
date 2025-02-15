<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
