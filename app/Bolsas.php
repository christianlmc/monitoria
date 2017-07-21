<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bolsas extends Model
{
	const UPDATED_AT = null;
	
     protected $fillable = [
        'id', 'quantidade'
        ];

}
