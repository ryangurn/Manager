<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMetadata extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'birthdate',
        'additional'
    ];

    protected $casts = [
        'address' => 'array',
        'phone' => 'array'
    ];

    public function AddressValidator(){
        return [
            'addressOne' => [
                'required'
            ],
            'addressTwo' => [
                ''
            ],
            'city' => [
                'required'
            ],
            'state' => [
                'required'
            ],
            'zipcode' => [
                'required'
            ],
            'country' => [
                'required',
                'min:2',
                'max:2'
            ]
        ];
    }

    public function PhoneValidator(){
        return [
            'phone' => [
                'required',
                'phone:US',
            ],
            'carrier' => [
                'required',
                'exists:carriers,id'
            ]
        ];
    }

    public function BirthdateValidator(){
        return [
            'dob' => [
                'required',
                'date'
            ]
        ];
    }
}
