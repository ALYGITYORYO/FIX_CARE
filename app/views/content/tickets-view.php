<div class="app-body">
    <div class="row gx-3">
        <div class="col-12">
            <div class="card mb-3 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box md rounded-5 bg-primary-subtle d-flex align-items-center justify-content-center"
                            style="width: 48px; height: 48px;">
                            <i class="ri-bank-line text-primary fs-4"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold">Gestión de Organizaciones</h5>
                            <div class="text-secondary small">
                                Organizaciones Registradas
                                <i class="ri-bar-chart-line text-primary ms-1"></i>
                                <span id="contadorOrganizaciones"
                                    class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 ms-2">
                                    <i class="fas fa-spinner fa-spin me-1"></i> Cargando...
                                </span>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-primary rounded-pill px-4 shadow-sm"
                                data-bs-toggle="modal" data-bs-target="#altaOrganizacion">
                                <i class="fas fa-plus-circle me-2"></i> Nueva Organización
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-outer mt-2">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div id="grid"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="altaOrganizacion" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTitulo"><i class="ri-bank-line me-2"></i> Registrar Organización</h5>
                <button onclick="limpiarFormulario()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            
            <form id="formOrganizacion" class="FormularioAjax needs-validation" novalidate>
                <div class="modal-body p-4">
                    <input type="hidden" name="modulo_organizacion" id="modulo_accion" value="registrar">
                    <input type="hidden" name="organizacion_id" id="organizacion_id" value="">
                    <input type="hidden" name="poligono" id="inputPoligono" value="">

                    <div class="row g-4">
                        <div class="col-md-4 text-center border-end">
                            <label class="form-label fw-bold d-block" id="labelFoto">Logo Institucional</label>
                            <div class="mb-3">
                                <img id="previewLogo" src="data:image/svg+xml,%3Csvg..." class="img-thumbnail rounded shadow-sm" style="width: 150px; height: 150px; object-fit: contain;">
                            </div>
                            <input type="file" class="form-control form-control-sm" name="organizacion_logo" id="fileLogo" accept="image/*">
                        </div>

                        <div class="col-md-8">
                            <div class="mb-4">
                                <label class="form-label fw-bold">Nombre de la Organización</label>
                                <input type="text" class="form-control" name="organizacion_nombre" id="organizacion_nombre" required>
                            </div>
                            
                            <div class="card border-dashed bg-light p-3 text-center">
                                <h6 class="fw-bold"><i class="ri-map-pin-2-line"></i> Delimitación Geográfica</h6>
                                <button type="button" class="btn btn-info btn-sm rounded-pill px-4 shadow-sm" id="btnAbrirMapa">
                                    <i class="ri-map-pin-range-line me-1"></i> Dibujar/Editar Perímetro
                                </button>
                                <div id="statusPoligono" class="mt-3 small text-danger fw-bold">
                                    <i class="ri-error-warning-line"></i> Pendiente de dibujar
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow" id="btnGuardar">
                        Guardar Organización
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMapa" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-primary"><i class="ri-map-2-line"></i> Campus Mapper</h5>
                <button type="button" class="btn-close" id="btnCerrarMapaX"></button>
            </div>
            <div class="modal-body p-0">
                <div class="p-2 border-bottom d-flex gap-2">
                    <div class="input-group">
                        <input type="text" id="mapSearch" class="form-control"
                            placeholder="Buscar dirección o ciudad...">
                        <button class="btn btn-primary" onclick="buscarLugar()">Buscar</button>
                    </div>
                </div>
                <div id="map" style="height: 60vh; width: 100%;"></div>
            </div>
            <div class="modal-footer justify-content-start">
                <small class="text-muted"><i class="ri-information-line"></i> Dibuje un polígono o rectángulo sobre el
                    área del campus. Se guardará automáticamente al terminar.</small>
            </div>
        </div>
    </div>
</div>



<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>
let campusMap, drawnItems;
$(document).ready(function() {



    // 1. CARGA DE TABLA ORGANIZACIONES
    async function cargarOrganizaciones() {
        try {
            const response = await fetch('<?=APP_URL; ?>app/ajax/organizacionAjax.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'modulo_organizacion=obtener_organizaciones'
            });

            const data = await response.json();
            console.log(data); // Debug: Verificar la estructura de datos recibida
            $("#grid").kendoGrid({
                dataSource: {
                    data: data,
                    pageSize: 10,
                    schema: {
                        model: {
                            id: "id",
                            fields: {
                                id: {
                                    type: "number"
                                },
                                nombre: {
                                    type: "string"
                                },
                                logo: {
                                    type: "string"
                                },
                                NO_EDIFICIOS: {
                                    type: "number"
                                },
                                NO_AREAS: {
                                    type: "number"
                                }
                            }
                        }
                    }
                },
                height: 550,
                sortable: true,
                filterable: true,
                pageable: {
                    refresh: true,
                    pageSizes: true,
                    buttonCount: 5
                },
                columns: [{
                        field: "logo",
                        title: "Logo",
                        width: "90px",
                        filterable: false,
                        // Usamos #: # para renderizado de HTML seguro en Kendo
                        template: `<div class="text-center">
                                    <img src="<?=APP_URL; ?>app/views/fotos/logos_organizaciones/#: logo ? logo : 'default.png' #" 
                                         style="width: 35px; height: 35px; object-fit: contain;" 
                                         class="rounded shadow-sm">
                                   </div>`
                    },
                    {
                        field: "nombre",
                        title: "Organización",
                        width: "250px"
                    },
                    {
                        field: "NO_EDIFICIOS",
                        title: "Edificios",
                        width: "110px",
                        attributes: {
                            class: "text-center"
                        },
                        template: `<span class="badge bg-light text-dark border">#: NO_EDIFICIOS #</span>`
                    },
                    {
                        field: "NO_AREAS",
                        title: "Áreas",
                        width: "110px",
                        attributes: {
                            class: "text-center"
                        },
                        template: `<span class="badge bg-light text-dark border">#: NO_AREAS #</span>`
                    },
                    {
                        title: " ",
                        width: "280px",
                        headerAttributes: {
                            style: "text-align: center"
                        },
                        attributes: {
                            class: "text-center"
                        },
                        template: `
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-warning" onclick="editarOrg(#: id #)">
                                    <i class="fas fa-edit"></i> Org
                                </button>
                                <button class="btn btn-sm btn-outline-primary" onclick="editarEdificios(#: id #)">
                                    <i class="fas fa-building"></i> Edificios
                                </button>
                                <button class="btn btn-sm btn-outline-info" onclick="editarAreas(#: id #)">
                                    <i class="fas fa-layer-group"></i> Áreas
                                </button>
                            </div>`
                    }
                ],
                dataBound: function() {
                    // Actualiza el contador dinámico en la card superior
                    $("#contadorOrganizaciones").text(this.dataSource.total() + " Registradas");
                }
            });

        } catch (e) {
            console.error("Error al cargar tabla:", e);
            $("#contadorOrganizaciones").html('<span class="text-danger">Error al cargar</span>');
        }
    }

    // --- FUNCIÓN DE LIMPIEZA ---
    window.limpiarFormulario = function() {
        $('#formOrganizacion')[0].reset(); // Limpia inputs de texto
        $('#formOrganizacion').removeClass('was-validated'); // Quita estilos de validación
        
        // Resetear campos ocultos y modo
        $('#organizacion_id').val('');
        $('#inputPoligono').val('');
        $('#modulo_accion').val('registrar'); 
        
        // Resetear Interfaz
        $('#modalTitulo').html('<i class="ri-bank-line me-2"></i> Registrar Organización');
        $('#btnGuardar').text('Guardar Organización').removeClass('btn-warning').addClass('btn-primary');
        $('#statusPoligono').html('<i class="ri-error-warning-line"></i> Pendiente de dibujar').addClass('text-danger').removeClass('text-success');
        
        // Resetear Imagen a la por defecto
        $('#previewLogo').attr('src', 'data:image/svg+xml,...'); 
        
        // Limpiar Mapa si ya se había inicializado
        if (drawnItems) drawnItems.clearLayers();
    };

// Función para abrir el modal en modo "CREAR"
    // Debes llamar a esta función desde tu botón de "Nueva Organización"
    window.nuevaOrganizacion = function() {
        $('#formOrganizacion')[0].reset();
        $('#organizacion_id').val('');
        $('#modulo_accion').val('registrar');
        $('#inputPoligono').val('');
        $('#modalTitulo').html('<i class="ri-bank-line me-2"></i> Registrar Organización');
        $('#btnGuardar').text('Guardar Organización');
        $('#statusPoligono').html('<i class="ri-error-warning-line"></i> Pendiente de dibujar').addClass('text-danger').removeClass('text-success');
        $('#previewLogo').attr('src', 'data:image/svg+xml,...'); // Reset a imagen por defecto
        
        if(drawnItems) drawnItems.clearLayers(); // Limpiar mapa
    };

    // Función para abrir el modal en modo "EDITAR"
    window.editarOrg = function(id) {
        const grid = $("#grid").data("kendoGrid");
        const dataItem = grid.dataSource.get(id);

        if (dataItem) {
            // 1. Cambiar Textos y Modos
            $('#modalTitulo').html('<i class="ri-edit-line me-2"></i> Editar Organización');
            $('#btnGuardar').text('Actualizar Cambios');
            $('#modulo_accion').val('actualizar');
            
            // 2. Cargar Datos en Inputs
            $('#organizacion_id').val(dataItem.id);
            $('#organizacion_nombre').val(dataItem.nombre);
            $('#inputPoligono').val(dataItem.poligono);

            // 3. Logo y Estatus
            const rutaLogo = `<?=APP_URL; ?>app/views/fotos/logos_organizaciones/${dataItem.logo || 'default.png'}`;
            $('#previewLogo').attr('src', rutaLogo);
            
            if(dataItem.poligono) {
                $('#statusPoligono').html('<i class="ri-checkbox-circle-line text-success"></i> Área cargada desde el sistema').removeClass('text-danger');
            }

            // 4. Mostrar Modal
            $('#altaOrganizacion').modal('show');
        }
    };

    // Lógica para el Mapa (Integrada con el ID del inputPoligono)
    $('#modalMapa').on('shown.bs.modal', function () {
        if (!campusMap) {
            campusMap = L.map('map').setView([19.7006, -101.1863], 16);
            L.tileLayer('https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
                maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3']
            }).addTo(campusMap);
            drawnItems = new L.FeatureGroup();
            campusMap.addLayer(drawnItems);
            
            const drawControl = new L.Control.Draw({
                draw: { polygon: true, rectangle: true, polyline: false, circle: false, marker: false },
                edit: { featureGroup: drawnItems }
            });
            campusMap.addControl(drawControl);

            campusMap.on(L.Draw.Event.CREATED, function (e) {
                drawnItems.clearLayers();
                const layer = e.layer;
                drawnItems.addLayer(layer);
                const coords = layer.getLatLngs()[0].map(c => ({ lat: c.lat, lng: c.lng }));
                
                $('#inputPoligono').val(JSON.stringify(coords));
                $('#statusPoligono').html('<i class="ri-checkbox-circle-line text-success"></i> Área delimitada con éxito').removeClass('text-danger');
                
                $('#modalMapa').modal('hide');
                setTimeout(() => $('#altaOrganizacion').modal('show'), 400);
            });
        }

        // CARGAR POLÍGONO EXISTENTE SI ES EDICIÓN
        drawnItems.clearLayers();
        const currentPol = $('#inputPoligono').val();
        if(currentPol) {
            const coords = JSON.parse(currentPol);
            const poly = L.polygon(coords, {color: 'blue'}).addTo(drawnItems);
            campusMap.fitBounds(poly.getBounds());
        }
        
        campusMap.invalidateSize();
    });


    // 2. LÓGICA VISTA PREVIA LOGO
    $('#fileLogo').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => $('#previewLogo').attr('src', e.target.result);
            reader.readAsDataURL(file);
        }
    });

    // 3. NAVEGACIÓN ENTRE MODALES
    $('#btnAbrirMapa').click(function() {
        $('#altaOrganizacion').modal('hide');
        setTimeout(() => $('#modalMapa').modal('show'), 400);
    });

    $('#btnCerrarMapaX').click(function() {
        $('#modalMapa').modal('hide');
        setTimeout(() => $('#altaOrganizacion').modal('show'), 400);
    });

    // --- LÓGICA DE GUARDADO / ACTUALIZACIÓN (AJAX) ---
    $('#formOrganizacion').on('submit', async function(e) {
        e.preventDefault();

        // Validar que el formulario esté lleno según Bootstrap
        if (!this.checkValidity()) {
            this.classList.add('was-validated');
            return;
        }

        // 1. Detectar si es registro o actualización
        const id = $('#organizacion_id').val();
        const accion = id ? 'actualizar' : 'registrar';
        
        // 2. Preparar los datos (usando FormData para soportar el archivo del logo)
        const formData = new FormData(this);
        formData.set('modulo_organizacion', accion); // Sobrescribimos el módulo según el ID

        try {
            const response = await fetch('<?=APP_URL; ?>app/ajax/organizacionAjax.php', {
                method: 'POST',
                body: formData // Enviamos FormData directamente
            });

            const res = await response.json();

            if (res.icono === "success") {
                // Cerrar modal
                $('#altaOrganizacion').modal('hide');
                // Alerta de éxito (usando SweetAlert2 o similar que uses)
                //alert(res.texto); 
                // Recargar el Grid para ver los cambios
                cargarOrganizaciones(); 
            } else {
                alert(res.texto);
            }
        } catch (error) {
            console.error("Error al procesar la solicitud:", error);
            alert("Ocurrió un error en el servidor.");
        }
    });
    

    cargarOrganizaciones();



});

// Función de búsqueda en mapa
async function buscarLugar() {
    console.log(campusMap);
    const query = document.getElementById('mapSearch').value;
    if (!query) return;

    // Verificar si la variable del mapa existe y está inicializada
    if (typeof campusMap === 'undefined' || !campusMap) {
        console.error("El mapa aún no se ha inicializado.");
        return;
    }

    try {
        const response = await fetch(
            `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}`, {
                method: 'GET',
                headers: {
                    // Nominatim requiere un User-Agent para no bloquear la solicitud
                    'User-Agent': 'CampusMapperApp/1.0 (tu-correo@ejemplo.com)'
                }
            });

        if (!response.ok) throw new Error("Error en la respuesta de la red");

        const data = await response.json();
        if (data.length > 0) {
            // Mover el mapa a la ubicación encontrada
            campusMap.setView([data[0].lat, data[0].lon], 18);
        } else {
            alert("No se encontró la ubicación especificada.");
        }
    } catch (error) {
        console.error("Error en la búsqueda:", error);
        alert("Hubo un error al conectar con el servicio de búsqueda.");
    }
}

</script>