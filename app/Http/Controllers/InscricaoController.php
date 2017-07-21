<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Disciplina;
use App\Turma;
use App\User;
use App\Monitoria;
use App\Dados_Bancarios;
use Carbon\Carbon;
use App\Periodo;

class InscricaoController extends Controller
{
	public function __construct(Request $request)
	{
		$request->request->add(['tipo' => 'inscricao']);
        $this->middleware(['auth','checkDate']);
	}
	
	public function index()
	{
		$disciplinas = Disciplina::where('cod_disciplina', '<>', 113913)->orderBy('nome')->pluck('nome', 'cod_disciplina');
        
		$id_dados_bancarios = Auth::user()->fk_banco;
		return view('inscricao', compact('disciplinas', 'id_dados_bancarios'));
	}

	public function dados_bancarios(Request $request)
	{
		$dados_bancarios = Dados_Bancarios::where('id', $request->id_banco)->get();
		return $dados_bancarios;
	}

	public function search_turmas(Request $request)
	{
		$turmas = Turma::with('disciplina')->where('fk_cod_disciplina', $request->cod_disciplina)->orderBy('turma')->get();
		return $turmas;
	}

    // Confere se usuário já esta inscrito para aquela turma
    public function confere_inscricao(Request $data)
    {

        if(Monitoria::where([['fk_matricula', Auth::user()->matricula],
                             ['fk_turmas_id', $data->turma],
                             ])->count() >= 2)
            return response()->json(true);


    	if(Monitoria::where([['fk_matricula', Auth::user()->matricula],
                             ['fk_turmas_id', $data->turma],
                             ['remuneracao', $data->remuneracao]])->get()->count() > 0)
        {
            
            return response()->json(true);
        }
        else
        {
            return response()->json(false);
        }

    }
    public function confirmar(Request $request)
    {
    	$matricula = Auth::user()->matricula;
    	$dados_monitoria = $request->all();
    	$dados_bancarios = Auth::user()->fk_banco;
    	$bolsa = $dados_monitoria['bolsa'];
    	if ($dados_monitoria['bolsa'] != 'voluntaria' && !$dados_bancarios)
    	{
    		$this->validate($request,[
    				'código_do_banco' => 'required|numeric',
    				'agência' => 'required|alpha_num',
    				'conta_corrente' => 'required|numeric',
    				'turma' => 'required'
    		]);
    	}
    	else
    	{
	    	$this->validate($request,[
	    			'turma' => 'required',
	    	]);
    	}
        $isInscritoRemunerada = Monitoria::where([
                             ['fk_matricula', Auth::user()->matricula],
                             ['fk_turmas_id', $dados_monitoria['turma']],
                             ['remuneracao', 'remunerada']
                             ])->count();
        
        $isInscritoVoluntaria = Monitoria::where([
                             ['fk_matricula', Auth::user()->matricula],
                             ['fk_turmas_id', $dados_monitoria['turma']],
                             ['remuneracao', 'voluntaria']
                             ])->count();
        
        
        
        if($bolsa != 'voluntaria'){
            if ($dados_bancarios == NULL) //se a opcao escolhida for remunerada/ambas
                    {
                        $banco = Dados_Bancarios::create([ // tem que ver se ja nao tem duplicado
                            'codigo' => $dados_monitoria['código_do_banco'],
                            'agencia' => $dados_monitoria['agência'],
                            'conta_corrente' => $dados_monitoria['conta_corrente']
                        ]);
                        User::where('matricula', $matricula)->update(['fk_banco' => $banco->id]);
            }
        }

        //Atualiza o status da turma para "nenhuma ação realizada"
        Turma::where('id', $dados_monitoria['turma'])->update(['fk_status_turma_id' => 1]);

        if($bolsa =='voluntaria'){
            if($isInscritoVoluntaria == 0)
                $this->inscrever($request, 'voluntaria');
        }
        else if($bolsa =='remunerada'){
            if($isInscritoRemunerada == 0)
                $this->inscrever($request, 'remunerada');
        }
        else{
            if($isInscritoVoluntaria == 0)
                $this->inscrever($request, 'voluntaria');
            if($isInscritoRemunerada == 0)
                $this->inscrever($request, 'remunerada');
        }
        
	

    	return redirect("/aluno/acompanhar");
    }
    public function acompanhar()
    {
        $mostrar = false;
        $hoje = Carbon::now();
        $inscricao = Periodo::where('fk_id_descricao', 1)->first();


        $inscricao->inicio = Carbon::createFromFormat('Y-m-d H:i:s', $inscricao->inicio);
        $inscricao->fim = Carbon::createFromFormat('Y-m-d H:i:s', $inscricao->fim);

        if($hoje->between($inscricao->inicio,$inscricao->fim))
            $mostrar = true;

    	$matricula = \Illuminate\Support\Facades\Auth::user()->matricula;
    	$monitorias = Monitoria::where('fk_matricula', $matricula)->get();
    	//dd($monitorias);
    	return view('acompanhar', compact('monitorias', 'mostrar'));
    }
    public function deletar(Request $request)
    {
        $matricula = Auth::user()->matricula;


    	Monitoria::where('id', $request->id_inscricao)->
                    where('fk_matricula', $matricula)->delete();
    	return redirect("/aluno/acompanhar");
    }
    public function inscrever(Request $data, $tipo){
        $matricula = Auth::user()->matricula;
        $dados_monitoria = $data->all();
        $dados_bancarios = Auth::user()->fk_banco;
	try{
        Monitoria::insert([
                'remuneracao' => $tipo,
                'fk_matricula' => $matricula,
                'fk_cod_disciplina' => $dados_monitoria['cod_disciplina'],
                'fk_turmas_id' => $dados_monitoria['turma'],
                'fk_status_monitoria_id' => 1,
                'descricao_status' => "N/A",
                'prioridade' => NULL
	       ]);
	}
	catch(Exception $e){
	 return redirect("/aluno/inscricao/")->with('error', "Ouve uma falha ao conectar ao banco, por favor entre em contato com o CIC");
	}

    }
}

















