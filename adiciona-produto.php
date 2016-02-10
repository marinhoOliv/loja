<?php 
require_once ('include/head.php');
require_once ('include/banco-produto.php');
require_once ('class/produto.php');
require_once ('class/categoria.php');

verificaUsuario();

$produto = new Produto;
$categoria = new Categoria;

$produto->setNome($_POST["nome"]);
$produto->setPreco($_POST["preco"]);
$produto->setDescricao($_POST["descricao"]);
$categoria->setId($_POST['categoria_id']);
$produto->setCategoria($categoria);

if (array_key_exists('usado', $_POST)) {
	$usado = 'true';
} else {
	$usado = 'false';
}

$produto->isUsado() = $usado;

if(insereproduto($conexao, $produto)) { 
	echo "<p class='text-success'>Produto "; echo $produto->setNome() . ", ". $produto->setPreco($preco); echo " adicionado com sucesso!</p>";
?>

<?php 
	} else { 
		$msg = mysqli_error($conexao);
?>

<p class="text-danger">Produto <?= $produto->setNome() ?> não foi adicionado: <?= $msg ?></p>

<?php 
	}
?>

<?php include ('include/footer.php') ?>