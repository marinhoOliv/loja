<?php
include ("include/conecta.php");
include ("include/banco-usuario.php");
include ('include/logica-usuario.php');

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
	if($usuario == null) {
		header("location: index.php?login=0");
	} else {
		logaUsuario($usuario["email"]);
		header("location: index.php?login=1");
	}
die;