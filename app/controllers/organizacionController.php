<?php

	namespace app\controllers;
	use app\models\mainModel;

	class organizacionController extends mainModel{

		/*----------  Controlador registrar organizacion  ----------*/
		public function registrarOrganizacionControlador(){
              // Limpiar y validar datos
            $nombre = $this->limpiarCadena($_POST['organizacion_nombre']);
            $razon_social = $this->limpiarCadena($_POST['organizacion_razon_social']);
            $rfc = isset($_POST['organizacion_rfc']) ? $this->limpiarCadena($_POST['organizacion_rfc']) : '';
            $tipo = $this->limpiarCadena($_POST['organizacion_tipo']);
            $industria = isset($_POST['organizacion_industria']) ? $this->limpiarCadena($_POST['organizacion_industria']) : '';
            $email = $this->limpiarCadena($_POST['organizacion_email']);
            $telefono = $this->limpiarCadena($_POST['organizacion_telefono']);
            $pagina_web = isset($_POST['organizacion_pagina_web']) ? $this->limpiarCadena($_POST['organizacion_pagina_web']) : '';
            $representante = isset($_POST['organizacion_representante']) ? $this->limpiarCadena($_POST['organizacion_representante']) : '';
            $calle = isset($_POST['organizacion_calle']) ? $this->limpiarCadena($_POST['organizacion_calle']) : '';
            $ciudad = isset($_POST['organizacion_ciudad']) ? $this->limpiarCadena($_POST['organizacion_ciudad']) : '';
            $estado = isset($_POST['organizacion_estado']) ? $this->limpiarCadena($_POST['organizacion_estado']) : '';
            $pais = isset($_POST['organizacion_pais']) ? $this->limpiarCadena($_POST['organizacion_pais']) : 'México';
            $codigo_postal = isset($_POST['organizacion_codigo_postal']) ? $this->limpiarCadena($_POST['organizacion_codigo_postal']) : '';
            $limite_usuarios = isset($_POST['organizacion_limite_usuarios']) ? intval($_POST['organizacion_limite_usuarios']) : 10;
            $estado_sistema = $this->limpiarCadena($_POST['organizacion_estado_sistema']);
            $notas = isset($_POST['organizacion_notas']) ? $this->limpiarCadena($_POST['organizacion_notas']) : '';
            
            // Validaciones
            if (strlen($nombre) < 3 || strlen($nombre) > 100) {
                echo json_encode([
                    'alerta' => 'simple',
                    'titulo' => 'Nombre inválido',
                    'texto' => 'El nombre debe tener entre 3 y 100 caracteres',
                    'tipo' => 'error'
                ]);
                return;
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode([
                    'alerta' => 'simple',
                    'titulo' => 'Email inválido',
                    'texto' => 'Ingrese un email válido',
                    'tipo' => 'error'
                ]);
                return;
            }
            
            // Verificar si el email ya está registrado
            $check_email = $this->conexion->prepare("SELECT id FROM organizaciones WHERE email = :email");
            $check_email->execute([':email' => $email]);
            if ($check_email->rowCount() > 0) {
                echo json_encode([
                    'alerta' => 'simple',
                    'titulo' => 'Email duplicado',
                    'texto' => 'El email ya está registrado en otra organización',
                    'tipo' => 'error'
                ]);
                return;
            }
            
            // Procesar logo
            $nombre_logo = '';
            if (isset($_FILES['organizacion_logo']) && $_FILES['organizacion_logo']['error'] == 0) {
                $logo = $_FILES['organizacion_logo'];
                
                // Validar tipo de archivo
                $permitidos = ['image/jpeg', 'image/jpg', 'image/png', 'image/svg+xml'];
                if (!in_array($logo['type'], $permitidos)) {
                    echo json_encode([
                        'alerta' => 'simple',
                        'titulo' => 'Formato no válido',
                        'texto' => 'Solo se permiten imágenes JPG, PNG, JPEG o SVG',
                        'tipo' => 'error'
                    ]);
                    return;
                }
                
                // Validar tamaño (2MB máximo)
                if ($logo['size'] > 2 * 1024 * 1024) {
                    echo json_encode([
                        'alerta' => 'simple',
                        'titulo' => 'Logo muy grande',
                        'texto' => 'El logo no debe superar los 2MB',
                        'tipo' => 'error'
                    ]);
                    return;
                }
                
                // Generar nombre único para el logo
                $extension = pathinfo($logo['name'], PATHINFO_EXTENSION);
                $nombre_logo = 'org_' . time() . '_' . uniqid() . '.' . $extension;
                $ruta_destino = APP_URL . 'app/views/logos_organizaciones/' . $nombre_logo;
                
                // Crear directorio si no existe
                $directorio = dirname($ruta_destino);
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777, true);
                }
                
                // Mover archivo
                if (!move_uploaded_file($logo['tmp_name'], $ruta_destino)) {
                    echo json_encode([
                        'alerta' => 'simple',
                        'titulo' => 'Error al subir',
                        'texto' => 'Error al subir el logo',
                        'tipo' => 'error'
                    ]);
                    return;
                }
            }
            
            // Preparar datos para inserción
            $organizacion_datos = [
                [
                    "campo_nombre" => "nombre",
                    "campo_marcador" => ":nombre",
                    "campo_valor" => $nombre
                ],
                [
                    "campo_nombre" => "razon_social",
                    "campo_marcador" => ":razon_social",
                    "campo_valor" => $razon_social
                ],
                [
                    "campo_nombre" => "rfc",
                    "campo_marcador" => ":rfc",
                    "campo_valor" => $rfc
                ],
                [
                    "campo_nombre" => "tipo",
                    "campo_marcador" => ":tipo",
                    "campo_valor" => $tipo
                ],
                [
                    "campo_nombre" => "industria",
                    "campo_marcador" => ":industria",
                    "campo_valor" => $industria
                ],
                [
                    "campo_nombre" => "email",
                    "campo_marcador" => ":email",
                    "campo_valor" => $email
                ],
                [
                    "campo_nombre" => "telefono",
                    "campo_marcador" => ":telefono",
                    "campo_valor" => $telefono
                ],
                [
                    "campo_nombre" => "pagina_web",
                    "campo_marcador" => ":pagina_web",
                    "campo_valor" => $pagina_web
                ],
                [
                    "campo_nombre" => "representante_legal",
                    "campo_marcador" => ":representante",
                    "campo_valor" => $representante
                ],
                [
                    "campo_nombre" => "direccion_calle",
                    "campo_marcador" => ":calle",
                    "campo_valor" => $calle
                ],
                [
                    "campo_nombre" => "direccion_ciudad",
                    "campo_marcador" => ":ciudad",
                    "campo_valor" => $ciudad
                ],
                [
                    "campo_nombre" => "direccion_estado",
                    "campo_marcador" => ":estado_dir",
                    "campo_valor" => $estado
                ],
                [
                    "campo_nombre" => "direccion_pais",
                    "campo_marcador" => ":pais",
                    "campo_valor" => $pais
                ],
                [
                    "campo_nombre" => "direccion_cp",
                    "campo_marcador" => ":cp",
                    "campo_valor" => $codigo_postal
                ],
                [
                    "campo_nombre" => "logo",
                    "campo_marcador" => ":logo",
                    "campo_valor" => $nombre_logo
                ],
                [
                    "campo_nombre" => "limite_usuarios",
                    "campo_marcador" => ":limite",
                    "campo_valor" => $limite_usuarios
                ],
                [
                    "campo_nombre" => "estado",
                    "campo_marcador" => ":estado_sistema",
                    "campo_valor" => $estado_sistema
                ],
                [
                    "campo_nombre" => "notas",
                    "campo_marcador" => ":notas",
                    "campo_valor" => $notas
                ],
                [
                    "campo_nombre" => "fecha_registro",
                    "campo_marcador" => ":fecha_registro",
                    "campo_valor" => date("Y-m-d H:i:s")
                ]
            ];

            # Preparando datos para el registro #
			$organizacion_datos=$this->guardarDatos("organizaciones",$organizacion_datos);

			if($organizacion_datos->rowCount()==1){
				$alerta=[
					"tipo"=>"limpiar",
					"titulo"=>"Organización registrada",
					"texto"=>"La organización ".$razon_social." se registro con exito",
					"icono"=>"success"
				];
			}else{
				
				if(is_file($img_dir.$foto)){
		            chmod($img_dir.$foto,0777);
		            unlink($img_dir.$foto);
		        }

				$alerta=[
					"tipo"=>"simple",
					"titulo"=>"Ocurrió un error inesperado",
					"texto"=>"No se pudo registrar el usuario, por favor intente nuevamente",
					"icono"=>"error"
				];
			}

			return json_encode($alerta);

        }
        
}