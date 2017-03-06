<?php   
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Adldap;

use Carbon\Carbon;
use App\Turma;
use App\Bolsa;
use App\User;
use App\Monitoria;
use App\Periodo;
use DB;
use Response;
use Yajra\Datatables\Facades\Datatables;

use App\EnumStatusMonitoria;
/*
* @resource AdminController
*/
class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function remunerados()
    {
        $avaliacaoData = Periodo::where('fk_id_descricao', 2)->get();
        $avaliacaoData = $avaliacaoData[0];

        $resultadoData = Periodo::where('fk_id_descricao', 6)->get();
        $resultadoData = $resultadoData[0];


        $avaliacaoData->fim = Carbon::createFromFormat('Y-m-d H:i:s', $avaliacaoData->fim);
        $resultadoData->inicio = Carbon::createFromFormat('Y-m-d H:i:s', $resultadoData->inicio);

        $hoje = Carbon::now();
        if(!$hoje->between($avaliacaoData->fim,$resultadoData->inicio))
        {
            return view('admin/remunerados')->with('status', 'Fora do período de cadrastamento no SIGRA');
        }
//SELECT * FROM monitoria where remuneracao = remunerada AND (fk_status_monitoria_id = 3 or  fk_status_monitoria_id = 4 )
        $monitores = Monitoria::where('remuneracao','remunerada')
                                ->where(function($query){
                                    $query->where('fk_status_monitoria_id', EnumStatusMonitoria::deferido)
                                        ->orWhere('fk_status_monitoria_id', EnumStatusMonitoria::aceito_sigra)
                                        ->orWhere('fk_status_monitoria_id', EnumStatusMonitoria::recusado_sigra)
                                        ->orWhere('fk_status_monitoria_id', EnumStatusMonitoria::registrado_outra);
                                })
                                ->orderBy('fk_cod_disciplina')
                                ->orderBy('prioridade')
                                ->get();


        
        $turmas = Turma::
                    leftJoin('disciplinas', 'turmas.fk_cod_disciplina', '=', 'disciplinas.cod_disciplina')
                    ->orderBy('fk_tipo_disciplina_id', 'asc')
                    ->orderBy('c_prat', 'desc')
                    ->get();

        $bolsa = Bolsa::orderBy('created_at','desc')->first();
        

        return view('admin/remunerados' ,compact('monitores','turmas', 'bolsa'));
    }
    public function voluntarios()
    {
        $avaliacaoData = Periodo::where('fk_id_descricao', 2)->get();
        $avaliacaoData = $avaliacaoData[0];

        $resultadoData = Periodo::where('fk_id_descricao', 6)->get();
        $resultadoData = $resultadoData[0];


        $avaliacaoData->fim = Carbon::createFromFormat('Y-m-d H:i:s', $avaliacaoData->fim);
        $resultadoData->inicio = Carbon::createFromFormat('Y-m-d H:i:s', $resultadoData->inicio);

        $hoje = Carbon::now();

        if(!$hoje->between($avaliacaoData->fim,$resultadoData->inicio))
        {
            return view('admin/voluntarios')->with('status', 'Fora do período de cadrastamento no SIGRA');
        }

        $monitores = Monitoria::where('remuneracao','voluntaria')
                                ->where(function($query){
                                    $query->where('fk_status_monitoria_id', 3)
                                        ->orWhere('fk_status_monitoria_id', 5)
                                        ->orWhere('fk_status_monitoria_id', 6);
                                })
                                ->orderBy('fk_cod_disciplina')
                                ->orderBy('prioridade')
                                ->get();
        
        $turmas = Turma::
                    leftJoin('disciplinas', 'turmas.fk_cod_disciplina', '=', 'disciplinas.cod_disciplina')
                    ->orderBy('fk_tipo_disciplina_id', 'asc')
                    ->orderBy('c_prat', 'desc')
                    ->get();

        return view('admin/voluntarios' ,compact('monitores','turmas'));
    }

    public function atualizarStatusMonitoria(Request $data){

    	$monitor = Monitoria::where('id', $data->id_monitoria)->get();
        $monitor = $monitor[0];
        
        // if($data->status == 3){ // caso tenha aceito no sigra, atualizar todas inscricoes com essa matricula
        // Monitoria::where('fk_matricula', $monitor->fk_matricula)
        //          ->where(function($query){
        //                             $query->where('fk_status_monitoria_id', 4)
        //                                 ->orWhere('fk_status_monitoria_id', 5)
        //                                 ->orWhere('fk_status_monitoria_id', 7)
        //                                 ->orWhere('fk_status_monitoria_id', 6);
        //           })
        //             ->update(array('fk_status_monitoria_id' => 3, 'descricao_status' => "N/A"));
        // }


        if($data->status == EnumStatusMonitoria::aceito_sigra){ // caso tenha aceito no sigra, atualizar todas inscricoes com essa matricula
    	Monitoria::where('fk_matricula', $monitor->fk_matricula)
                    ->where('fk_status_monitoria_id', 3)
                    ->where('id', '<>', $data->id_monitoria)
                    ->update(array('fk_status_monitoria_id' => EnumStatusMonitoria::registrado_outra,'descricao_status' => $data->dados_turma));
        
        } 
        
        Monitoria::where('id', $data->id_monitoria)
                  ->update(array('fk_status_monitoria_id' => $data->status, 'descricao_status' => $data->descricao));
        
    
    }
    public function definicoes(){
        
        $periodos = Periodo::get();
        $bolsa = Bolsa::orderBy('created_at','DESC')->first();
      	if(!$bolsa){
	 Bolsa::create(['quantidade'=> 1]);
	 $bolsa = Bolsa::orderBy('created_at','DESC')->first();

	}
        foreach($periodos as $periodo){
          $periodo->inicio =  Carbon::parse($periodo->inicio)->format('d/m/Y H:i');
          $periodo->fim =  Carbon::parse($periodo->fim)->format('d/m/Y H:i');
        }
        return view('admin/definicoes', compact('periodos', 'bolsa'));
    }
    public function salvarDefinicoes(Request $request){

        $quantidade = Periodo::count();

        for($i = 0; $i < $quantidade; $i++){
            

            $inicio = Carbon::createFromFormat('d/m/Y H:i', $request->inicio[$i]);
            $inicio = $inicio->format('Y-m-d H:i:s');

            $fim = Carbon::createFromFormat('d/m/Y H:i', $request->fim[$i]);
            $fim = $fim->format('Y-m-d H:i:s');

            Periodo::where('id', $request->tipo[$i])
            ->update(['inicio' => $inicio, 'fim' => $fim]) ;

        }

        Bolsa::create(['quantidade' => $request->bolsas]);
        return $this->definicoes();
        
    }

    public function editarAluno(Request $request)
    {
        if(!$request->has('id'))
        {
            $alunos = User::get();
            return view('admin/editarAluno', compact('alunos'));
        }
        else
        {
            $alunos = User::where('id', '=', $request->id)->get();
            return Response::json($alunos);
        }
    }

    public function salvarAluno(Request $request)
    {

        User::where('id', '=', $request->id)->update(array('name' => $request->nome, 'matricula' => $request->matricula, 
                                                            'cpf' => $request->cpf, 'rg' => $request->rg));

        $alunos = User::where('id', '=', $request->id)->get();

        return Response::json($alunos);
    }

    public function bolsasEsgotadas(){
        Monitoria::where('remuneracao', 'remunerada')
                  ->where('fk_status_monitoria_id', 3)
                  ->update(['fk_status_monitoria_id' => 6, 'descricao_status' => 'Não há mais bolsas.']);
        return redirect('/admin/voluntarios/');
    }
    public function relatorio(){
        $monitores = Monitoria::get();
        return view('/admin/relatorio',compact('monitores'));
    }

    public function exportar_csv()
    {
        $headers = array(
            'Content-Type'        => 'application/vnd.ms-excel; charset=utf-8',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Disposition' => 'attachment; filename=monitoria.csv',
            'Expires'             => '0',
            'Pragma'              => 'public',
        );
        $filename = "monitoria.csv";
        $handle = fopen($filename, 'w');
        fputcsv($handle, [
           "id",
           "remuneracao",
           "Matrícula",
           "Codígo da Disciplina",
           "Descrição",
           "Prioridade",
        ]);
        Monitoria::chunk(100, function($data) use($handle) {
                foreach ($data as $row) {
                    // Add a new row with data
                    fputcsv($handle, [
                       $row->id,
                       $row->remuneracao,
                       $row->fk_matricula,
                       $row->fk_cod_disciplina,
                       $row->descricao_status,
                       $row->prioridade,
                       $row->turma->turma,
                       $row->turma->professor,
                    ]);
                };
        });
        fclose($handle);
        return Response::download($filename, "monitoria.csv", $headers);
    }
}
