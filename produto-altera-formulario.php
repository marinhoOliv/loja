<?php include ('include/head.php');
include ('include/conecta.php');
include ('include/banco-categoria.php');
include ('include/banco-produto.php');

$id = $_GET['id'];
$produto = buscaproduto($conexao, $id);
$categorias = listaCategorias ($conexao);
$usado = $produto['usado'] ? "checked='checked'" : "";

?>
<h1>Alterando produto</h1>
	<form action="altera-produto.php" method="post">
		<table class="table">
			<tr>
				<td>
					Nome:	
				</td>
				<td>
					<input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>">	
				</td>
			</tr>
			<tr>
				<td>
					Preço:	
				</td>
				<td>
					<input class="form-control" type="number" name="preco" value="<?=$produto['preco']?>">	
				</td>
			</tr>
			<tr>
				<td>Descrição</td>
				<td><textarea name="descricao" id="" cols="30" rows="5" class="form-control"><?=$produto['descricao']?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="checkbox" name="usado" <?=$usado?> value="true" />Usado</td>
			</tr>
			<tr>
				<td>Categoria</td>
				<td>
					<select name="categoria_id" class="form-control">
						<?php foreach ($categorias as $categoria) :?>
							<option value="<?=$categoria['id']?>">
								<?=$categoria['nome']?>
							</option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input class="btn btn-primary" type="submit" value="Alterar">
				</td>
			</tr>
		</table>
	</form>
<?php include ('include/footer.php') ?>