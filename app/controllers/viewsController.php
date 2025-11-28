<?php

	namespace app\controllers;
	use app\models\viewsModel; //importando la clase viewsModel del espacio de nombres app\models

	class viewsController extends viewsModel{

		/*---------- Controlador obtener vistas ----------*/
		public function obtenerVistasControlador($vista){
			if($vista!=""){
				$respuesta=$this->obtenerVistasModelo($vista);
			}else{
				$respuesta="login";
			}
			return $respuesta;
		}
	}