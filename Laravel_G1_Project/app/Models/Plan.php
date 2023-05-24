<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_name',
        'date_time', 
        'farmer_id'
    ];

    public function farmer() {
        return $this->belongsTo(Farmer::class);
    }

    public function instruction() {
        return $this->hasMany(Instruction::class);
    }
}
