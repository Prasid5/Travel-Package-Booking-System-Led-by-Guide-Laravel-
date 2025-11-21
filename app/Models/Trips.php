<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    use HasFactory;
    protected $table="trips";
    protected $primaryKey="trip_id";

    protected $fillable = [
        'tourist_id',
        'guide_id',
        'place',
        'package',
        'no_of_people',
        'travel_date',
        'price',
        'status'
    ];

     // Define the relationship with the Tourists model
     public function tourist()
     {
         return $this->belongsTo(Tourists::class, 'tourist_id');
     }
 
     // Define the relationship with the Guides model
     public function guide()
     {
         return $this->belongsTo(Guides::class, 'guide_id');
     }
}
