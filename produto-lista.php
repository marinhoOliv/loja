<?php 	
require_once ('include/head.php');
require_once ('include/banco-produto.php');

verificaUsuario();
?>

<table class="table table-striped table-bordered">
	<?php
		$produtos = listaProdutos($conexao);
		foreach ($produtos as $produto) :
	?>
	<tr>
		<td><?= $produto->getNome() ?></td>
		<td><?= $produto->getPreco() ?></td>
		<td><?= $produto->valorComDesconto() ?></td>
		<td><?= substr($produto->getDescricao(), 0, 40)?></td>
		<td><?= $produto->getCategoria()->getNome() ?></td>
		<td><a href="produto-altera-formulario.php?id=<?=$produto->getId() ?>" class="btn btn-primary btn-sm">alterar</a></td>
		<td>
			<form action="remove-produto.php" method="post">
				<input type="hidden" name="id" value="<?=$produto->getId() ?>"/>
				<button class="btn btn-danger btn-sm">Remover</button>
			</form>
		</td>
	</tr>
	<?php
		endforeach
	?>
</table>

<?php include ('include/footer.php') ?>