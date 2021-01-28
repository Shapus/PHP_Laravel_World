<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //
    protected $table = 'continent';
    public $tiemstamp = true;

    protected $fillable = [
        'Id',
        'Name'
    ];
}
