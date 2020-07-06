
<!DOCTYPE html>
<html>
<head>
	<title>Painel de controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css">
</head>
<body>
	<div class="box-login">
		<?php
			if(isset($_POST['acao'])){
				$user = $_POST['login'];
				$password = $_POST['password'];
				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user =? AND password =?");
				$sql->execute(array($user,$password));
				if($sql->rowCount()==1){
					$info =$sql->fetch();
					$_SESSION['login'] = true;
					$_SESSION['user'] = $user;
					$_SESSION['password'] = $password;
					$_SESSION['cargo'] = $info['cargo'];
					$_SESSION['nome'] = $info['nome'];
					$_SESSION['img'] = $info['imagem'];
					header('Location:'.INCLUDE_PATH_PAINEL);
					die();
				}else{
					echo '<div class="box-erro">Usuário o senha incorretos</div>';
				}
			}
		

		?>
		<h2>efetue o login</h2>
		<form method="post">
			<input type="text" name="login" required>
			<input type="password" name="password" required>
			<input type="submit" name="acao" value="logar">
		</form>
	</div>
</body>
</html>