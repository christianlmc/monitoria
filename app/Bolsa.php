<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bolsa extends Model
{
	const UPDATED_AT = null;
     protected $fillable = [
        'id', 'quantidade', 'created_at'
        ];

}
