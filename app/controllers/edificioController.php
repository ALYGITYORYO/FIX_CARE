<?php

	namespace app\controllers;
	use app\models\mainModel;

	class edificioController extends mainModel{

		/*----------  Controlador modulos de busquedas  ----------*/
		public function GetEdificioControlador(){

        $lista = array();
        $autoincrement=1;
        $drop_list=$this->ejecutarConsulta("SELECT * FROM edificios WHERE id_org = '".$_POST['id']."'");			
		// PARA OBTENER TODOS LOS DATOS 
        $lista = $drop_list->fetchall(2);
        return json_encode($lista,JSON_UNESCAPED_UNICODE);
			
		}

		public function registrarEdificioControlador() {
    
    // 1. Recuperar y limpiar datos básicos
    $id_organizacion = $this->limpiarCadena($_POST['id_org']);
    $nombre = $this->limpiarCadena($_POST['nombre']);
    $planta = $this->limpiarCadena($_POST['planta']);
    $poligono = $_POST['poligono']; // No usamos limpiarCadena para mantener el formato JSON [{},{}]

    // 2. Validaciones básicas
    if ($id_organizacion == "" || $nombre == "" || $planta == "") {
        return json_encode([
            "tipo" => "simple",
            "titulo" => "Ocurrió un error inesperado",
            "texto" => "No has llenado todos los campos obligatorios (Nombre y Número de pisos)",
            "icono" => "error"
        ]);
    }

    if ($poligono == "") {
        return json_encode([
            "tipo" => "simple",
            "titulo" => "Mapa requerido",
            "texto" => "Por favor, dibuje el perímetro del edificio en el mapa.",
            "icono" => "error"
        ]);
    }

    // 3. Preparar datos para el Modelo (Array de marcadores)
    $edificio_datos_reg = [
        [
            "campo_nombre" => "id_org",
            "campo_marcador" => ":id_org",
            "campo_valor" => $id_organizacion
        ],
        [
            "campo_nombre" => "nombre",
            "campo_marcador" => ":Nombre",
            "campo_valor" => $nombre
        ],
        [
            "campo_nombre" => "planta",
            "campo_marcador" => ":Planta",
            "campo_valor" => $planta
        ],
        [
            "campo_nombre" => "poligono",
            "campo_marcador" => ":Poligono",
            "campo_valor" => $poligono
        ]
    ];

    // 4. Guardar en la base de datos (Tabla: edificio)
    $registrar_edificio = $this->guardarDatos("edificios", $edificio_datos_reg);

    if ($registrar_edificio->rowCount() == 1) {
        $alerta = [
            "tipo" => "limpiar", // Esto activará la limpieza del formulario en el cliente
            "titulo" => "¡Edificio registrado!",
            "texto" => "El edificio se guardó correctamente dentro de la organización.",
            "icono" => "success"
        ];
    } else {
        $alerta = [
            "tipo" => "simple",
            "titulo" => "Error al guardar",
            "texto" => "No se pudo registrar el edificio en la base de datos.",
            "icono" => "error"
        ];
    }

    return json_encode($alerta);
}
		


	}