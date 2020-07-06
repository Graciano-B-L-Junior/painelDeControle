<div class="box-content">
	<h2>Editar Usuário</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])){
				$usuario = new Usuario();
				$nome =	$_POST['nome'];
				$senha =$_POST['password'];
				$imagem = $_FILES['imagem'];
				$imagem_atual = $_POST['imagem_atual'];

				if($imagem['name']!=''){
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						if($usuario->atualizarUsuario($nome,$senha,$imagem)){
							Painel::alert('sucesso','Cadastro realizado com sucesso!');
							$_SESSION['img']=$imagem;
						}
						else
							Painel::alert('erro','Ocorreu um erro ao cadastrar!');
					}else{
						Painel::alert('erro','Formato da imagem é invalida');
					}
				}else{
					$imagem =$imagem_atual;
					if($usuario->atualizarUsuario($nome,$senha,$imagem)){
						Painel::alert('sucesso','Cadastro realizado com sucesso!');
					}else{
						Painel::alert('erro','Erro ao atualizar');
					}
				}
			}
		?>
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" required value="<?php echo $_SESSION['nome'];?>">
		</div>
		<div class="form-group">
			<label>senha</label>
			<input type="password" name="password" required value="<?php echo $_SESSION['password'];?>">
		</div>
		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem">
			<input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img'];?>">
		</div>
		<div class="form-group">
			<input type="submit" value="Atualizar" name="acao">
		</div>
	</form>
</div>