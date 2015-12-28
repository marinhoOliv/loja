<?php require_once ('include/head.php');
require_once ('include/banco-categoria.php');
require_once ('include/banco-produto.php');

$id = $_GET['id'];
$produto = buscaproduto($conexao, $id);
$categorias = listaCategorias ($conexao);
$usado = $produto['usado'] ? "checked='checked'" : "";

?>
<h1>Alterando produto</h1>
	<form action="altera-produto.php" method="post">
	    <input type="hidden" name="id" value="<?=$produto['id']?>"/>
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