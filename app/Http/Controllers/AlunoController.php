<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dados_Bancarios;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
/*
* @resource AlunoController
*/
class AlunoController extends Controller
{
    /*
    * Construct, passa pelo middlware de auth
    */
	public function __construct()
	{
		$this->middleware('auth');
	}
	/*
    * Retorna o email para a view de configurar/email
    */
    public function email()
    {
    	$email = Auth::user()->email;
    	return view('configurar/email', compact('email'));
    }
    /*
    * Retorna os dados bancarios para a view configurar/banco
    */
    public function dadosbancarios()
    {
	    $banco_codigo = Auth::user()->fk_banco;
	    $dados_bancarios = Dados_Bancarios::where('id', $banco_codigo)->get();
	    return view('configurar/banco', compact('dados_bancarios'));
    }

    /*
    * Para a view configurar/senha
    */
    public function senha()
    {
        return view('configurar/senha', compact('dados_bancarios'));
    }
    
    /*
    * Altera o email passado como parametro
    * @param $request , dados da pagina enviada
    */
    public function alterar_email(Request $request)
    {	
    	$this->validate($request,[
    			'email' => 'required|email|confirmed|unique:users',
    	]);
    	$email = Auth::user()->email;
    	$emailnovo = $request->email;
    	User::where('email', $email)
    	->update([
    		'email' => $emailnovo
    	]);
    	
    	return redirect('aluno/configurar/email')->with('status', 'E-Mail atualizado!');
    }
    
    public function alterar_senha(Request $request)
    {
    	if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->senha_atual])) 
        {
            if($request->nova_senha == $request->nova_senha_confirmation)
            {
                Auth::user()->password = bcrypt($request->nova_senha);
                Auth::user()->save();
            }
            else
            {
                return redirect('aluno/configurar/senha')->with('erro', 'Senhas digitadas não conferem!');
            }
        }
        else
        {
            return redirect('aluno/configurar/senha')->with('erro', 'Senha atual não corresponde a senha de usuário!');
        }
        
        return redirect('aluno/configurar/senha')->with('status', 'Senha atualizada!');
    
    }
    /*
    * Altera os dados bancários passado como parametro
    * @param $request , dados da pagina enviada
    */
    public function alterar_dadosbanco(Request $request)
    {
    	$matricula = Auth::user()->matricula;
    	$this->validate($request,[
    			'código_do_banco' => 'required|numeric',
    			'agência' => 'required|numeric',
    			'conta_corrente' => 'required|numeric',
    	]);
    	
    	$banco_codigo = $request->input('código_do_banco');
    	$banco_agencia = $request->input('agência');
    	$banco_cc = $request->input('conta_corrente');
    	
    	
    	$usuario_banco = \Illuminate\Support\Facades\Auth::user()->fk_banco;
    	
    	if ($usuario_banco != null)
    	{
	    	Dados_Bancarios::where('id', $usuario_banco)
	    	->update([
	    		'codigo' => $banco_codigo,
	    		'agencia' => $banco_agencia,
	    		'conta_corrente' => $banco_cc
	    	]);
    	}
    	else
    	{
    		$banco = Dados_Bancarios::create([
    				'codigo' => $banco_codigo,
    				'agencia' => $banco_agencia,
    				'conta_corrente' => $banco_cc
    		]);
    		User::where('matricula', $matricula)->update(['fk_banco' => $banco->id]);
    	}
    	return redirect('aluno/configurar/banco')->with('status', 'Dados bancários atualizados!');
    }

}
