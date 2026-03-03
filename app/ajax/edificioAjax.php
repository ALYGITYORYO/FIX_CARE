<?php
	
	require_once "../../config/app.php";
	require_once "../views/inc/session_start.php";
	require_once "../../autoload.php";
	
	use app\controllers\edificioController;

	if(isset($_POST['modulo_edificio'])){

		$insEdificio = new edificioController();

		if($_POST['modulo_edificio']=="listar"){
			echo $insEdificio->GetEdificioControlador();
		}

		if($_POST['modulo_edificio']=="registrar"){
			echo $insEdificio->registrarEdificioControlador();
		}
		
	}else{
		session_destroy();
		header("Location: ".APP_URL."login/");
	}