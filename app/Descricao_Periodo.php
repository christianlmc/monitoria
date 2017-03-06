<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Periodo;

class Descricao_Periodo extends Model
{
  	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  	public $table= "descricao_periodo";
    protected $fillable = [
        'id', 'descricao'
    ];
	public function periodo()
	{
		return $this->belongsTo(Periodo::class,'fk_id_descricao', 'id');
	}

}
