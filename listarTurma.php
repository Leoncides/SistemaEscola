<?php require_once 'cabecalho.php';
require_once 'model/Turma.php';

if (isset($_GET['fim'])) {
	$inicio=$_GET['fim'];
	$inicio++;
	$fim=$inicio+4;
}else{
	$inicio=1;
	$fim=5;
}

$num_linhas=retornUltimaTurma();
if ($num_linhas<1) {
	echo "<h2>Não á Turmas cadastradas!</h2>";
}else{//tem turma
	echo "<table>";
	echo "<tr>";
	echo "<th>Código</th>";
	echo "<th>Curso</th>";
	echo "<th>N&ordm; Sala</th>";
	echo "</tr>";

$consulta=listarTurma($inicio,$fim);
	require_once 'model/Curso.php';

	while ($linha=$consulta->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$linha['cod_tur']."</td>";
		echo "<td>". codigoParaNome($linha['cod_cur'])."</td>";
		echo "<td>".$linha['sala_tur']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	?>
	<span id='mensagem'></span>
	<?php
	if ($fim<$num_linhas) {
		echo "<form id='prox' action='listarTurma.php' method='GET'>";
		echo "<input type='hidden' value='$fim' name='fim'>";
		echo "<p><input type='submit' onclick='mostra()' value='Proxima'>";
		echo "<?form>";
	}
}
?>
<script src="js/mensagem.js"></script>
</body>
</html>