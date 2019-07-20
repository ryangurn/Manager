<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Validation\Rule;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $CValidator = [

    ];

    public $RValidator = [

    ];

    public function UValidator($userID){
        return [
            'user' => 'required|integer|exists:users,id',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userID),
            ]
        ];
    }

    public $DValidator = [

    ];

    public function metadata(){
        return $this->hasOne(UserMetadata::class);
    }

    public function getFirstNameAttribute($value){
        return ucfirst(strtolower($value));
    }

    public function getLastNameAttribute($value){
        return ucfirst(strtolower($value));
    }
}
