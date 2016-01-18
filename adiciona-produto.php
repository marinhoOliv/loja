<?php 
require_once ('include/head.php');
require_once ('include/banco-produto.php');
require_once ('class/produto.php');
require_once ('class/categoria.php');

verificaUsuario();

$produto = new Produto;
$categoria = new Categoria;

$produto->nome = $_POST["nome"];
$produto->setPreco($_POST["preco"]);
$produto->descricao = $_POST["descricao"];
$categoria->id = $_POST['categoria_id'];
$produto->categoria = $categoria;

if (array_key_exists('usado', $_POST)) {
	$usado = 'true';
} else {
	$usado = 'false';
}

$produto->usado = $usado;

if(insereproduto($conexao, $produto)) { 
	echo "<p class='text-success'>Produto "; echo $produto->nome . ", ". $produto->getPreco(); echo " adicionado com sucesso!</p>";
?>

<?php 
	} else { 
		$msg = mysqli_error($conexao);
?>

<p class="text-danger">Produto <?= $produto->nome ?> não foi adicionado: <?= $msg ?></p>

<?php 
	}
?>

<?php include ('include/footer.php') ?>