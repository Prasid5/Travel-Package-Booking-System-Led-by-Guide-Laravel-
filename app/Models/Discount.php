<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table='discount';
    protected $primaryKey='id';
    protected $fillable = [
        'place',
        'min_people',
        'max_people',
        'discount_rate',
    ];
}
