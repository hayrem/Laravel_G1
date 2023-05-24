<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        'area',
        'farmer_id',
        'province_id'
    ];

    public function farmer() {
        return $this->belongsTo(Farmer::class);
    }
    public function province() {
        return $this->belongsTo(Province::class);
    }
}
