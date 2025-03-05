<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'service_on_id', 'requirement'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceOn()
    {
        return $this->belongsTo(ServiceOn::class);
    }
    public function serviceFee()
    {
        return $this->belongsTo(ServiceFees::class, 'service_fee_id');
    }
    

}
