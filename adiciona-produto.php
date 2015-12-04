<?php 
include ('include/head.php');
include ('include/conecta.php');
include ('include/banco-produto.php');

verificaUsuario();

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST['categoria_id'];
if (array_key_exists('usado', $_POST)) {
	$usado = 'true';
} else {
	$usado = 'false';
}

if(insereproduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) { 

echo "<p class='text-success'>Produto "; echo $nome . ", ". $preco; echo " adicionado com sucesso!</p>";
?>

<?php 
	} else { 
		$msg = mysqli_error($conexao);
?>

<p class="text-danger">Produto <?= $nome ?> não foi adicionado: <?= $msg ?></p>

<?php 
	}
?>

<?php include ('include/footer.php') ?>