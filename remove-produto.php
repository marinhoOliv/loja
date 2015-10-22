<?php 
include ('include/head.php');
include ('include/conecta.php');
include ('include/banco-produto.php');

$id = $_POST['id'];
	removeProduto($conexao, $id);
	header("location: produto-lista.php?removido=true");
	die();
?>