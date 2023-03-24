<?php require_once 'cabecalho.php';
require_once 'model/Aluno.php';


if (isset($_GET['fim'])) {
	$inicio=$_GET['fim'];
	$inicio++;
	$fim=$inicio+4;
}else{
	$inicio=1;
	$fim=5;
}
$num_linhas=retornUltimaAluno();
if ($num_linhas<1) {
	echo "<h2>Não há alunos cadastrados!</h2>";
}else{
	echo "<table>";
	echo "<tr>";
	echo "<th>Matricola</th>";
	echo "<th>Turma n&ordm;</th>";
	echo "<th>Curso</th>";
	echo "<th>RG</th>";
	echo "<th>CPF</th>";
	echo "<th>Nome</th>";
	echo "<th>Nascimento</th>";
	echo "<th>Telefone</th>";
	echo "<th>Endereço</th>";
	echo "</tr>";



	$consulta=listarAluno($inicio,$fim);
	require_once 'model/Curso.php';
	while($linha=$consulta->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$linha['matricola_alu']."</td>";
		echo "<td>".$linha['cod_tur']."</td>";
		echo "<td>".codigoParaNome($linha['cod_cur'])."</td>";
		echo "<td>".$linha['rg_alu']."</td>";
		echo "<td>".$linha['cpf_alu']."</td>";
		echo "<td>".$linha['name_alu']."</td>";
		$dia=substr($linha['nasc_alu'],8);
		$mes=substr($linha['nasc_alu'],5,2);
		$ano=substr($linha['nasc_alu'],0,4);
		echo "<td>$dia/$mes/$ano</td>";
		echo "<td>".$linha['telefone_alu']."</td>";
		echo "<td>".$linha['endereco_alu']."</td>";
		echo "</tr>";
		
	}
	echo "</table>";
	?>
	<span id='mensagem'></span>
	<?php
	if ($fim<$num_linhas) {
		echo "<form id='prox' action='listarAluno.php' method='GET'>";
		echo "<input type='hidden' value='$fim' name='fim'>";
		echo "<p><input type='submit' onclick='mostra()' value='Proxima'></p>";
		echo "</form>";
	}
}
?>
<script src="js/mensagem.js"></script>
</body>
</html>