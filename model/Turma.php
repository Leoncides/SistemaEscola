<?php
require_once './persistence/Banco.php';
function cadastrarTurma($cod_tur,$cod_cur,$sala_tur)
{
	$banco=new Banco();
	$sql="insert into turma values($cod_tur,$cod_cur,$sala_tur)";
	$resposta=$banco->executar($sql);
	if (!$resposta) {
		return false;
	}else{
		return true;
	}
}
function retornUltimaTurma()
{
	$banco=new Banco();
	$sql="select max(cod_tur) from turma";
	$consulta=$banco->consultar($sql);
	if (!$consulta) {
		return false;
	}else{
		while ($linha=$consulta->fetch_assoc()) {
			$codigo=$linha['max(cod_tur)'];
		}
		return $codigo;
	}
}
	function listarTurma($inicio,$fim)
	{
		$banco=new Banco();
		$sql="select * from turma 
		where cod_tur>=$inicio and cod_tur<=$fim
		order by cod_tur";
		$consulta=$banco->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			return $consulta;
		}
	}
	function retornaTurmasCurso($cod_cur){
	
		$banco=new Banco();
		$sql="select cod_tur from turma where cod_cur=$cod_cur";
		$consulta=$banco->consultar($sql);
			if (!$consulta) {
			return false;
		}else{
			return $consulta;
		}
	}
	?>
