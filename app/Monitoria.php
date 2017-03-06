<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Turma;
use App\Disciplina;
use App\Status_Monitoria;

class Monitoria extends Model
{
	//Necessario, caso contrario ele deixa o nome da tabela no plural
	public $table= "monitoria";
	public $timestamps = false;
	
	protected $fillable = [
			'remuneracao', 'fk_matricula', 'fk_cod_disciplina', 'fk_turmas_id', 'fk_status_monitoria', 'prioridade', 'descricao_status'
	];
	public function disciplina()
	{
		return $this->belongsTo(Disciplina::class,'fk_cod_disciplina', 'cod_disciplina');
	}
	public function turma()
	{
		return $this->belongsTo(Turma::class,'fk_turmas_id', 'id');
	}
	public function user()
	{
		return $this->belongsTo(User::class,'fk_matricula', 'matricula');
	}

    public function status(){
        return $this->hasOne(Status_Monitoria::class,  'id' ,'fk_status_monitoria_id');
    }
	
}
