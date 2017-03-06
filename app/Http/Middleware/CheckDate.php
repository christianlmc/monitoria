<?php

namespace App\Http\Middleware;

use Closure;
use App\Periodo;
use Carbon\Carbon;

class CheckDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd($request);
        $hoje = Carbon::now(-2);
        $periodos = Periodo::get();
    


        $inscri_inicio = Carbon::createFromFormat('Y-m-d H:i:s', $periodos[0]->inicio);
        $inscri_fim = Carbon::createFromFormat('Y-m-d H:i:s', $periodos[0]->fim);

        $aval_inicio = Carbon::createFromFormat('Y-m-d H:i:s', $periodos[1]->inicio);
        $aval_fim = Carbon::createFromFormat('Y-m-d H:i:s', $periodos[1]->fim);


        

        if($request->getPathInfo() == '/aluno/inscricao'){            
            if($hoje->between($inscri_inicio,$inscri_fim))
                return $next($request);
            else
            {
                $inscri_inicio = $inscri_inicio->format("d/m/Y \a\s H:i:s ");
                $inscri_fim = $inscri_fim->format("d/m/Y \a\s H:i:s ");
        
                return redirect('periodo')->with('status', "O periodo de inscrição é de $inscri_inicio até $inscri_fim");
            }
        }
        elseif ($request->getPathInfo() == '/professor/turmas/selecaoturmas'){
        	if($hoje->between($aval_inicio,$aval_fim))
        		return $next($request);
        	else
            {
                $aval_inicio = $aval_inicio->format("d/m/Y \a\s H:i:s ");
                $aval_fim = $aval_fim->format("d/m/Y \a\s H:i:s ");
        		return redirect('periodo')->with('status', "O periodo de avaliação é de $aval_inicio até $aval_fim");
            }
        }
        
        return $next($request);
    }
}
