<?php

namespace App\Models\Admin;

use App\Models\Frontend\ProductRating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public function variant()
    {
        return $this->hasMany(ProductVariant::class, 'id', 'product_id');
    }


    public function option()
    {
        return $this->hasMany(ProductOption::class, 'id', 'product_id');
    }


    public function reviews()
    {
        return $this->hasMany(ProductRating::class,  'product_id', 'id');
    }
}
