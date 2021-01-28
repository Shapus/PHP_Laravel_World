<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    public $tiemstamp = true;

    protected $fillable = [
        'Code',
        'Name',
        'ContinentId',
        'Region',
        'IndepYear',
        'Population',
        'GovernmentForm',
        'HeadOfState',
        'Code2',
        'map_src'
    ];
}
