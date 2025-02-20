<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    use HasFactory;

    protected $fillable = [
        'job_no',
        'user_id',
        'service_id',
        'service_on_id',
        'requirement_id',
        'pref_date',
        'time',
        'contact_no',
        'address',
        'landmark',
        'city',
        'state',
        'pincode',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
{
    return $this->belongsTo(Service::class, 'service_on_id');
}

    public function serviceOn()
    {
        return $this->belongsTo(ServiceOn::class);
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }
}
