<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'service_fee', 'image', 'status'];

    public function serviceOn()
    {
        return $this->hasMany(ServiceOn::class);
    }
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }
    public function serviceFees()
{
    return $this->hasMany(ServiceFees::class);
}
}
