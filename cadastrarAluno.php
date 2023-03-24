<?php require_once 'cabecalho.php'; ?>
<form action="cadastrarAluno.php" method="POST">  
	<h1>Cadastro de Alunos</h1>
	<span> &#10024; </span>

	<?php
	require_once 'model/Turma.php';
	require_once 'model/Curso.php';

	$consulta=retornUltimoCodigo();
	if (!$consulta) {
		echo "<h2>Cadastre um curso primeiro!</h2>";
	}else{
		$consulta=retornUltimaTurma();
		if (!$consulta) {//não tem turma
			echo "<h2>Cadastre uma tuma primeiro!</h2>";
		}else{//tem turma
			echo "Curso: <select name='curso' required>";
			$cursos=listarNomeCurso();
			while ($linha=$cursos->fetch_assoc()) {
				echo "<option value='".$linha['nome_cur']."'>";
				echo $linha['nome_cur'];
				echo "</option>";
			}
			echo "</select>";
			echo "<h3><input type='submit' onclick='mostra()' value='Escolher'></h3>";
		}
	}
	?>
</form>
<span id="mensagem"></span>
<?php
	if (isset($_POST['curso'])) {
		$curso=$_POST['curso'];
		echo "<form action='cadastrarAluno.php' method='POST'>";
		echo "<p>Nome:<input type='text' name='nome' size='40' maxlength='75' required></p>";
		echo "<input type='hidden' name='cursocod' value='".cursoParaCod($curso)."'>";
		$turmas=retornaTurmasCurso(cursoParaCod($curso));
		if (!$turmas) {
			echo "<h2>Não há turmas para este curso.Cadastre-as primeiro!</h2>"; 
		}else{
		while($linha=$turmas->fetch_assoc()){
			echo "<input type='radio' id='radio' name='turma' value='".$linha['cod_tur']."'><span id='botao'>".$linha['cod_tur']."</span>";
		}
			echo "<p>RG:<input type='number' name='rg' required></p>";
			echo "<p>CPF:<input type='number' name='cpf' required></p>";
			echo "<p>Data Nascmento:<input type='date' name='nasc' max='23/03/12' required></p>";
			echo "<p>Telefone:<input type='text' name='tel' placeholder='(42)99999-9999' required></p>";
			echo "<p>Endereço:<input type='text' name='endereco' required></p>";
			echo "<p><input type='submit' onclick='mostra()' class='enviar' value='Cadastrar'></p>";
		}
			echo "</form>";
	}
	?>
	<span id='mensagem'></span>
	<?php

	if (isset($_POST['nome'])) {
		$nome=$_POST['nome'];
		$cod_cur=$_POST['cursocod'];
		$rg=$_POST['rg'];
		$cpf=$_POST['cpf'];
		$cod_tur=$_POST['turma'];
		$nasci=$_POST['nasc'];
		$telefone=$_POST['tel'];
		$endereco=$_POST['endereco'];
		require_once 'model/Aluno.php';
		$matricula=retornUltimaAluno();
		if (!$matricula) {
			echo "<h2>Erro ao encontrar matriculas</h2>";
		}else{
			$matricula++;
			$resposta=cadastrarAluno($matricula,$cod_tur,$cod_cur,$rg,$cpf,$nome,$nasci,$telefone,$endereco);
		if (!$resposta) {
			echo "<h2>Erro na atentativa de cadastrado!</h2>";
		}else{
			echo "<h2>Aluno cadastrado com sucesso!</h2>";
		}
	}
}

	?>
	<script src="js/mensagem.js"></script>
</body>
</html>
