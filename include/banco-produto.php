<?php
require_once ('include/conecta.php');

function realScape($conexao, $dados) {
	$retorno = array();
	foreach ($dados as $value) {
		$retorno[] = mysqli_real_escape_string($conexao, $value);
	}
	return $retorno;
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {
	$dadosScape = array($nome, $preco, $descricao);
	$escapado = realScape($conexao, $dadosScape);
	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$escapado[0]}', {$escapado[1]}, '{$escapado[2]}', {$categoria_id}, {$usado})";
	return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) {
	$dadosScape = array($nome, $preco, $descricao);
	$escapado = realScape($conexao, $dadosScape);
	$query = "update produtos set nome='{$escapado[0]}', preco = {$escapado[1]}, descricao = '{$escapado[2]}', categoria_id = '{$categoria_id}', usado = {$usado} where id = '{$id}'";
	return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
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
