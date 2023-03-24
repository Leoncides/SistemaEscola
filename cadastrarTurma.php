<?php require_once 'cabecalho.php';?>
<form action="cadastrarTurma.php" method="POST">
	<h1>Cadastro de turmas</h1>
	<?php
	require_once 'model/Turma.php';
	require_once 'model/Curso.php';

	$consulta=retornUltimoCodigo();
	if (!$consulta) {//não tem curso
		echo "<h2>cadastre curssos primeiro</h2>";
	}else{//tem curso
		echo "<p>Curso:<select name='curso' require>";
		$consulta=listarNomeCurso();
		while ($linha=$consulta->fetch_assoc()) {
			echo "<option value='".$linha['nome_cur']."'>";
			echo $linha['nome_cur'];
			echo "</option>";
		}
		echo "</select></p>";
	?>
	<p>N&ordm; da Sala:<input type="number" name="sala" min="1" max="50" required></p>
	<h3><input type="submit" onclick="mostra()" value="Cadastrar"></h3>
	<?php
	}
	?>
</form>
<span id="mensagem"></span>
<?php
	if (isset($_POST['curso'])) {
		$curso=$_POST['curso'];
		$sala=$_POST['sala'];
		$cod_tur=retornUltimaTurma();
		$cod_tur++;
		if (!$cod_tur) {
			echo "<h2>Turma não encontrada!</h2>";
		}else{
			$cod_cur=cursoParaCod($curso);
			if (!$cod_cur) {
				echo "<h2>Curso não encontrado!</h2>";
			}else{
				$resposta=cadastrarTurma($cod_tur,$cod_cur,$sala);
				if (!$resposta) {
					echo "<h2>Ero na tentativa de cadastrado!</h2>";
				}else{
					echo"<h2>Cadastrado com sucesso!</h2>";				
				}
			}
		}
	}
	?>
<script src="js/mensagem.js"></script>
</body>
</html>