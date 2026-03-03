<!-- App body starts -->
<div class="app-body">
    <!-- Row start -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row row-cols-1 row-cols-lg-12 align-items-stretch g-4">
                        <div class="col">
                            <div class="card card-cover shadow mb-4" style="
                                background-image: url('<?=APP_URL; ?>app/views/img/img8.jpg');
                                background-size: cover;
                                background-repeat: no-repeat;
                                background-position: center;
                                min-height: 200px;">
                                <div class="p-5 text-white d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="display-5 fw-bold mb-0">
                                            <i class="fas fa-building me-2"></i>Organizaciones
                                        </h4>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-lg btn-light" data-bs-toggle="modal"
                                            data-bs-target="#modalAltaOrganizacion">
                                            <i class="fas fa-plus-circle me-2"></i>
                                            Agregar Organización
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0 d-flex align-items-center">
                            <i class="fas fa-list me-2"></i>
                            Lista de Organizaciones
                        </h5>
                        <div class="d-flex align-items-center">
                            <span id="contadorOrganizaciones"
                                class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2">
                                <i class="fas fa-spinner fa-spin me-1"></i> Cargando...
                            </span>
                            <button id="btnRecargarOrganizaciones" class="btn btn-sm btn-outline-primary ms-2">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </div>
                    </div>

                    <div class="table-outer">
                        <div class="table-responsive">
                            <div id="example">
                                <div id="gridOrganizaciones"></div>
                                
                                <style>
                                #gridOrganizaciones {
                                    font-size: 14px;
                                }
                                .k-grid-header th {
                                    background-color: #f8f9fa;
                                    font-weight: 600;
                                    white-space: nowrap;
                                }
                                .k-grid-content td {
                                    vertical-align: middle;
                                    padding: 8px 12px;
                                }
                                .k-grid-content .text-truncate {
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;
                                }
                                .btn-sm {
                                    padding: 0.25rem 0.4rem;
                                    font-size: 12px;
                                    min-width: 32px;
                                }
                                .badge {
                                    font-size: 11px;
                                    font-weight: 500;
                                    padding: 0.25em 0.6em;
                                }
                                .k-grid tbody tr:hover {
                                    background-color: #f8f9fa;
                                    cursor: pointer;
                                }
                                .logo-organizacion {
                                    width: 40px;
                                    height: 40px;
                                    object-fit: contain;
                                    border-radius: 4px;
                                    border: 1px solid #dee2e6;
                                }
                                @media (max-width: 768px) {
                                    .k-grid { font-size: 13px; }
                                    .k-grid .btn-sm { min-width: 28px; padding: 0.2rem 0.3rem; }
                                    .badge { font-size: 10px; padding: 0.2em 0.5em; }
                                }
                                </style>

                                <script>
                                $(document).ready(function() {
                                    // Función para cargar organizaciones
                                    async function cargarOrganizaciones() {
                                        try {
                                            const response = await fetch('<?=APP_URL; ?>app/ajax/organizacionAjax.php', {
                                                method: 'POST',
                                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                                                body: 'modulo_organizacion=obtener_organizaciones'
                                            });
                                            
                                            const organizaciones = await response.json();
                                            console.log('Organizaciones cargadas:', organizaciones);
                                            crearGridOrganizaciones(organizaciones);
                                            
                                        } catch (error) {
                                            console.error('Error al cargar organizaciones:', error);
                                            crearGridOrganizaciones([]);
                                        }
                                    }

                                    // Función para crear el grid de organizaciones
                                    function crearGridOrganizaciones(organizaciones) {
                                        if ($("#gridOrganizaciones").data("kendoGrid")) {
                                            $("#gridOrganizaciones").data("kendoGrid").destroy();
                                            $("#gridOrganizaciones").empty();
                                        }

                                        var organizacionesDataSource = new kendo.data.DataSource({
                                            data: organizaciones,
                                            pageSize: 10,
                                            schema: {
                                                model: {
                                                    id: "id",
                                                    fields: {
                                                        id: { type: "number", editable: false },
                                                        nombre: { type: "string" },
                                                        razon_social: { type: "string" },
                                                        rfc: { type: "string" },
                                                        tipo: { type: "string" },
                                                        industria: { type: "string" },
                                                        email: { type: "string" },
                                                        telefono: { type: "string" },
                                                        estado: { type: "string" },
                                                        fecha_registro: { type: "date" },
                                                        logo: { type: "string" }
                                                    }
                                                }
                                            }
                                        });

                                        // Crear el grid
                                        $("#gridOrganizaciones").kendoGrid({
                                            dataSource: organizacionesDataSource,
                                            columnMenu: true,
                                            height: 600,
                                            scrollable: true,
                                            pageable: {
                                                refresh: true,
                                                pageSizes: [10, 20, 50, "Todos"],
                                                buttonCount: 5
                                            },
                                            sortable: true,
                                            filterable: true,
                                            resizable: true,
                                            reorderable: true,
                                            toolbar: ["excel", "pdf", "search"],
                                            columns: [
                                                {
                                                    field: "logo",
                                                    title: "Logo",
                                                    width: "70px",
                                                    template: function(dataItem) {
                                                        if (dataItem.logo && dataItem.logo !== "") {
                                                            return '<div class="text-center">' +
                                                                '<img src="<?=APP_URL; ?>app/views/logos_organizaciones/' + 
                                                                dataItem.logo + '" alt="' + dataItem.nombre + 
                                                                '" class="logo-organizacion">' +
                                                                '</div>';
                                                        } else {
                                                            return '<div class="text-center">' +
                                                                '<i class="fas fa-building fa-2x text-muted"></i>' +
                                                                '</div>';
                                                        }
                                                    },
                                                    attributes: { "class": "text-center" },
                                                    filterable: false,
                                                    sortable: false
                                                },
                                                {
                                                    field: "nombre",
                                                    title: "Nombre",
                                                    width: "180px",
                                                    template: function(dataItem) {
                                                        return '<div>' +
                                                            '<strong>' + dataItem.nombre + '</strong>' +
                                                            '<div class="text-muted small">' + dataItem.razon_social + '</div>' +
                                                            '</div>';
                                                    },
                                                    filterable: { multi: true, search: true }
                                                },
                                                {
                                                    field: "rfc",
                                                    title: "RFC",
                                                    width: "120px",
                                                    template: function(dataItem) {
                                                        return dataItem.rfc || '<span class="text-muted">No especificado</span>';
                                                    }
                                                },
                                                {
                                                    field: "tipo",
                                                    title: "Tipo",
                                                    width: "100px",
                                                    template: function(dataItem) {
                                                        var badgeClass = {
                                                            'corporacion': 'primary',
                                                            'sociedad': 'success',
                                                            'individual': 'info',
                                                            'gubernamental': 'warning',
                                                            'sin_fines_lucro': 'secondary'
                                                        }[dataItem.tipo] || 'secondary';
                                                        
                                                        return '<span class="badge bg-' + badgeClass + '">' + 
                                                               (dataItem.tipo || 'Sin tipo') + '</span>';
                                                    },
                                                    filterable: { multi: true }
                                                },
                                                {
                                                    field: "industria",
                                                    title: "Industria",
                                                    width: "130px",
                                                    template: function(dataItem) {
                                                        return dataItem.industria || '<span class="text-muted">No especificada</span>';
                                                    }
                                                },
                                                {
                                                    field: "email",
                                                    title: "Email",
                                                    width: "180px",
                                                    template: function(dataItem) {
                                                        if (dataItem.email) {
                                                            return '<a href="mailto:' + dataItem.email + 
                                                                   '" class="text-primary text-truncate d-block">' + 
                                                                   dataItem.email + '</a>';
                                                        }
                                                        return '<span class="text-muted">No especificado</span>';
                                                    }
                                                },
                                                {
                                                    field: "telefono",
                                                    title: "Teléfono",
                                                    width: "120px"
                                                },
                                                {
                                                    field: "estado",
                                                    title: "Estado",
                                                    width: "100px",
                                                    template: function(dataItem) {
                                                        var badgeClass = {
                                                            'activo': 'success',
                                                            'inactivo': 'secondary',
                                                            'pendiente': 'warning',
                                                            'suspendido': 'danger'
                                                        }[dataItem.estado] || 'secondary';
                                                        
                                                        return '<span class="badge bg-' + badgeClass + '">' + 
                                                               dataItem.estado + '</span>';
                                                    },
                                                    filterable: { multi: true }
                                                },
                                                {
                                                    field: "fecha_registro",
                                                    title: "Fecha Registro",
                                                    width: "140px",
                                                    format: "{0:dd/MM/yyyy}",
                                                    filterable: { ui: "datepicker" }
                                                },
                                                {
                                                    title: "Acciones",
                                                    width: "120px",
                                                    template: function(dataItem) {
                                                        return '<div class="d-flex justify-content-center gap-1">' +
                                                            '<button class="btn btn-sm btn-outline-primary btn-editar-org" data-id="' + 
                                                            dataItem.id + '" title="Editar">' +
                                                            '<i class="fas fa-edit"></i>' +
                                                            '</button>' +
                                                            '<button class="btn btn-sm btn-outline-info btn-ver-org" data-id="' + 
                                                            dataItem.id + '" title="Ver">' +
                                                            '<i class="fas fa-eye"></i>' +
                                                            '</button>' +
                                                            '<button class="btn btn-sm btn-outline-danger btn-eliminar-org" data-id="' + 
                                                            dataItem.id + '" title="Eliminar">' +
                                                            '<i class="fas fa-trash"></i>' +
                                                            '</button>' +
                                                            '</div>';
                                                    },
                                                    attributes: { "class": "text-center" },
                                                    filterable: false,
                                                    sortable: false
                                                }
                                            ],
                                            dataBound: function(e) {
                                                // Agregar eventos a los botones
                                                $(".btn-editar-org").off('click').click(function() {
                                                    var id = $(this).data("id");
                                                    var grid = $("#gridOrganizaciones").data("kendoGrid");
                                                    var data = grid.dataSource.data();
                                                    
                                                    var organizacion = data.find(function(item) {
                                                        return item.id == id;
                                                    });
                                                    
                                                    if (organizacion) {
                                                        cargarDatosOrganizacionModal(organizacion);
                                                    }
                                                });
                                                
                                                $(".btn-ver-org").click(function() {
                                                    var id = $(this).data("id");
                                                    verOrganizacion(id);
                                                });
                                                
                                                $(".btn-eliminar-org").click(function() {
                                                    var id = $(this).data("id");
                                                    eliminarOrganizacion(id);
                                                });
                                                
                                                // Actualizar contador
                                                var total = this.dataSource.total();
                                                $("#contadorOrganizaciones").text(total + " organizaciones");
                                                
                                                this.resize();
                                            },
                                            resize: function(e) {
                                                var grid = e.sender;
                                                grid.resize();
                                            }
                                        });
                                    }

                                    // Funciones de acción
                                    function verOrganizacion(id) {
                                        console.log("Ver organización ID:", id);
                                        // Implementar visualización
                                    }

                                    function eliminarOrganizacion(id) {
                                        if (confirm("¿Está seguro de eliminar esta organización?")) {
                                            console.log("Eliminar organización ID:", id);
                                            // Implementar eliminación
                                        }
                                    }

                                    // Recargar organizaciones
                                    $("#btnRecargarOrganizaciones").click(function() {
                                        cargarOrganizaciones();
                                    });

                                    // Ajustar grid al cambiar tamaño de ventana
                                    $(window).resize(function() {
                                        var grid = $("#gridOrganizaciones").data("kendoGrid");
                                        if (grid) {
                                            grid.resize();
                                        }
                                    });

                                    // Inicializar
                                    cargarOrganizaciones();
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>
<!-- App body ends -->

<!-- Modal para alta de organización -->
<div class="modal fade" id="modalAltaOrganizacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalAltaOrganizacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalAltaOrganizacionLabel">
                    <i class="fas fa-plus-circle me-2"></i>Alta de Organización
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form class="FormularioAjax needs-validation" action="<?= APP_URL; ?>app/ajax/organizacionAjax.php" 
                      method="POST" enctype="multipart/form-data" novalidate>
                    
                    <input type="hidden" name="modulo_organizacion" value="registrar">
                    
                    <!-- Sección 1: Información Básica -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="border-bottom pb-2">
                                <i class="fas fa-info-circle me-2"></i>Información Básica
                            </h5>
                        </div>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="org_nombre" class="form-label">
                                <i class="fas fa-building me-1"></i>Nombre Comercial <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="org_nombre" name="organizacion_nombre" 
                                   maxlength="100" required placeholder="Ej: Mi Empresa S.A. de C.V.">
                            <div class="valid-feedback">¡Correcto!</div>
                            <div class="invalid-feedback">Este campo es requerido</div>
                        </div>
                        <div class="col-md-6">
                            <label for="org_razon_social" class="form-label">
                                <i class="fas fa-file-contract me-1"></i>Razón Social <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="org_razon_social" name="organizacion_razon_social" 
                                   maxlength="200" required placeholder="Nombre legal completo">
                            <div class="valid-feedback">¡Correcto!</div>
                            <div class="invalid-feedback">Este campo es requerido</div>
                        </div>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="org_rfc" class="form-label">
                                <i class="fas fa-id-card me-1"></i>RFC
                            </label>
                            <input type="text" class="form-control" id="org_rfc" name="organizacion_rfc" 
                                   maxlength="13" placeholder="Ej: MIE870524XXX">
                            <small class="form-text text-muted">13 caracteres para personas morales</small>
                        </div>
                        <div class="col-md-4">
                            <label for="org_tipo" class="form-label">
                                <i class="fas fa-tag me-1"></i>Tipo de Organización <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" id="org_tipo" name="organizacion_tipo" required>
                                <option value="" selected disabled>Seleccione un tipo...</option>
                                <option value="corporacion">Corporación</option>
                                <option value="sociedad">Sociedad Anónima</option>
                                <option value="individual">Persona Física</option>
                                <option value="gubernamental">Gubernamental</option>
                                <option value="sin_fines_lucro">Sin Fines de Lucro</option>
                                <option value="otro">Otro</option>
                            </select>
                            <div class="valid-feedback">¡Correcto!</div>
                            <div class="invalid-feedback">Seleccione un tipo</div>
                        </div>
                        <div class="col-md-4">
                            <label for="org_industria" class="form-label">
                                <i class="fas fa-industry me-1"></i>Industria / Sector
                            </label>
                            <select class="form-select" id="org_industria" name="organizacion_industria">
                                <option value="" selected>Seleccione industria...</option>
                                <option value="tecnologia">Tecnología</option>
                                <option value="salud">Salud</option>
                                <option value="educacion">Educación</option>
                                <option value="finanzas">Finanzas</option>
                                <option value="manufactura">Manufactura</option>
                                <option value="comercio">Comercio</option>
                                <option value="servicios">Servicios</option>
                                <option value="construccion">Construcción</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Sección 2: Información de Contacto -->
                    <div class="row mb-4 mt-4">
                        <div class="col-12">
                            <h5 class="border-bottom pb-2">
                                <i class="fas fa-address-book me-2"></i>Información de Contacto
                            </h5>
                        </div>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="org_email" class="form-label">
                                <i class="fas fa-envelope me-1"></i>Email Corporativo <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" id="org_email" name="organizacion_email" 
                                   maxlength="100" required placeholder="contacto@empresa.com">
                            <div class="valid-feedback">¡Email válido!</div>
                            <div class="invalid-feedback">Ingrese un email válido</div>
                        </div>
                        <div class="col-md-6">
                            <label for="org_telefono" class="form-label">
                                <i class="fas fa-phone me-1"></i>Teléfono Principal <span class="text-danger">*</span>
                            </label>
                            <input type="tel" class="form-control" id="org_telefono" name="organizacion_telefono" 
                                   maxlength="20" required placeholder="Ej: +52 55 1234 5678">
                            <div class="valid-feedback">¡Correcto!</div>
                            <div class="invalid-feedback">Este campo es requerido</div>
                        </div>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="org_pagina_web" class="form-label">
                                <i class="fas fa-globe me-1"></i>Página Web
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">https://</span>
                                <input type="text" class="form-control" id="org_pagina_web" name="organizacion_pagina_web" 
                                       placeholder="www.empresa.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="org_representante" class="form-label">
                                <i class="fas fa-user-tie me-1"></i>Representante Legal
                            </label>
                            <input type="text" class="form-control" id="org_representante" name="organizacion_representante" 
                                   maxlength="100" placeholder="Nombre del representante">
                        </div>
                    </div>
                    
                    <!-- Sección 3: Dirección -->
                    <div class="row mb-4 mt-4">
                        <div class="col-12">
                            <h5 class="border-bottom pb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Dirección
                            </h5>
                        </div>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="org_calle" class="form-label">
                                <i class="fas fa-road me-1"></i>Calle y Número
                            </label>
                            <input type="text" class="form-control" id="org_calle" name="organizacion_calle" 
                                   maxlength="200" placeholder="Calle, número, colonia">
                        </div>
                        <div class="col-md-6">
                            <label for="org_ciudad" class="form-label">
                                <i class="fas fa-city me-1"></i>Ciudad
                            </label>
                            <input type="text" class="form-control" id="org_ciudad" name="organizacion_ciudad" 
                                   maxlength="100" placeholder="Ciudad">
                        </div>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="org_estado" class="form-label">
                                <i class="fas fa-map me-1"></i>Estado
                            </label>
                            <input type="text" class="form-control" id="org_estado" name="organizacion_estado" 
                                   maxlength="50" placeholder="Estado">
                        </div>
                        <div class="col-md-4">
                            <label for="org_pais" class="form-label">
                                <i class="fas fa-flag me-1"></i>País
                            </label>
                            <input type="text" class="form-control" id="org_pais" name="organizacion_pais" 
                                   maxlength="50" placeholder="País" value="México">
                        </div>
                        <div class="col-md-4">
                            <label for="org_codigo_postal" class="form-label">
                                <i class="fas fa-mail-bulk me-1"></i>Código Postal
                            </label>
                            <input type="text" class="form-control" id="org_codigo_postal" name="organizacion_codigo_postal" 
                                   maxlength="10" placeholder="C.P.">
                        </div>
                    </div>
                    
                    <!-- Sección 4: Logo -->
                    <div class="row mb-4 mt-4">
                        <div class="col-12">
                            <h5 class="border-bottom pb-2">
                                <i class="fas fa-image me-2"></i>Logo de la Organización
                            </h5>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="org_logo" class="form-label">
                                <i class="fas fa-camera me-1"></i>Seleccionar Logo
                            </label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="org_logo" name="organizacion_logo" 
                                       accept=".jpg, .png, .jpeg, .svg">
                                <label class="input-group-text" for="org_logo">
                                    <i class="fas fa-upload"></i>
                                </label>
                            </div>
                            <small class="form-text text-muted">
                                Formatos: JPG, PNG, JPEG, SVG. Tamaño máximo: 2MB
                            </small>
                            <div class="preview-container mt-2 text-center">
                                <img id="previewLogo" 
                                     src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='150' height='150' viewBox='0 0 150 150'%3E%3Crect width='150' height='150' fill='%23e9ecef'/%3E%3Ctext x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' font-family='Arial' font-size='14' fill='%236c757d'%3ELogo%3C/text%3E%3C/svg%3E" 
                                     alt="Previsualización" class="img-thumbnail" style="max-width: 150px; max-height: 150px; object-fit: contain;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-info mt-4">
                                <h6><i class="fas fa-info-circle me-2"></i>Recomendaciones:</h6>
                                <ul class="mb-0">
                                    <li>Formato preferido: PNG con fondo transparente</li>
                                    <li>Resolución mínima: 300x300 px</li>
                                    <li>Relación de aspecto: 1:1 (cuadrado)</li>
                                    <li>Tamaño máximo: 2MB</li>
                                    <li>Evitar logos con texto muy pequeño</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sección 5: Configuración Adicional -->
                    <div class="row mb-4 mt-4">
                        <div class="col-12">
                            <h5 class="border-bottom pb-2">
                                <i class="fas fa-cog me-2"></i>Configuración Adicional
                            </h5>
                        </div>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="org_estado_sistema" class="form-label">
                                <i class="fas fa-toggle-on me-1"></i>Estado en Sistema <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" id="org_estado_sistema" name="organizacion_estado_sistema" required>
                                <option value="activo" selected>Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="pendiente">Pendiente</option>
                            </select>
                            <small class="form-text text-muted">Organizaciones inactivas no podrán crear tickets</small>
                        </div>
                        <div class="col-md-6">
                            <label for="org_limite_usuarios" class="form-label">
                                <i class="fas fa-users me-1"></i>Límite de Usuarios
                            </label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="org_limite_usuarios" 
                                       name="organizacion_limite_usuarios" min="1" max="1000" value="10">
                                <span class="input-group-text">usuarios</span>
                            </div>
                            <small class="form-text text-muted">Número máximo de usuarios permitidos</small>
                        </div>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <label for="org_notas" class="form-label">
                                <i class="fas fa-sticky-note me-1"></i>Notas Adicionales
                            </label>
                            <textarea class="form-control" id="org_notas" name="organizacion_notas" 
                                      rows="3" placeholder="Información adicional relevante..."></textarea>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="org_terminos" required>
                                <label class="form-check-label" for="org_terminos">
                                    Confirmo que la información proporcionada es verídica y autorizo el tratamiento de datos
                                </label>
                                <div class="invalid-feedback">
                                    Debe aceptar los términos para continuar
                                </div>
                            </div>
                        </div>
                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancelar
                </button>
                <button type="button" class="btn btn-secondary" onclick="limpiarFormularioOrganizacion()">
                    <i class="fas fa-broom me-1"></i>Limpiar
                </button>
                <button type="submit" class="btn btn-primary" >
                    <i class="fas fa-save me-1"></i>Guardar Organización
                </button>
            </div>
             </form>
        </div>
    </div>
</div>
<!-- END Modal alta de organización -->

<!-- Script para manejar organizaciones -->
<script>
$(document).ready(function() {
    // Previsualización del logo
    $('#org_logo').change(function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#previewLogo').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
    
    // Función para cargar datos en modal de edición
    function cargarDatosOrganizacionModal(organizacion) {
        console.log('Cargando datos de organización:', organizacion);
        
        // Llenar formulario con datos
        $('#editar_org_id').val(organizacion.id);
        $('#editar_org_nombre').val(organizacion.nombre || '');
        $('#editar_org_razon_social').val(organizacion.razon_social || '');
        $('#editar_org_rfc').val(organizacion.rfc || '');
        $('#editar_org_tipo').val(organizacion.tipo || '');
        $('#editar_org_industria').val(organizacion.industria || '');
        $('#editar_org_email').val(organizacion.email || '');
        $('#editar_org_telefono').val(organizacion.telefono || '');
        $('#editar_org_estado').val(organizacion.estado || 'activo');
        
        // Cargar logo actual si existe
        if (organizacion.logo && organizacion.logo !== '') {
            var logoUrl = '<?= APP_URL; ?>app/views/logos_organizaciones/' + organizacion.logo;
            $('#currentOrgLogo').attr('src', logoUrl).show();
            $('#currentOrgLogoContainer').show();
        }
        
        // Mostrar modal de edición (debes crear uno similar al de alta)
        $('#modalEditarOrganizacion').modal('show');
    }
    
   
    
    // Función para mostrar alertas
    function mostrarAlertaOrganizacion(mensaje, tipo) {
        var alertClass = 'alert-' + tipo;
        var icon = tipo === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        
        var alertaHTML = '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' +
                         '<i class="fas ' + icon + ' me-2"></i>' + mensaje +
                         '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                         '</div>';
        
        $('.modal-body').prepend(alertaHTML);
        
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    }
    
    // Función para limpiar formulario
    window.limpiarFormularioOrganizacion = function() {
        $('.FormularioOrganizacionAjax')[0].reset();
        $('#previewLogo').attr('src', 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 150 150"%3E%3Crect width="150" height="150" fill="%23e9ecef"/%3E%3Ctext x="50%25" y="50%25" dominant-baseline="middle" text-anchor="middle" font-family="Arial" font-size="14" fill="%236c757d"%3ELogo%3C/text%3E%3C/svg%3E');
        $('.FormularioOrganizacionAjax').removeClass('was-validated');
    };
});
</script>
