<?php require_once 'cabecalho.php'; ?>
<form action="cadastrarCurso.php" method="POST">  
	<h1>Cadastro de Curso</h1>
	<span> &#10024; </span>
	<p>Nome do Curso:<input type="text" name="nome" size="40" maxlength="40" required></p>
	<p>N&ordm; de Periodos: <input type="number" name="periodos" min="1" max="10" required></p>
	<p>Mensalidade R$:<input type="text" name="mensalidade" pattern="[0-9]{1,8}\.[[0-9]{2}" placeholder="999.99" title="Somente números, centavos obrigatorio,ponto e não virgula EX:999.99" required></p>
	<p>Turno:<select name="turno" required>
		<option value="manhã">Manhã</option>
		<option value="tarde">Tarde</option>
		<option value="noite">Noite</option>
	</select></p>
	<p><input type="submit" class="enviar" value="Cadastrar"></p>
</form>
<?php
if (isset($_POST['nome'])) {
	$nome=$_POST['nome'];
	$periodos=$_POST['periodos'];
	$mensalidade=$_POST['mensalidade'];
	$turno=$_POST['turno'];
	require_once 'model/Curso.php';
	$codigo=retornUltimoCodigo();
	if (!$codigo) {
		echo "<h2>Não á curso cadastrado</h2>";
	}else{
		$codigo++;
		$resposta=cadastrarCurso($codigo,$nome,$periodos,$mensalidade,$turno);
		if (!$resposta) {//voltou falce
			echo "<h2>Falha na tentaviva de cadastrado</h2>";
		}else{
			echo "<h2>Cadastrado com sucesso";
		}
	}
}

?>
</body>
</html>