<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_number',
        'servicefees_id',
        'appointment_id',
        'total_amount',
        'invoice_date',
        'service_date',
    ];

    protected $casts = [
        'invoice_date' => 'datetime',
        'service_date' => 'datetime',
    ];

    public function serviceFee()
    {
        return $this->belongsTo(ServiceFees::class, 'servicefees_id');
    }


    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
