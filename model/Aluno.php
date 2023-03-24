<?php 
require_once './persistence/Banco.php';

function cadastrarAluno($matricola_alu,$cod_tur,$cod_cur,$rg_alu,$cpf_alu,$nome_alu,$nasc_alu,$telefone_alu,$endereco_alu){
	$banco=new Banco();
		$sql="insert into aluno values($matricola_alu,$cod_tur,$cod_cur,$rg_alu,$cpf_alu,'$nome_alu','$nasci_alu','$telefone_alu','$endereco_alu')";
	$resposta=$banco->executar($sql);
	if (!$resposta) {
		return false;
	}else{
		return true;
	}
}
function retornUltimaAluno()
{
	$banco=new Banco();
	$sql="select max(matricola_alu) from aluno";
	$consulta=$banco->consultar($sql);
	if (!$consulta) {
		return false;
	}else{
		while ($linha=$consulta->fetch_assoc()) {
			$codigo=$linha['max(matricola_alu)'];
		}
		return $codigo;
	}
}
function listarAluno($inicio,$fim)
	{
		$banco=new Banco();
		$sql="select * from aluno
		where matricola_alu>=$inicio and matricola_alu<=$fim
		 order by matricola_alu";
		$consulta=$banco->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			return $consulta;
		}
	}
	?>