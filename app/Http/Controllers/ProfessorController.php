<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Adldap;

use Carbon\Carbon;

use App\Periodo;
use App\Turma;
use App\User;
use App\Monitoria;
use DB;


class ProfessorController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function turmas()
    {
        $mostrar = false;
        $hoje = Carbon::now();
        $aval = Periodo::where('fk_id_descricao', 2)->get();
        $aval = $aval[0];


        $aval->inicio = Carbon::createFromFormat('Y-m-d H:i:s', $aval->inicio);
        $aval->fim = Carbon::createFromFormat('Y-m-d H:i:s', $aval->fim);

        if($hoje->between($aval->inicio,$aval->fim))
            $mostrar = true;
            

        $professor = Auth::user()->name;

        // pegando o primeiro e o ultimo nome do ldap
        $parts = explode(" ", $professor);
        $lastname = '%'.array_pop($parts).'%';
        // $firstname = implode(" ", $parts).'%';
        $firstname = $parts[0].'%';

        // var_dump($lastname);
        // var_dump($firstname);
        $turmas = Turma::where('professor', 'like', $firstname)
                         ->where('professor', 'like', $lastname)
                         ->get();

        

        return view('professor/turmas' ,compact('turmas', 'mostrar'));
    }

    public function salvar(Request $request)
    {  
        $idturma = $request->id_turma;
        // pq comentaram isso?
        Monitoria::where('fk_turmas_id', $idturma)->update(['fk_status_monitoria_id' => 4]);

        $selecionados = $request->selecionados;

        if($selecionados){
            foreach($selecionados as $selecionado){
                Monitoria::where('fk_matricula', '=', $selecionado)
                            ->where('fk_turmas_id', '=', $idturma)
                            ->update(['fk_status_monitoria_id' => 3]);
            }
        }

        Turma::where('id', '=', $idturma)->update(['fk_status_turma_id' => 2]);
        // return $this->turmas();
        return true;

    }

    public function selecaoTurmas(Request $request)
    {
        // verificando se ha monitores.
        $quant_monitores = Monitoria::where('fk_turmas_id', $request->id_turma)->count();
        if($quant_monitores == 0){
         
        }

        $monitores =Monitoria::where('fk_turmas_id', $request->id_turma)
                    ->groupBy('fk_matricula')
                    ->orderBy('prioridade', 'asc')
                    ->get();
        $turma = Turma::where('id', $request->id_turma)->get();
        //$turma = $turma[0];




        return view('professor/selecaoturmas', compact('monitores','turma'));  
    }
    public function prioridades(Request $request)
    {
        $resultado = $this->salvar($request);

        if($resultado == true)
        {
            $monitores =Monitoria::where([
                ['fk_turmas_id', $request->id_turma],['fk_status_monitoria_id', 3],['remuneracao', 'remunerada']
                ])
                    ->orderBy('prioridade', 'asc')                    
                    ->get();

            $turma = $request->id_turma;

            return view("professor/prioridades", compact('monitores', 'turma'));
        }
        return "Falha";
    }

    public function salvarPrioridade(Request $request)
    {  
        $prioridades = explode(',',$request->ordem_prioridade);
        //dd($prioridades);


        Monitoria::where('fk_turmas_id', '=' ,$request->idTurma)
                  ->update(['prioridade' => NULL]);
        $i = 1;
        if($prioridades){
            foreach ($prioridades as $prioridade) {
                Monitoria::where([
                    ['fk_turmas_id', '=' ,$request->idTurma],['fk_matricula', '=' , $prioridade],['remuneracao', 'remunerada']
                    ])
                        ->update(['prioridade' => $i]);
                $i = $i + 1;
            }
        }

        Turma::where('id', '=', $request->idTurma)->update(['fk_status_turma_id' => 3]);
        return redirect("/professor/turmas");
    }

    public function acompanhar(Request $request)
    {  
        $monitores = Monitoria::where('fk_turmas_id', '=' ,$request->id_turma) 
                                ->orderby('prioridade', 'asc')
                                ->get();
        $turma = Turma::where('id', $request->id_turma)->get();
        $turma = $turma[0];

        return view("/professor/acompanhar", compact('monitores','turma'));
    }
    public function frequencia(Request $data){
        $hoje = Carbon::now();
        $primeira = Periodo::where('fk_id_descricao', 3)->get();
        $primeira = $primeira[0];


        $segunda = Periodo::where('fk_id_descricao', 4)->get();
        $segunda = $segunda[0];

        $primeira->inicio = Carbon::createFromFormat('Y-m-d H:i:s', $primeira->inicio);
        $primeira->fim = Carbon::createFromFormat('Y-m-d H:i:s', $primeira->fim);

        $segunda->inicio = Carbon::createFromFormat('Y-m-d H:i:s', $segunda->inicio);
        $segunda->fim = Carbon::createFromFormat('Y-m-d H:i:s', $segunda->fim);
        

        if($hoje->between($primeira->inicio,$primeira->fim))
            return $this->primeiraFrequencia($data);

        else if($hoje->between($segunda->inicio,$segunda->fim))
            return $this->segundaFrequencia($data);
        else
            return redirect('periodo')->with('status', "Não estamos em período de frequencia");        
    }

    // public function primeiraFrequencia(Request $data){
    //     $monitores = Monitoria::where([
    //                 ['fk_turmas_id', $data->id_turma],['fk_status_monitoria_id', 5]
    //                 ])
    //             ->get();
    //     return view('professor/primeirafrequencia', compact('monitores'));
    // }

    // public function segundaFrequencia(Request $data){
    //     $monitores = Monitoria::where([
    //                 ['fk_turmas_id', $data->id_turma],['fk_status_monitoria_id', 5]
    //                 ])
    //                 ->get();
    //     return view('professor/segundafrequencia', compact('monitores'));
    // }

}
