<?php $usuariosOnline = Painel::listarUsuariosOnline();?>
<?php $pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
	  $pegarVisitasTotais->execute();
	  $pegarVisitasTotais = $pegarVisitasTotais->rowCount(); 

	  $pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia =?");
	  $pegarVisitasHoje->execute(array(date('Y-m-d')));
	  $pegarVisitasHoje = $pegarVisitasHoje->rowCount(); 


?>
<div class="box-content left w100">
	<h2>Painel de controle - Dev jr</h2>
	<div class="box-metricas">
		<div class="box-metricas-single" style="background:orange">
			<div class="box-metricas-wraper" >
				<h2>Usuários online</h2>
				<p><?php echo count($usuariosOnline);?></p>
			</div>
		</div>
		<div class="box-metricas-single"style="background:blue">
			<div class="box-metricas-wraper"  >
				<h2>Total de visitas</h2>
				<p><?php echo $pegarVisitasTotais;?></p>
			</div>
		</div>
		<div class="box-metricas-single" style="background:green">
			<div class="box-metricas-wraper" >
				<h2>Total de visitas hoje</h2>
				<p><?php echo $pegarVisitasHoje;?></p>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
<div class="box-content left w100">
	<h2>Usuarios online </h2>
	<div class="table-responsive">
		<div class="row">
			<div class="col">
				<span>IP</span>
			</div>
			<div class="col">
				<span>Ultima ação</span>
			</div>
			<div class="clear"></div>
		</div>
		<?php foreach ($usuariosOnline as $key => $value) {
			# code...
		?>
		<div class="row">
			<div class="col">
				<span><?php echo $value['ip'];?></span>
			</div>
			<div class="col">
				<span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao']));?></span>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>

	</div>
</div>