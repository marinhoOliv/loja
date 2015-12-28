<?php require_once ('include/head.php');
require_once ('include/banco-categoria.php');

verificaUsuario();

$produto = array("nome" => "", "descricao" => "", "preco" => "", "categoria" => "1");
$usado = "";
$categorias = listaCategorias ($conexao);
?>
<h1>Formulário de produto</h1>
	<form action="adiciona-produto.php" method="post">
		<table class="table">
			<?php include ('include/produto-formulario-base.php'); ?>
			<tr>
				<td>
					<input class="btn btn-primary" type="submit" value="Cadastrar">
				</td>
			</tr>
		</table>
	</form>
<?php include ('include/footer.php') ?>