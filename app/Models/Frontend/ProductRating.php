<?php

namespace App\Models\Frontend;

use App\Models\Admin\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
