<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guides extends Authenticatable
{
    use Notifiable;
    protected $table='guides';
    protected $primaryKey='guide_id';

    protected $fillable=[
        'license_no',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'address',
        'dob',
        'gender'
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    // automatically hashes the password when saving
    protected $casts = [
        'password' => 'hashed',
    ];

    // Define the one-to-one relationship with the Trips model
    public function trip()
    {
        return $this->hasOne(Trips::class, 'guide_id');
    }
}
