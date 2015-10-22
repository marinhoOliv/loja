<?php

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {
	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
	return mysqli_query($conexao, $query);
}

function listaProdutos($conexao)
{
	$produtos = array();
	$query = "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id";
	$resultado = mysqli_query($conexao, $query);
	while($produto = mysqli_fetch_assoc($resultado)) {
		array_push($produtos, $produto);
	}
	return $produtos;
}

function removeProduto($conexao, $id) {
	$query = "delete from produtos where id = {$id}";
	return mysqli_query($conexao, $query);
}
