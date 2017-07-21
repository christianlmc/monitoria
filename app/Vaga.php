<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $fillable = [
        'id', 't_total', 't_ocupadas', 	't_restantes', 	'c_total', 	'c_ocupadas', 	'c_restantes',
    ];
}

