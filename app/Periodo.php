<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Descricao_Periodo;

class Periodo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'inicio', 'fim'
    ];
	public function descricao()
	{
		return $this->hasOne(Descricao_Periodo::class,'id', 'fk_id_descricao');
	}
}
