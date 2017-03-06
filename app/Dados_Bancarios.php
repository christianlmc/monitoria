<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
//use App\Turma;
//use App\Disciplina;

class Dados_Bancarios extends Model
{
	//Necessario, caso contrario ele deixa o nome da tabela no plural
	public $table= "dados_bancarios";
	public $timestamps = false;
	
	protected $fillable = [
			'codigo', 'agencia', 'conta_corrente'
	];
	public function user()
	{
		return $this->belongsTo(User::class,'fk_banco', 'id'); // nao sei se ta certo
	}
	
}
