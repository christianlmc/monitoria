<?php 
namespace App;

abstract class EnumStatusMonitoria{
	const pendente = 1;
	const pre_selecionado = 2;
	const deferido = 3;
	const indeferido = 4;
	const aceito_sigra = 5;
	const recusado_sigra = 6;
	const registrado_outra = 7;

}