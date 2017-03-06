<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cod_disciplina', 'nome'
    ];
}
