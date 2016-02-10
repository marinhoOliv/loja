<?php
require_once ('include/conecta.php');
require_once ('class/produto.php');
require_once ('class/categoria.php');

function realScape($conexao, $dados) {
	$retorno = array();
	foreach ($dados as $value) {
		$retorno[] = mysqli_real_escape_string($conexao, $value);
	}
	return $retorno;
}

function insereProduto($conexao, Produto $produto) {
	$dadosScape = array($produto->getNome(), $produto->getPreco(), $produto->getDescricao());
	$escapado = realScape($conexao, $dadosScape);
	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$escapado[0]}', {$escapado[1]}, '{$escapado[2]}', {$produto->getCategoria()->getId()}, {$produto->setUsado})";
	return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, Produto $produto) {
	$dadosScape = array($produto->getNome(), $produto->getPreco(), $produto->getDescricao());
	$escapado = realScape($conexao, $dadosScape);
	$query = "update produtos set nome='{$escapado[0]}', preco = {$escapado[1]}, descricao = '{$escapado[2]}', categoria_id = '{$produto->getCategoria()->getId()}', usado = {$produto->isUsado()} where id = '{$produto->getId()}'";
	return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, Produto $produto) {
	$query = "select * from produtos where id = {$produto->getId()}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function listaProdutos($conexao)
{
	$produtos = array();
	$query = "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id";
	$resultado = mysqli_query($conexao, $query);
	while($produto_atual = mysqli_fetch_assoc($resultado)) {
		$produto = new Produto;
		$categoria = new Categoria;
		$categoria->getNome($produto_atual['categoria_nome']);
		$produto->setId($produto_atual['id']);
		$produto->setNome($produto_atual['nome']);
		$produto->setPreco($produto_atual['preco']);
		$produto->setDescricao($produto_atual['descricao']);
		$produto->setCategoria($categoria);
		$produto->setUsado($produto_atual['usado']);

		array_push($produtos, $produto);
	}
	return $produtos;
}

function removeProduto($conexao, Produto $produto) {
	$query = "delete from produtos where id = {$produto->getId()}";
	return mysqli_query($conexao, $query);
}
