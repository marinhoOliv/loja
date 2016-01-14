<?php require_once ('include/head.php');
require_once ('include/banco-categoria.php');
require_once ('include/banco-produto.php');
require_once ('class/produto.php');

$produto = new Produto;
$categoria = new Categoria;

$produto->id = $_GET['id'];
$buscaProduto = buscaproduto($conexao, $produto);
$produto->nome = $buscaProduto['nome'];
$produto->preco = $buscaProduto['preco'];
$produto->descricao = $buscaProduto['descricao'];
$categorias = listaCategorias ($conexao);
$produto->usado = $buscaProduto['usado']  ? "checked='checked'" : "";
$categoria->id = $buscaProduto['categoria_id'];
$produto->categoria = $categoria;

?>
<h1>Alterando produto</h1>
	<form action="altera-produto.php" method="post">
	    <input type="hidden" name="id" value="<?=$produto->id?>"/>
		<table class="table">
			<?php include ('include/produto-formulario-base.php'); ?>
			<tr>
				<td>
					<input class="btn btn-primary" type="submit" value="Alterar">
				</td>
			</tr>
		</table>
	</form>
<?php include ('include/footer.php') ?>