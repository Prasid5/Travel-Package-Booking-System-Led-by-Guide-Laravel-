<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tourists extends Authenticatable
{
    use HasFactory;
    protected $table = 'tourists';
    protected $primaryKey = 'tourist_id';

    protected $fillable = [
        'username',
        'email',
        'password',
        'country',
        'gender'
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
    
    // One-to-one relationship with the Trips model
    public function trip()
    {
        return $this->hasOne(Trips::class, 'tourist_id');
    }

}
