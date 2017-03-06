<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Disciplina;
use App\Status_Monitoria;
use App\Monitoria;

class Status_Monitoria extends Model
{
  	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  	public $table= "status_monitoria";
    protected $fillable = [
        'id', 'nome'
    ];
	public function status()
	{
		return $this->belongsTo(Monitoria::class,'fk_status_monitoria_id', 'id');
	}

}
