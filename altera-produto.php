<?php 
include ('include/head.php');
include ('include/conecta.php');
include ('include/banco-produto.php');

$id = $_POST['id'];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST['categoria_id'];
if (array_key_exists('usado', $_POST)) {
	$usado = 'true';
} else {
	$usado = 'false';
}

if(alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) { 

echo "<p class='text-success'>Produto "; echo $nome . ", ". $preco; echo " foi alterado!</p>";
?>

<?php 
	} else { 
		$msg = mysqli_error($conexao);
?>

<p class="text-danger">Produto <?= $nome ?> não foi alterado: <?= $msg ?></p>

<?php 
	}
?>

<?php include ('include/footer.php') ?>