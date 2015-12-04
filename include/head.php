<!DOCTYPE html>
<?php 
error_reporting(E_ALL ^ E_NOTICE);
include ('include/logica-usuario.php');
include ('include/mostra-alerta.php');
?>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/loja.css" >
	<title>Loja</title>
</head>
<body>
	<header class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Minha Loja</a>
			</div>
			<nav>
				<ul class="nav navbar-nav">
					<li><a href="sobre.php">Sobre</a></li>
					<li><a href="produto-formulario.php">Adiciona Produto</a></li>
					<li><a href="produto-lista.php">Produtos</a></li>
				</ul>
			</nav>
			<?php if(usuarioEstaLogado()) {?>
				<nav>
					<ul class="nav navbar-nav navbar-right">
						<!--li><a href="javascript:void(0);" class=""><i class="glyphicon glyphicon-edit marg-right5"></i>Configuracoes</a></li-->
						<li><a href="logout.php" class=""><i class="glyphicon glyphicon-log-out marg-right5"></i>Sair</a></li>
					</ul>
				</nav>
			<?php } ?>
		</div>
	</header>
	<section class="container container-fluid">
		<div class="principal">
		<?php 
		mostraAlerta("success");
		mostraAlerta("danger");
		?>