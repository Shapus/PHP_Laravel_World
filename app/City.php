<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'city';
    public $tiemstamp = true;

    protected $fillable = [
        'Name',
        'CountryCode',
        'Population'
    ];
}
