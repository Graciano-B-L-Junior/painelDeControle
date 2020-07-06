<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	define('INCLUDE_PATH', 'http://localhost/pj_01/');

	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	define('HOST', 'localhost');
	define('DATABASE', 'projeto_01');
	define('USER', 'root');
	define('PASSWORD', '');
	define('BASE_DIR_PAINEL',__DIR__.'/painel');

	
	$autoload = function ($class){
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	function pegaCargo($cargo){
		$arr =['0'=>'Normal','1'=>'Sub Administrador','2'=>'Administrador'];
		return $arr[$cargo];
	}

	function selecionadoMenu($par){
		$url = explode('/',@$_GET['url'])[0];
		if($url == $par){
			echo 'class="menu-active"';
		}
	}

	function verificarPermissaoMenu($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			echo 'style=display:none;';
		}
	}
	function verificarPermissaoPagina($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			include('painel/pages/permissao_negada.php');
			die();
		}
	}
?>