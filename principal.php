<?php require_once 'cabecalho.php';
require_once 'model/Usuario.php';

$estalog=estaLogado(); 
	if (!$estalog) {//se falso
		echo "<h2>Você não esta logado, favor logar!</h2>";
		echo"<a href='//localhost/leoncides/sistemaescola'>Voltar</a>";
	}else{
		//está logado
?>




<div id="topo">
	<div id="logo">		
	
	<img src="img/logo.png"></div>
<div id="menu">
	<ul class="nav">
		<li>Cadastrar
			<ol>
				<li><a href="cadastrarCurso.php" onclick='mostra()' target="quadro">Curso</a></li>
				<li><a href="cadastrarTurma.php" onclick='mostra()' target="quadro">Turma</a></li>
				<li><a href="cadastrarAluno.php" onclick='mostra()' target="quadro">Aluno</a></li>
			</ol>
		</li>
			<li>Listar
			<ol>
				<li><a href="listarCurso.php" target="quadro">Curso</a></li>
				<li><a href="listarTurma.php" onclick='mostra()' target="quadro">Turma</a></li>
				<li><a href="listarAluno.php" onclick='mostra()' target="quadro">Aluno</a></li>
			</ol>
		</li>
			<li>Buscar
				<ol>
					<li><a href="buscar.php" target="quadro">Dados</a></li>
				</ol>
				<li>Sair
				<ol>
					<li><a href="sair.php" target="quadro">Logoff</a></li>
				</ol>
			</li>
		</li>
	</ul>
</div>
</div>
<div id="principal">
	<span id='mensagem'></span>
	<iframe src="home.php" name="quadro" onload="esconde()"></iframe>
</div>
<div id="rodape">
	<div id="endereco">
		<p>Rua xX de Y,1228</p>
		<p>CEP 84053-3434</p>
		<p>Tel:(42)3232-3434</p>
		<p>Ponta Grossa-PR</p>
	</div>
	<div id="sobre">
		<p>Página desenvolvida no curso de desnvolvimento do SENAC</p>
	</div>
</div>
<?php
}
?>
<script src="js/mensagem.js"></script>
</body>
</html>