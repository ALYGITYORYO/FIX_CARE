<?php
	
	require_once "../../config/app.php";
	require_once "../views/inc/session_start.php";
	require_once "../../autoload.php";
	
	use app\controllers\userController;
	if(isset($_POST['modulo_organizacion'])){
		$insOrganizacion = new organizacionController();
		if($_POST['modulo_organizacion']=="registrar"){
			echo $insOrganizacion->registrarOrganizacionControlador();
		}

		if($_POST['modulo_organizacion']=="obtener_Organizacions"){
			echo $insOrganizacion->obtenerOrganizacionsControlador();
		}

		if($_POST['modulo_organizacion']=="actualizar"){
			echo $insOrganizacion->actualizarOrganizacionControlador();
		}

		if($_POST['modulo_organizacion']=="eliminarFoto"){
			echo $insOrganizacion->eliminarFotoOrganizacionControlador();
		}

		if($_POST['modulo_organizacion']=="actualizarFoto"){
			echo $insOrganizacion->actualizarFotoOrganizacionControlador();
		}
		
	}else{
		session_destroy();
		header("Location: ".APP_URL."login/");
	}