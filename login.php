<?php
include ("include/conecta.php");
include ("include/banco-usuario.php");

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
	if($usuario == null) {
		header("location: index.php?login=0");
	} else {
		setcookie("usuario_logado", $usuario["email"], time() + 60);
		header("location: index.php?login=1");
	}
die;