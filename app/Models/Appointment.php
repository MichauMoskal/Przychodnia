<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $fillable = [
        'appointment_date',
        'user_id',
        'service_id',
        'isApproved',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
     public function service()
     {

        return $this->belongsTo('App\Models\Service','service_id');
     }

    use HasFactory;
}
