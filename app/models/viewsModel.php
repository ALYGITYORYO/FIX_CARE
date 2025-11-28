<?php
	
	namespace app\models;//nombre del espacio de nombres para organizar el codigo


	//el nombre de la clase debe ser igual al nombre del archivo
	class viewsModel{

		/*---------- Modelo obtener vista ----------*/
		protected function obtenerVistasModelo($vista){

			$listaBlanca=["dashboard","userNew","userList","userUpdate","userSearch","userPhoto","logOut"];

			if(in_array($vista, $listaBlanca)){
				if(is_file("./app/views/content/".$vista."-view.php")){
					$contenido="./app/views/content/".$vista."-view.php";
				}else{
					$contenido="404";
				}
			}elseif($vista=="login" || $vista=="index"){
				$contenido="login";
			}else{
				$contenido="404";
			}
			return $contenido;
		}

	}