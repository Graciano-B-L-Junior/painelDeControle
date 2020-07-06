<?php
	verificarPermissaoPagina(2);
?>
<div class="box-content">
	<h2>Adicionar usuário</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])){
				
			}
		?>
		<div class="form-group">
			<label>Login:</label>
			<input type="text" name="nome" required value="">
		</div>
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" required value="">
		</div>
		<div class="form-group">
			<label>senha</label>
			<input type="password" name="password" required value="">
		</div>
		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem">
		</div>
		<div class="form-group">
			<input type="submit" value="Atualizar" name="acao">
		</div>
	</form>
</div>