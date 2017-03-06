<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Disciplina;
use App\Estado;
use App\Status_Turma;
use App\Monitoria;
class Turma extends Model
{
  	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $fillable = [
        'id', 'turma', 'professor', 'fk_cod_disciplina', 'fk_status_turma_id'
    ];

    public function disciplina()
    {
    	return $this->belongsTo(Disciplina::class,'fk_cod_disciplina', 'cod_disciplina');
    }

    public function status(){
        return $this->hasOne(Status_Turma::class, 'id', 'fk_status_turma_id');
    }
    public function monitoresCount(){
        return Monitoria::where('fk_turmas_id', $this->id)->count();
    }
    public function monitoresStatusCount($status){
        return Monitoria::where([['fk_turmas_id', $this->id],['fk_status_monitoria_id', $status]])->count();
    }
    public function monitoresRemuneracaoCount($remuneracao){
        return Monitoria::where([['fk_turmas_id', $this->id],['remuneracao', $remuneracao]])->count();
    }
    public function monitoresAdminCount($remuneracao){
        return Monitoria::where('remuneracao', $remuneracao)
                        ->where('fk_turmas_id', $this->id)
                            ->where(function($query){
                                    $query->where('fk_status_monitoria_id', 3)
                                        ->orWhere('fk_status_monitoria_id', 5)
                                        ->orWhere('fk_status_monitoria_id', 6);
                                })
                                ->count(); 
    }
}
