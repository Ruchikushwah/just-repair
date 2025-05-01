<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
    ];

    public function service_ons()
    {
        return $this->hasMany(ServiceOn::class);
    }

    public function service_fees()
    {
        return $this->hasMany(ServiceFees::class);
    }
    
    public function serviceFees()
    {
        return $this->hasMany(ServiceFees::class);
    }
    public function serviceOn()
    {
        return $this->hasMany(ServiceOn::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }
}
