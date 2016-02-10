<?php
require_once ('include/conecta.php');
require_once ('class/categoria.php');

function listaCategorias($conexao) {
	$categorias = array();
	$query = "select * from categorias";
	$resultado = mysqli_query($conexao, $query);
	while ($array = mysqli_fetch_assoc($resultado)) {
		$categoria = new Categoria;
		$categoria->setId($array['id']);
		$categoria->setNome($array['nome']);
		array_push($categorias, $categoria);
	}
	return $categorias;
}
