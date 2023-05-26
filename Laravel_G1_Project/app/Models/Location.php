<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'latitude',
        'longitude'
    ];
    public function drone()
    {
        return $this->hasMany(Drone::class);
    }
    public function drones() {
        return $this->hasMany(Drone::class);
    }


    
}
