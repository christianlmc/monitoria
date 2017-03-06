<?php

use App\Turma;
use App\Http\Middleware\CheckRole;
use App\Periodo;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|------------------------------------------------------------o--------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    
	$periodos = Periodo::get();
	foreach($periodos as $periodo){
		$periodo->inicio =  Carbon::parse($periodo->inicio)->format('d/m/Y H:i');
		$periodo->fim =  Carbon::parse($periodo->fim)->format('d/m/Y H:i');
	}
	return view('welcome', compact('periodos'));
    
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/periodo', function(){ return view('periodo');});

Route::group(['prefix' => 'aluno', 'middleware' => 'auth'], function(){
	Route::get('/', function(){
		return view('/home');
	});


    Route::get('/inscricao', 'InscricaoController@index');
    Route::post('/confirmar', 'InscricaoController@confirmar');
    Route::get('/inscricao/disciplina/{cod_disciplina}', 'InscricaoController@search_turmas');
    Route::get('/inscricao/dados_bancarios/{id_banco}', 'InscricaoController@dados_bancarios');
    
 	Route::get('/acompanhar', 'InscricaoController@acompanhar');
 	Route::get('/configurar/email', 'AlunoController@email');
 	Route::get('/configurar/banco', 'AlunoController@dadosbancarios');
  Route::get('/configurar/senha', 'AlunoController@senha');
 	//Route::post('/deletar', 'InscricaoController@deletar');
 	Route::post('/alterar-email', 'AlunoController@alterar_email');
 	Route::post('/alterar-senha', 'AlunoController@alterar_senha');
 	Route::post('/alterar-dadosbanco', 'AlunoController@alterar_dadosbanco');
 	Route::post('/deletar','InscricaoController@deletar');
  Route::post('/conferir', 'InscricaoController@confere_inscricao');
});

Route::get('/professor/login', 'ProfessorAuth\LoginController@showLoginForm');
Route::post('professor/login', 'ProfessorAuth\LoginController@login');
Route::get('/professor',function(){return view('/professor/home');});


Route::group(['prefix' => 'professor', 'middleware' => 'auth:professor'], function () {
  Route::post('/logout', 'ProfessorAuth\LoginController@logout');

  Route::get('/register', 'ProfessorAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'ProfessorAuth\RegisterController@register');


  Route::post('/password/reset', 'ProfessorAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'ProfessorAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'ProfessorAuth\ResetPasswordController@showResetForm');

  Route::get('/turmas', 'ProfessorController@turmas');
  Route::post('/turmas/prioridades', 'ProfessorController@prioridades');
  Route::post('/turmas/selecaoturmas', 'ProfessorController@selecaoTurmas')->middleware('checkDate');
  // Route::post('/turmas/salvar', 'ProfessorController@salvar');
  Route::post('/turmas/salvarPrioridade', 'ProfessorController@salvarPrioridade');
  Route::post('/turmas/acompanhar', 'ProfessorController@acompanhar');


  Route::post('/turmas/frequencia', 'ProfessorController@frequencia');
  Route::post('/turmas/primeiraFrequencia', 'ProfessorController@primeiraFrequencia');
  Route::post('/turmas/segundaFrequencia', 'ProfessorController@segundaFrequencia');
});

Route::get('/admin/login', 'AdminAuth\LoginController@showLoginForm');
Route::post('/admin/login', 'AdminAuth\LoginController@login');
Route::get('/admin/register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::post('/admin/register', 'AdminAuth\RegisterController@register');

Route::get('/admin', function(){return view('admin/home');});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
  Route::get('/relatorio', 'AdminController@relatorio');
  Route::get('/voluntarios', 'AdminController@voluntarios');
  Route::get('/remunerados', 'AdminController@remunerados');
  Route::get('/remunerados/bolsasEsgotadas', 'AdminController@bolsasEsgotadas');
  Route::post('/atualizar', 'AdminController@atualizarStatusMonitoria');
  Route::get('/definicoes', 'AdminController@definicoes');
  Route::post('/definicoes/salvar', 'AdminController@salvarDefinicoes');

  Route::get('/editarAluno', 'AdminController@editarAluno');
  Route::post('/editarAluno', 'AdminController@salvarAluno');

  Route::get('/exportarcsv', 'AdminController@exportar_csv');
  Route::post('/logout', 'AdminAuth\LoginController@logout');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
