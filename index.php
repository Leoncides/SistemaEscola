<?php require_once "cabecalho.php";?>
<form action="index.php" method="POST" class="login">
	<h1>Login</h1>
		<p>Usuário:<input type="text" name="usuario" size="30" maxlength="30" required></p>
		<p>Senha:<input type="password" name="senha" size="10" maxlength="10" required></p>
		<h3><input type="submit" value="Login"></h3>
</form>
<?php
	if(isset($_POST['usuario'])){
		$usuario=$_POST['usuario'];
		$senha=$_POST['senha'];
		require_once 'model/Usuario.php';
		$resposta=login($usuario,$senha);
		if ($resposta) { //if($resposta==true)
			echo "<h2>Login com sucesso!</h2>";
			$teste=criarSessao(true,$usuario);
			echo "<meta http-equiv='refresh' content='2; url=//localhost/leoncides/sistemaescola/principal.php'>";
		}else{
			echo "<h2>Erro na tentativa de login! Redigite</h2>";
		}
	}


?>