<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMetadata extends Model
{

    protected $casts = [
        'address' => 'array',
        'phone' => 'array'
    ];

    public function getAddressAttribute($value){
        dump($value);
    }
}
