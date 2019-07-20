<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    protected $table = 'carriers';

    protected $fillable = [
        'name',
        'gateway',
        'country'
    ];

    protected $casts = [
        'gateway' => 'array'
    ];

    public function setGatewayAttribute($value){
        $retArr = [];
        $explode = explode("@", $value);
        if($explode[0] != ""){
            $retArr['prefix'] = $explode[0];
        }

        if($explode[1] != ""){
            $retArr['address'] = $explode[1];
        }

        $retStr = json_encode($retArr);
        $this->attributes['gateway'] = $retStr;
    }

}
