<?php 
require_once ('include/head.php');
require_once ('include/banco-produto.php');


$id = $_POST['id'];
	removeProduto($conexao, $id);
	$_SESSION["success"] = "Produto removido com sucesso";
	header("location: produto-lista.php");
	die();
?>