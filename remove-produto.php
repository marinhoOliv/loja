<?php 
include ('include/head.php');
include ('include/conecta.php');
include ('include/banco-produto.php');


$id = $_POST['id'];
	removeProduto($conexao, $id);
	$_SESSION["success"] = "Produto removido com sucesso";
	header("location: produto-lista.php");
	die();
?>