<?php 
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailer-master/src/PHPMailer.php');
			require_once('classes/phpmailer/PHPMailer-master/src/SMTP.php');
			require_once('classes/phpmailer/PHPMailer-master/src/Exception.php');

		}
		include('classes/'.$class.'.php');
	};
	spl_autoload_register($autoload);

	define('INCLUDE_PATH','http://localhost/trabalho/3-site Cauê/');
	define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');

	define('BASE_DIR_PAINEL',__dir__.'/painel');


	define('NOME_EMPRESA','UVN Network');

	//conectar
	define('HOST','localhost');
	define('USER', 'root');
	define('PASSWORD','');
	define('DATABASE','db_site_caue');

	function pegaCargo($indece){
		return Painel::$cargo[$indece];
	}

	function selecionarMenu($par){
		$url = explode('/', @$_GET['url'])[0];
		if($url == $par){ 
			echo 'class="menu-active"';
		}
	}
	function verificaPermicao($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			 echo 'style="display:none;"';
		}
	}

	function verificaPermicaoPagina($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			include('painel/pages/permicao_negada.php');
		}
	}
?>