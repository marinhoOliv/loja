<?php
require_once ('include/head.php');
?>

<h1>Bem vindo!</h1>

<?php if(usuarioEstaLogado()) {?>
	<p class="text-success">Você está logado como <?= usuarioLogado() ?> <a href="logout.php">Deslogar</a></p>
<?php } else {?>

<h2>login</h2>
<form action="login.php" method="post">
	<table class="table">
		<tr>
			<td>Email</td>
			<td><input type="email" name="email" class="form-control"></td>
		</tr>
		<tr>
			<td>Senha</td>
			<td><input type="password" name="senha" class="form-control"></td>
		</tr>
		<tr>
			<td><button type="submit" class="btn btn-primary">Login</button></td>
		</tr>
	</table>
</form>
<?php } ?>

<?php require_once ('include/footer.php') ?>