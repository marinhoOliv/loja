<?php require_once ('include/head.php');
require_once ('include/banco-categoria.php');
require_once ('include/banco-produto.php');
require_once ('class/produto.php');

$produto = new Produto;
$categoria = new Categoria;

$produto->setId($_GET['id']);
$buscaProduto = buscaproduto($conexao, $produto);
$produto->setNome($buscaProduto['nome']);
$produto->setPreco($buscaProduto['preco']);
$produto->setDescricao($buscaProduto['descricao']);
$categorias = listaCategorias ($conexao);
$produto->setUsado($buscaProduto['usado']  ? "checked='checked'" : "");
$categoria->setId($buscaProduto['categoria_id']);
$produto->setCategoria($categoria);

?>
<h1>Alterando produto</h1>
	<form action="altera-produto.php" method="post">
	    <input type="hidden" name="id" value="<?=$produto->getId()?>"/>
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