<?php  
require_once './persistence/Banco.php';
function cadastrarCurso($cod_cur,$nome_cur,$periodos_cur,$mensalidade_cur,$turno_cur)
{
	$banco=new Banco();
	$sql="insert into curso values($cod_cur,'$nome_cur',$periodos_cur,$mensalidade_cur,'$turno_cur')";
	$resp=$banco->executar($sql);
	if ($resp) {
		return true;
	}else{
		return false;
	}
}
	function retornUltimoCodigo(){
		$banco=new Banco();
		$sql="select max(cod_cur) from curso";
		$consulta=$banco->consultar($sql);
		if (!$consulta) {//se false ou falso
			return false;
		}else{
			while($linha=$consulta->fetch_assoc()){
				$ultimo=$linha['max(cod_cur)'];
			}
			return $ultimo;
		}
	}
	function listarCurso(){
		$banco=new Banco();
		$sql="select * from curso order by cod_cur";
		$consulta=$banco->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			return $consulta;
		}
	}
	function cursoParaCod($nome){
		$banco=new Banco();
		$sql="select cod_cur from curso where nome_cur='$nome'";
		$consulta=$banco->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			while ($linha=$consulta->fetch_assoc()) {
				$codigo=$linha['cod_cur'];
			}
			return $codigo;
		}
	}
	function codigoParaNome($codigo){
		$banco=new Banco();
		$sql="select nome_cur from curso where cod_cur=$codigo";
		$consulta=$banco->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			while ($linha=$consulta->fetch_assoc()) {
				$nome=$linha['nome_cur'];
			}
			return $nome;
		}
	}

	function listarNomeCurso(){
		$banco=new Banco();
		$sql="select nome_cur from curso";
		$consulta=$banco->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			return $consulta;
		}
	}

	function buscarCurso($busca){
		$banco=new Banco();
		$sql="select * from curso where cod_cur='$busca' or nome_cur like '%$busca%' or mensalidade_cur='$busca' or periodos_cur='$busca' or turno_cur like '%$busca%'";
		$consulta=$banco->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			return $consulta;
		}
	}
 ?>