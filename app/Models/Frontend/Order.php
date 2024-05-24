<?php

namespace App\Models\Frontend;

use App\Models\Admin\DeliveryArea;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }



    public function addresses()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }


    public function orderItem()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
