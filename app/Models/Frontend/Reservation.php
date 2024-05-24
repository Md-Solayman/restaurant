<?php

namespace App\Models\Frontend;

use App\Models\Admin\ReservationTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function reservation_time()
    {
        return $this->belongsTo(ReservationTime::class, 'reservation_time_id', 'id');
    }
}
