<?php 
require_once ('include/head.php');
require_once ('include/banco-produto.php');
require_once ('class/produto.php');

$produto = new Produto;

$produto->id = $_POST['id'];
	removeProduto($conexao, $produto);
	$_SESSION["success"] = "Produto removido com sucesso";
	header("location: produto-lista.php");
	die();
?>