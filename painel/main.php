<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Painel de controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH;?>css/all.css" rel="stylesheet">
</head>
<body>
<div class="menu">
	<div class="menu-wrapper">
	<div class="box-usuario">
		<?php if($_SESSION['img']==''){?>
		<div class="avatar-usuario"></div>
		<div class="nome-usuario">
			<p><?php echo $_SESSION['nome'];?></p>
			<p><?php echo pegaCargo($_SESSION['cargo']);?></p>
		</div>
	<?php }else{?>
		<div class="imagem-usuario">
			<img src="<?php echo INCLUDE_PATH_PAINEL?>/uploads/<?php echo $_SESSION['img'];?>">
		</div>
		<div class="nome-usuario">
			<p><?php echo $_SESSION['nome'];?></p>
			<p><?php echo pegaCargo($_SESSION['cargo']);?></p>
		</div>
	<?php } ?>
	</div>
	<div class="itens-menu">
		<h2>Cadastro</h2>
		<a href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-depoimento">Cadastrar depoimento</a>
		<a <?php selecionadoMenu('cadastrar-servico');?> href="">Cadastrar serviço</a>
		<a <?php selecionadoMenu('cadastrar-slides');?> href="">Cadastrar slides</a>
		<h2>Gestão</h2>
		<a <?php selecionadoMenu('listar-depoimento');?> href="">Listar depoimento</a>
		<a <?php selecionadoMenu('listar-servico');?> href="">listar serviço</a>
		<a <?php selecionadoMenu('listar-slides');?> href="">listar slides</a>
		<h2>Administração painel</h2>
		<a <?php selecionadoMenu('editar-usuarios');?> href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuarios">Editar usuário</a>
		<a <?php selecionadoMenu('adicionar-usuario');?><?php verificarPermissaoMenu(2);?> href="<?php echo INCLUDE_PATH_PAINEL?>adicionar-usuario	">Adicionar usuário</a>
		<h2>Configuração Geral</h2>
		<a <?php selecionadoMenu('editar-site');?> href="">Editar-site</a>
	</div>
	</div>
</div>
<header>
	<div class="center">
		<div class="menu-btn">
			<p>Menu</p>
		</div>
		<div class="btn-home">
			<p>Inicio</p>
		</div>
		<div class="loggout">
			<a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout">Sair<i class="fa fa-sign-out" aria-hidden="true"></i></a>
		</div>
		<div class="clear"></div>
	</div>
</header>
<div class="content">
	<?php Painel::carregarPagina();?>
<div class="clear"></div>
</div>
<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
</body>
</html>