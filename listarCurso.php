<?php require_once 'cabecalho.php'; ?>

<?php
require_once 'model/Curso.php';

$consulta=listarCurso();
if (!$consulta) {//voltou falce
	echo "<h2>Nenhum curso cadastrado!</h2>";
}else{//tem curso
	echo "<table>";
	echo "<tr>";
	echo "<th>Código</th>";
	echo "<th>Nome</th>";
	echo "<th>n&ordm; Periodos</th>";
	echo "<th>Mensalidade R$</th>";
	echo "<th>Turno</th>";
	echo "</tr>";

	while ($linha=$consulta->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$linha['cod_cur']."</td>";
		echo "<td>".$linha['nome_cur']."</td>";
		echo "<td>".$linha['periodos_cur']."</td>";
		echo "<td>".$linha['mensalidade_cur']."</td>";
		echo "<td>".$linha['turno_cur']."</td>";
		echo "</tr>";
	}
}
?>
</body>
</html>