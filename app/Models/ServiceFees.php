<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFees extends Model
{
    protected $fillable = ['service_id', 'name', 'fees'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
