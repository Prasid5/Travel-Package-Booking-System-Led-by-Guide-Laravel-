<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripDetail extends Model
{
    use HasFactory;
    protected $table="trip_detail";
    protected $primaryKey="id";
    protected $fillable = [
        'place',
        'activities',
        'travel_class',
        'base_price',
        'travelling_days'
    ];
}
