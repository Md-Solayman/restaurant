<?php

namespace App\Models\Frontend;

use App\Models\Admin\DeliveryArea;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function delivery()
    {
        return $this->belongsTo(DeliveryArea::class, 'delivery_area_id', 'id');
    }
}
