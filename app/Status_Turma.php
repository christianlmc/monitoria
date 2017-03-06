<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Disciplina;
use App\Turma;

class Status_Turma extends Model
{
  	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  	public $table= "status_turma";
    protected $fillable = [
        'id', 'nome'
    ];

	public function status()
	{
		return $this->belongsTo(Turma::class,'fk_status_turma_id', 'id');
	}
}
