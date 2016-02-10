<tr>
	<td>
		Nome:	
	</td>
	<td>
		<input class="form-control" type="text" name="nome" value="<?php if(isset($produto)) echo $produto->getNome(); else echo ""; ?>">
	</td>
</tr>
<tr>
	<td>
		Preço:	
	</td>
	<td>
		<input class="form-control" type="number" name="preco" value="<?php if(isset($produto)) echo $produto->getPreco(); else echo ""; ?>">	
	</td>
</tr>
<tr>
	<td>Descrição</td>
	<td><textarea name="descricao" id="" cols="30" rows="5" class="form-control"><?php if(isset($produto)) echo $produto->getDescricao(); else echo ""; ?></textarea></td>
</tr>
<tr>
	<td></td>
	<td><input type="checkbox" name="usado" <?php if(isset($produto)) echo $produto->isUsado(); else echo '' ?> value="true" />Usado</td>
</tr>
<tr>
	<td>Categoria</td>
	<td>
		<select name="categoria_id" class="form-control">
			<?php foreach ($categorias as $categoria) :
			    $essaEhaCategoria = $produto->getCategoria()->getId() == $categoria->getId();
			    $selecao = $essaEhaCategoria ? "selected='selected'" : "";
			?>
				<option value="<?=$categoria->getId()?>" <?=$selecao?>>
					<?=$categoria->getNome()?>
				</option>
			<?php endforeach ?>
		</select>
	</td>
</tr>