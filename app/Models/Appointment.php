<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'name',
        'contact_no',
        'address',
        'landmark',
        'city',
        'state',
        'pincode',
        'status',
        'job_number'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function serviceOn()
    {
        return $this->belongsTo(ServiceOn::class);
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }
    public function serviceFees()
    {
        return $this->hasMany(ServiceFees::class, 'service_id', 'service_id');
    }
    public function requirements(): BelongsToMany
    {
        return $this->belongsToMany(Requirement::class, 'appointment_requirements', 'appointment_id', 'requirement_id')
            ->withTimestamps();
    }
}
