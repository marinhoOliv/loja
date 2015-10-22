<?php 
	$nome = $_GET["nome"];
	$preco = $_GET["preco"];
	$mysqli = new mysqli ('localhost', 'root', '', 'loja');
	$query = "insert into produtos (nome, preco) values ('{$nome}', {$preco})";
	$mysqli->query($query);
	$mysqli->close();
?>