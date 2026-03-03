<?php

namespace app\controllers;
use app\models\mainModel;

class organizacionController extends mainModel {

    /*----------  Controlador registrar organizacion  ----------*/
    public function registrarOrganizacionControlador() {
        
        // 1. Recuperar y limpiar datos básicos
        $nombre = $this->limpiarCadena($_POST['organizacion_nombre']);
        $poligono = $_POST['poligono']; // No usamos limpiarCadena para no romper el formato JSON del mapa

        // 2. Validaciones básicas
        if ($nombre == "") {
            return json_encode([
                "tipo" => "simple",
                "titulo" => "Ocurrió un error inesperado",
                "texto" => "No has llenado el nombre de la organización",
                "icono" => "error"
            ]);
        }

        if ($poligono == "") {
            return json_encode([
                "tipo" => "simple",
                "titulo" => "Mapa requerido",
                "texto" => "Por favor, dibuje el perímetro de la organización en el mapa.",
                "icono" => "error"
            ]);
        }

        // 3. Procesar Logo
        $img_dir = "../views/fotos/logos_organizaciones/"; // Ruta relativa desde el controlador Ajax
        $nombre_logo = "";

        if (isset($_FILES['organizacion_logo']) && $_FILES['organizacion_logo']['name'] != "" && $_FILES['organizacion_logo']['size'] > 0) {
            
            // Crear directorio si no existe
            if (!file_exists($img_dir)) {
                mkdir($img_dir, 0777, true);
            }

            // Validar Formato
            if (mime_content_type($_FILES['organizacion_logo']['tmp_name']) != "image/jpeg" && 
                mime_content_type($_FILES['organizacion_logo']['tmp_name']) != "image/png") {
                return json_encode([
                    "tipo" => "simple",
                    "titulo" => "Formato no válido",
                    "texto" => "Solo se permiten imágenes JPG o PNG para el logo",
                    "icono" => "error"
                ]);
            }

            // Validar Peso (2MB)
            if (($_FILES['organizacion_logo']['size'] / 1024) > 2048) {
                return json_encode([
                    "tipo" => "simple",
                    "titulo" => "Logo demasiado grande",
                    "texto" => "El logo no debe pesar más de 2MB",
                    "icono" => "error"
                ]);
            }

            // Nombre único para el archivo
            $extension = pathinfo($_FILES['organizacion_logo']['name'], PATHINFO_EXTENSION);
            $nombre_logo = "logo_" . time() . "_" . uniqid() . "." . $extension;

            // Mover archivo
            if (!move_uploaded_file($_FILES['organizacion_logo']['tmp_name'], $img_dir . $nombre_logo)) {
                return json_encode([
                    "tipo" => "simple",
                    "titulo" => "Error de sistema",
                    "texto" => "No pudimos subir el logo al servidor en este momento",
                    "icono" => "error"
                ]);
            }
        }

        // 4. Preparar datos para el Modelo
        $organizacion_datos_reg = [
            [
                "campo_nombre" => "nombre",
                "campo_marcador" => ":Nombre",
                "campo_valor" => $nombre
            ],
            [
                "campo_nombre" => "logo",
                "campo_marcador" => ":Logo",
                "campo_valor" => $nombre_logo
            ],
            [
                "campo_nombre" => "poligono",
                "campo_marcador" => ":Poligono",
                "campo_valor" => $poligono
            ],
            [
                "campo_nombre" => "fecha_registro",
                "campo_marcador" => ":Fecha",
                "campo_valor" => date("Y-m-d H:i:s")
            ]
        ];

        // 5. Guardar en la base de datos
        $registrar_organizacion = $this->guardarDatos("organizaciones", $organizacion_datos_reg);

        if ($registrar_organizacion->rowCount() == 1) {
            $alerta = [
                "tipo" => "limpiar",
                "titulo" => "¡Organización registrada!",
                "texto" => "La organización se guardó correctamente con su ubicación geográfica.",
                "icono" => "success"
            ];
        } else {
            // Si falló la DB, borramos el logo subido para no dejar basura
            if (is_file($img_dir . $nombre_logo)) {
                unlink($img_dir . $nombre_logo);
            }

            $alerta = [
                "tipo" => "simple",
                "titulo" => "Error al guardar",
                "texto" => "No se pudo registrar la organización en la base de datos.",
                "icono" => "error"
            ];
        }

        return json_encode($alerta);
    }

    public function obtenerOrganizacionesControlador(){

		$lista = array();
        $autoincrement=1;
        $drop_list=$this->ejecutarConsulta("SELECT 
        O.id, 
        O.nombre, 
        O.poligono, 
        O.logo, 
        O.fecha_registro, 
        COUNT(DISTINCT E.id) AS NO_EDIFICIOS, 
        COUNT(DISTINCT A.id) AS NO_AREAS
        FROM organizaciones O
        LEFT JOIN edificios E ON E.id_org = O.id
        LEFT JOIN areas A ON A.id_edificio = E.id
        GROUP BY O.id;");			
		// PARA OBTENER TODOS LOS DATOS 
        $lista = $drop_list->fetchall(2);
        return json_encode($lista,JSON_UNESCAPED_UNICODE);
    }

   public function actualizarOrganizacionControlador(){
    
    // 1. Recuperar el ID y los datos básicos
    $id = $this->limpiarCadena($_POST['organizacion_id']);
    $nombre = $this->limpiarCadena($_POST['organizacion_nombre']);
    $poligono = $_POST['poligono']; // JSON string del mapa

    // 2. Verificar que la organización exista en la DB
    $check_org = $this->ejecutarConsulta("SELECT * FROM organizaciones WHERE id='$id'");
    if($check_org->rowCount() <= 0){
        return json_encode([
            "tipo" => "simple",
            "titulo" => "Error",
            "texto" => "La organización que intentas actualizar no existe.",
            "icono" => "error"
        ]);
    }
    
    $datos = $check_org->fetch();
    $img_dir = "../views/fotos/logos_organizaciones/";
    $nombre_logo = $datos['logo']; // Por defecto mantenemos el logo actual

    // 3. Lógica para el Logo (Si el usuario selecciona un archivo nuevo)
    if (isset($_FILES['organizacion_logo']) && $_FILES['organizacion_logo']['name'] != "" && $_FILES['organizacion_logo']['size'] > 0) {
        
        // Validar Formato y Peso
        $permitidos = ["image/jpeg", "image/png", "image/jpg"];
        if (!in_array(mime_content_type($_FILES['organizacion_logo']['tmp_name']), $permitidos)) {
            return json_encode([
                "tipo" => "simple",
                "titulo" => "Formato inválido",
                "texto" => "Solo se permiten imágenes JPG o PNG",
                "icono" => "error"
            ]);
        }

        // Generar nuevo nombre único
        $extension = pathinfo($_FILES['organizacion_logo']['name'], PATHINFO_EXTENSION);
        $nuevo_nombre_logo = "logo_" . time() . "_" . uniqid() . "." . $extension;

        // Subir el nuevo archivo
        if (move_uploaded_file($_FILES['organizacion_logo']['tmp_name'], $img_dir . $nuevo_nombre_logo)) {
            
            // SI SE SUBIÓ CON ÉXITO, BORRAMOS EL ANTERIOR (si existe y no es el default)
            if (is_file($img_dir . $datos['logo']) && $datos['logo'] != "default.png") {
                chmod($img_dir . $datos['logo'], 0777);
                unlink($img_dir . $datos['logo']);
            }
            
            $nombre_logo = $nuevo_nombre_logo; // Actualizamos la variable para la DB
        } else {
            return json_encode([
                "tipo" => "simple",
                "titulo" => "Error de subida",
                "texto" => "No se pudo subir el nuevo logo.",
                "icono" => "error"
            ]);
        }
    }

    // 4. Preparar datos para la actualización
    $organizacion_datos_update = [
        [
            "campo_nombre" => "nombre",
            "campo_marcador" => ":Nombre",
            "campo_valor" => $nombre
        ],
        [
            "campo_nombre" => "logo",
            "campo_marcador" => ":Logo",
            "campo_valor" => $nombre_logo
        ],
        [
            "campo_nombre" => "poligono",
            "campo_marcador" => ":Poligono",
            "campo_valor" => $poligono
        ]
    ];

    $condicion = [
        "condicion_campo" => "id",
        "condicion_marcador" => ":id",
        "condicion_valor" => $id
    ];

    // 5. Ejecutar actualización
    if($this->actualizarDatos("organizaciones", $organizacion_datos_update, $condicion)){
        $alerta = [
            "tipo" => "limpiar",
            "titulo" => "Organización actualizada",
            "texto" => "La organización " . $nombre . " se actualizó con éxito.",
            "icono" => "success"
        ];
    } else {
        // Si falló y habíamos subido un logo nuevo, lo borramos para no duplicar basura
        if($nombre_logo != $datos['logo'] && is_file($img_dir . $nombre_logo)){
            unlink($img_dir . $nombre_logo);
        }

        $alerta = [
            "tipo" => "simple",
            "titulo" => "Ocurrió un error",
            "texto" => "No pudimos actualizar los datos de la organización.",
            "icono" => "error"
        ];
    }

    return json_encode($alerta);
}
}