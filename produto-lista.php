<?php 	
require_once ('include/head.php');
require_once ('include/banco-produto.php');
require_once ('class/produto.php');
verificaUsuario();
?>

<table class="table table-striped table-bordered">
	<?php
		$produtos = listaProdutos($conexao);
		foreach ($produtos as $produto) :
	?>
	<tr>
		<td><?= $produto->nome ?></td>
		<td><?= $produto->getPreco() ?></td>
		<td><?= $produto->valorComDesconto() ?></td>
		<td><?= substr($produto->descricao, 0, 40)?></td>
		<td><?=$produto->categoria->nome?></td>
		<td><a href="produto-altera-formulario.php?id=<?=$produto->id?>" class="btn btn-primary btn-sm">alterar</a></td>
		<td>
			<form action="remove-produto.php" method="post">
				<input type="hidden" name="id" value="<?=$produto->id?>"/>
				<button class="btn btn-danger btn-sm">Remover</button>
			</form>
		</td>
	</tr>
	<?php
		endforeach
	?>
</table>

<?php include ('include/footer.php') ?>