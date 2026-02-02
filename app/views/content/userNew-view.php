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
                                        background-size: cover; /* Para que cubra todo el espacio */
                                background-repeat: no-repeat; /* Para que no se repita */
                                background-position: center; /* Centrar la imagen */
                                min-height: 200px; /* Altura mínima */
									">
                                        <div class="p-5 text-white d-flex justify-content-between align-items-center">
                                            <div>
                                                <!-- Título más grueso usando fw-bold o fw-bolder -->
                                                <h4 class="display-5 fw-bold mb-0">
                                                    <!-- fw-bold para más grueso -->
                                                    Usuarios
                                                </h4>
                                            </div>
                                            <!-- Botón en la misma línea -->
                                            <div>
                                                <button type="button" class="btn btn-lg btn-light"
                                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <i class="fas fa-user-plus me-2"></i> <!-- Icono de FontAwesome -->
                                                    Agregar Usuarios
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="table-outer">
                                <div class="table-responsive">
                                    <div id="example">
                                        <div id="grid"></div>
                                        <script>
                                        $(document).ready(function() {
                                            var crudServiceBaseUrl =
                                                "https://demos.telerik.com/service/v2/core",
                                                dataSource = new kendo.data.DataSource({
                                                    transport: {
                                                        read: {
                                                            url: crudServiceBaseUrl + "/detailproducts"
                                                        },
                                                        update: {
                                                            url: crudServiceBaseUrl +
                                                                "/detailproducts/Update",
                                                            type: "POST",
                                                            contentType: "application/json"
                                                        },
                                                        destroy: {
                                                            url: crudServiceBaseUrl +
                                                                "/detailproducts/Destroy",
                                                            type: "POST",
                                                            contentType: "application/json"
                                                        },
                                                        parameterMap: function(options, operation) {
                                                            if (operation !== "read" && options
                                                                .models) {
                                                                return kendo.stringify(options.models);
                                                            }
                                                        }
                                                    },
                                                    batch: true,
                                                    pageSize: 20,
                                                    autoSync: true,
                                                    aggregate: [{
                                                        field: "TotalSales",
                                                        aggregate: "sum"
                                                    }],
                                                    group: {
                                                        field: "Category.CategoryName",
                                                        dir: "desc",
                                                        aggregates: [{
                                                            field: "TotalSales",
                                                            aggregate: "sum"
                                                        }]
                                                    },
                                                    schema: {
                                                        model: {
                                                            id: "ProductID",
                                                            fields: {
                                                                ProductID: {
                                                                    editable: false,
                                                                    nullable: true
                                                                },
                                                                Discontinued: {
                                                                    type: "boolean",
                                                                    editable: false
                                                                },
                                                                TotalSales: {
                                                                    type: "number",
                                                                    editable: false
                                                                },
                                                                TargetSales: {
                                                                    type: "number",
                                                                    editable: false
                                                                },
                                                                LastSupply: {
                                                                    type: "date"
                                                                },
                                                                UnitPrice: {
                                                                    type: "number"
                                                                },
                                                                UnitsInStock: {
                                                                    type: "number"
                                                                },
                                                                Category: {
                                                                    defaultValue: {
                                                                        CategoryID: 8,
                                                                        CategoryName: "Seafood"
                                                                    }
                                                                },
                                                                Country: {
                                                                    defaultValue: {
                                                                        CountryNameLong: "Bulgaria",
                                                                        CountryNameShort: "bg"
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                });

                                            $("#grid").kendoGrid({
                                                dataSource: dataSource,
                                                columnMenu: {
                                                    filterable: false
                                                },
                                                height: 680,
                                                editable: "incell",
                                                pageable: true,
                                                sortable: true,
                                                navigatable: true,
                                                resizable: true,
                                                reorderable: true,
                                                groupable: true,
                                                filterable: true,
                                                dataBound: onDataBound,
                                                toolbar: ["excel", "pdf", "search"],
                                                columns: [{
                                                        selectable: true,
                                                        width: 75,
                                                        attributes: {
                                                            "class": "checkbox-align",
                                                        },
                                                        headerAttributes: {
                                                            "class": "checkbox-align",
                                                        }
                                                    }, {
                                                        field: "ProductName",
                                                        title: "Product Name",
                                                        template: "<div class='product-photo' style='background-image: url(../content/web/foods/#:data.ProductID#.jpg);'></div><div class='product-name'>#: ProductName #</div>",
                                                        width: 300
                                                    }, {
                                                        field: "UnitPrice",
                                                        title: "Price",
                                                        format: "{0:c}",
                                                        width: 105
                                                    }, {
                                                        field: "Discontinued",
                                                        title: "In Stock",
                                                        template: "<span id='badge_#=ProductID#' class='badgeTemplate'></span>",
                                                        width: 130,
                                                    }, {
                                                        field: "Category.CategoryName",
                                                        title: "Category",
                                                        editor: clientCategoryEditor,
                                                        groupHeaderTemplate: "Category: #=data.value#, Total Sales: #=kendo.format('{0:c}', aggregates.TotalSales.sum)#",
                                                        width: 125
                                                    }, {
                                                        field: "CustomerRating",
                                                        title: "Rating",
                                                        template: "<input id='rating_#=ProductID#' data-bind='value: CustomerRating' class='rating'/>",
                                                        editable: returnFalse,
                                                        width: 200
                                                    }, {
                                                        field: "Country.CountryNameLong",
                                                        title: "Country",
                                                        template: "<div class='k-text-center'><img src='../content/web/country-flags/#:data.Country.CountryNameShort#.png' alt='Kendo UI for jQuery Grid #: data.Country.CountryNameLong# Flag' title='#: data.Country.CountryNameLong#' width='30' /></div>",
                                                        editor: clientCountryEditor,
                                                        width: 120
                                                    }, {
                                                        field: "UnitsInStock",
                                                        title: "Units",
                                                        width: 105
                                                    }, {
                                                        field: "TotalSales",
                                                        title: "Total Sales",
                                                        format: "{0:c}",
                                                        width: 140,
                                                        aggregates: ["sum"],
                                                    }, {
                                                        field: "TargetSales",
                                                        title: "Target Sales",
                                                        format: "{0:c}",
                                                        template: "<span id='chart_#= ProductID#' class='sparkline-chart'></span>",
                                                        width: 220
                                                    },
                                                    {
                                                        command: "destroy",
                                                        title: "&nbsp;",
                                                        width: 120
                                                    }
                                                ],
                                            });
                                        });

                                        function onDataBound(e) {
                                            var grid = this;
                                            grid.table.find("tr").each(function() {
                                                var dataItem = grid.dataItem(this);
                                                var themeColor = dataItem.Discontinued ? 'success' : 'error';
                                                var text = dataItem.Discontinued ? 'available' :
                                                'not available';

                                                $(this).find(".badgeTemplate").kendoBadge({
                                                    themeColor: themeColor,
                                                    text: text,
                                                });

                                                $(this).find(".rating").kendoRating({
                                                    min: 1,
                                                    max: 5,
                                                    label: false,
                                                    value: dataItem.CustomerRating,
                                                    selection: "continuous"
                                                });

                                                $(this).find(".sparkline-chart").kendoSparkline({
                                                    legend: {
                                                        visible: false
                                                    },
                                                    data: [dataItem.TargetSales],
                                                    type: "bar",
                                                    chartArea: {
                                                        margin: 0,
                                                        width: 180,
                                                        background: "transparent"
                                                    },
                                                    seriesDefaults: {
                                                        labels: {
                                                            visible: true,
                                                            format: '{0}%',
                                                            background: 'none'
                                                        }
                                                    },
                                                    categoryAxis: {
                                                        majorGridLines: {
                                                            visible: false
                                                        },
                                                        majorTicks: {
                                                            visible: false
                                                        }
                                                    },
                                                    valueAxis: {
                                                        type: "numeric",
                                                        min: 0,
                                                        max: 130,
                                                        visible: false,
                                                        labels: {
                                                            visible: false
                                                        },
                                                        minorTicks: {
                                                            visible: false
                                                        },
                                                        majorGridLines: {
                                                            visible: false
                                                        }
                                                    },
                                                    tooltip: {
                                                        visible: false
                                                    }
                                                });

                                                kendo.bind($(this), dataItem);
                                            });
                                        }

                                        function returnFalse() {
                                            return false;
                                        }

                                        function clientCategoryEditor(container, options) {
                                            $('<input required name="Category">')
                                                .appendTo(container)
                                                .kendoDropDownList({
                                                    autoBind: false,
                                                    dataTextField: "CategoryName",
                                                    dataValueField: "CategoryID",
                                                    dataSource: {
                                                        data: categories
                                                    }
                                                });
                                        }

                                        function clientCountryEditor(container, options) {
                                            $('<input required name="Country">')
                                                .appendTo(container)
                                                .kendoDropDownList({
                                                    dataTextField: "CountryNameLong",
                                                    dataValueField: "CountryNameShort",
                                                    template: "<div class='dropdown-country-wrap'><img src='../content/web/country-flags/#:CountryNameShort#.png' alt='Kendo UI for jQuery Grid #: CountryNameLong# Flag' title='#: CountryNameLong#' width='30' /><span>#:CountryNameLong #</span></div>",
                                                    dataSource: {
                                                        transport: {
                                                            read: {
                                                                url: " https://demos.telerik.com/service/v2/core/countries"
                                                            }
                                                        }
                                                    },
                                                    autoWidth: true
                                                });
                                        }

                                        var categories = [{
                                            "CategoryID": 1,
                                            "CategoryName": "Beverages"
                                        }, {
                                            "CategoryID": 2,
                                            "CategoryName": "Condiments"
                                        }, {
                                            "CategoryID": 3,
                                            "CategoryName": "Confections"
                                        }, {
                                            "CategoryID": 4,
                                            "CategoryName": "Dairy Products"
                                        }, {
                                            "CategoryID": 5,
                                            "CategoryName": "Grains/Cereals"
                                        }, {
                                            "CategoryID": 6,
                                            "CategoryName": "Meat/Poultry"
                                        }, {
                                            "CategoryID": 7,
                                            "CategoryName": "Produce"
                                        }, {
                                            "CategoryID": 8,
                                            "CategoryName": "Seafood"
                                        }];
                                        </script>
                                        <style type="text/css">
                                        .customer-photo {
                                            display: inline-block;
                                            width: 32px;
                                            height: 32px;
                                            border-radius: 50%;
                                            background-size: 32px 35px;
                                            background-position: center center;
                                            vertical-align: middle;
                                            line-height: 32px;
                                            box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0, 0, 0, .2);
                                            margin-left: 5px;
                                        }

                                        .customer-name {
                                            display: inline-block;
                                            vertical-align: middle;
                                            line-height: 32px;
                                            padding-left: 3px;
                                        }

                                        .k-grid tr .checkbox-align {
                                            text-align: center;
                                            vertical-align: middle;
                                        }

                                        .product-photo {
                                            display: inline-block;
                                            width: 32px;
                                            height: 32px;
                                            border-radius: 50%;
                                            background-size: 32px 35px;
                                            background-position: center center;
                                            vertical-align: middle;
                                            line-height: 32px;
                                            box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0, 0, 0, .2);
                                            margin-right: 5px;
                                        }

                                        .product-name {
                                            display: inline-block;
                                            vertical-align: middle;
                                            line-height: 32px;
                                            padding-left: 3px;
                                        }

                                        .k-rating-container .k-rating-item {
                                            padding: 4px 0;
                                        }

                                        .k-rating-container .k-rating-item .k-icon {
                                            font-size: 16px;
                                        }

                                        .dropdown-country-wrap {
                                            display: flex;
                                            flex-wrap: nowrap;
                                            align-items: center;
                                            white-space: nowrap;
                                        }

                                        .dropdown-country-wrap img {
                                            margin-right: 10px;
                                        }

                                        #grid .k-grid-edit-row>td>.k-rating {
                                            margin-left: 0;
                                            width: 100%;
                                        }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row end -->
            </div>
            <!-- App body ends -->



            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="staticBackdropLabel" style="color:#9ec9f1">
                                <i class="fas fa-user-plus me-2"></i>Alta de Usuario
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <form class="FormularioAjax needs-validation"
                                action="<?= APP_URL; ?>app/ajax/usuarioAjax.php" method="POST"
                                enctype="multipart/form-data" novalidate>

                                <input type="hidden" name="modulo_usuario" value="registrar">

                                <!-- Sección de Información Personal -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="border-bottom pb-2">
                                            <i class="fas fa-id-card me-2"></i>Información Personal
                                        </h5>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label for="nombre" class="form-label">
                                            <i class="fas fa-user me-1"></i>Nombre(s) <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="nombre" name="usuario_nombre"
                                            pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required
                                            placeholder="Ingrese su(s) nombre(s)">
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">
                                            Por favor ingrese un nombre válido (3-40 caracteres, solo letras y espacios)
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="apellido" class="form-label">
                                            <i class="fas fa-user me-1"></i>Apellidos <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="apellido" name="apepat"
                                            pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required
                                            placeholder="Ingrese sus apellidos">
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">
                                            Por favor ingrese apellidos válidos (3-40 caracteres, solo letras y
                                            espacios)
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="apellido" class="form-label">
                                            <i class="fas fa-user me-1"></i>Apellidos <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="apellido" name="apemat"
                                            pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required
                                            placeholder="Ingrese sus apellidos">
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">
                                            Por favor ingrese apellidos válidos (3-40 caracteres, solo letras y
                                            espacios)
                                        </div>
                                    </div>
                                </div>

                                <!-- Sección de Credenciales -->
                                <div class="row mb-4 mt-4">
                                    <div class="col-12">
                                        <h5 class="border-bottom pb-2">
                                            <i class="fas fa-key me-2"></i>Credenciales de Acceso
                                        </h5>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="usuario" class="form-label">
                                            <i class="fas fa-at me-1"></i>Usuario <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text">@</span>
                                            <input type="text" class="form-control" id="usuario" name="usuario_usuario"
                                                pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required
                                                placeholder="Nombre de usuario (4-20 caracteres)">
                                            <div class="valid-feedback">¡Nombre de usuario disponible!</div>
                                            <div class="invalid-feedback">
                                                Por favor ingrese un usuario válido (4-20 caracteres, solo letras y
                                                números)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="correo" class="form-label">
                                            <i class="fas fa-envelope me-1"></i>Correo Electrónico
                                        </label>
                                        <input type="email" class="form-control" id="correo" name="usuario_email"
                                            required maxlength="70" placeholder="ejemplo@correo.com">
                                        <div class="valid-feedback">¡Correo válido!</div>
                                        <div class="invalid-feedback">
                                            Por favor ingrese un correo electrónico válido
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="clave1" class="form-label">
                                            <i class="fas fa-lock me-1"></i>Contraseña <span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="form-control" id="clave1" name="usuario_clave_1"
                                            pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required
                                            placeholder="Mínimo 7 caracteres">
                                        <div class="valid-feedback">¡Contraseña segura!</div>
                                        <div class="invalid-feedback">
                                            La contraseña debe tener al menos 7 caracteres (letras, números o $@.-)
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="clave2" class="form-label">
                                            <i class="fas fa-lock me-1"></i>Confirmar Contraseña <span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="form-control" id="clave2" name="usuario_clave_2"
                                            pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required
                                            placeholder="Repita la contraseña">
                                        <div class="valid-feedback">¡Las contraseñas coinciden!</div>
                                        <div class="invalid-feedback">
                                            Las contraseñas deben coincidir
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="celular" class="form-label">
                                            <i class="fas fa-phone me-1"></i>Teléfono / Celular
                                        </label>
                                        <input type="tel" class="form-control" id="celular" name="usuario_cel"
                                            pattern="[0-9+ ]{7,15}" maxlength="15" required
                                            placeholder="Ej: +51 987 654 321">
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">
                                            Ingrese un número de teléfono válido (7-15 dígitos)
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="rol" class="form-label">
                                            <i class="fas fa-user-tag me-1"></i>Rol <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select" id="rol" name="usuario_rol" required>
                                            <option value="" selected disabled>Seleccione un rol...</option>
                                            <option value="admin">Administrador</option>
                                            <option value="editor">Editor</option>
                                            <option value="usuario">Usuario Regular</option>
                                            <option value="invitado">Invitado</option>
                                        </select>
                                        <div class="valid-feedback">¡Selección correcta!</div>
                                        <div class="invalid-feedback">
                                            Por favor seleccione un rol para el usuario
                                        </div>
                                    </div>
                                </div>

                                <!-- Sección de Menú -->
                                <div class="row mb-4 mt-4 g-3 ">
                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <h5 class="border-bottom pb-2 mb-0">
                                            <i class="fas fa-bars me-2"></i>Permisos de Menú
                                        </h5>
                                        <button type="button" class="btn btn-sm btn-outline-primary"
                                            id="btnAgregarMenu">
                                            <i class="fas fa-plus me-1"></i>Agregar Menú
                                        </button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 ">
                                        <div id="example">
                                            <div class="demo-section wide">
                                                <select id="listboxDisponible"></select>
                                                <select id="listboxAsignado"></select>
                                                <div id="appendto"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Sección de Imagen -->
                                <div class="row mb-4 mt-4">
                                    <div class="col-12">
                                        <h5 class="border-bottom pb-2">
                                            <i class="fas fa-image me-2"></i>Imagen de Perfil
                                        </h5>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="fotoPerfil" class="form-label">
                                            <i class="fas fa-camera me-1"></i>Seleccionar Foto
                                        </label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="fotoPerfil" name="usuario_foto"
                                                accept=".jpg, .png, .jpeg">
                                            <label class="input-group-text" for="fotoPerfil">
                                                <i class="fas fa-upload"></i>
                                            </label>
                                        </div>
                                        <small class="form-text text-muted">
                                            Formatos aceptados: JPG, JPEG, PNG. Tamaño máximo: 5MB
                                        </small>
                                        <div class="preview-container mt-2 text-center">
                                            <img id="previewImagen"
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='150' height='150' viewBox='0 0 150 150'%3E%3Crect width='150' height='150' fill='%23e9ecef'/%3E%3Ctext x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' font-family='Arial' font-size='14' fill='%236c757d'%3EPrevisualización%3C/text%3E%3C/svg%3E"
                                                alt="Previsualización" class="img-thumbnail" style="max-width: 150px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info mt-4">
                                            <h6><i class="fas fa-info-circle me-2"></i>Requisitos de la imagen:</h6>
                                            <ul class="mb-0">
                                                <li>Formato: JPG, PNG o JPEG</li>
                                                <li>Tamaño máximo: 5MB</li>
                                                <li>Resolución recomendada: 300x300 px</li>
                                                <li>Fondo claro para mejor visualización</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <!-- Campo oculto para menú seleccionado -->
                                <input type="hidden" name="usuario_menu" id="usuario_menu">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i>Cerrar
                            </button>
                            <button type="button" class="btn btn-secondary"
                                onclick="document.querySelector('form').reset();">
                                <i class="fas fa-broom me-1"></i>Limpiar
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Guardar
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Modal -->

            <!-- Modal para agregar nuevo menú -->
            <div class="modal fade" id="modalAgregarMenu" tabindex="-1" aria-labelledby="modalAgregarMenuLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-white">
                            <h5 class="modal-title" id="modalAgregarMenuLabel">
                                <i class="fas fa-plus-circle me-2"></i>Agregar Nuevo Menú
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="rutaMenu" class="form-label">Ruta <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="rutaMenu" required
                                    placeholder="Ej: /dashboard, /usuarios, /reportes">
                            </div>
                            <div class="mb-3">
                                <label for="nombreMenu" class="form-label">Nombre del Menú <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nombreMenu" required
                                    placeholder="Ej: Dashboard, Usuarios, Reportes">
                            </div>
                            <div class="mb-3">
                                <label for="iconoMenu" class="form-label">Icono <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="iconoMenu" required
                                    placeholder="Ej: fas fa-home, fas fa-users, fas fa-chart-bar">
                                <small class="form-text text-muted">
                                    Usar clases de FontAwesome (ej: fas fa-home)
                                </small>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="btnGuardarMenu">Guardar Menú</button>
                        </div>
                    </div>
                </div>
            </div>


            <script>
            $(document).ready(function() {
                // Validación del formulario Bootstrap
                var menusJSON = [];
                // Previsualización de imagen
                $('#fotoPerfil').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewImagen').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                });

                // Modal para agregar menú
                $('#btnAgregarMenu').click(function() {
                    $('#modalAgregarMenu').modal('show');
                });

                // Inicializar ListBoxes
                var notification = $("#appendto").kendoNotification({
                    autoHideAfter: 4000,
                    animation: {
                        open: {
                            effects: "fade:in"
                        },
                        close: {
                            effects: "none"
                        }
                    }
                }).data("kendoNotification");

                // Datos de ejemplo para menús
                var menuData = [{
                        id: 1,
                        ruta: "dashboard",
                        nombre: "Dashboard",
                        icono: "fas fa-home"
                    },
                    {
                        id: 2,
                        ruta: "userNew",
                        nombre: "Usuarios",
                        icono: "fas fa-users"
                    },
                    {
                        id: 3,
                        ruta: "logOut",
                        nombre: "Cerrar Sesión",
                        icono: "fas fa-sign-out-alt"
                    }
                ];

                var listboxDisponible = $("#listboxDisponible").kendoListBox({
                    dataTextField: "nombre",
                    dataValueField: "id",
                    dataSource: menuData,
                    connectWith: "listboxAsignado",
                    template: '<div class="menu-item">' +
                        '<i class="#= icono # me-2"></i>' +
                        '<span>#= nombre #</span>' +
                        '<small class="text-muted d-block">#= ruta #</small>' +
                        '</div>',
                    draggable: {
                        placeholder: customPlaceholder
                    },
                    toolbar: {
                        position: "right",
                        tools: ["transferTo", "transferFrom", "transferAllFrom", "remove"]
                    }

                }).data("kendoListBox");

                var listboxAsignado = $("#listboxAsignado").kendoListBox({
                    dataTextField: "nombre",
                    dataValueField: "id",
                    dataSource: [],
                    template: '<div class="menu-item">' +
                        '<i class="#= icono # me-2"></i>' +
                        '<span>#= nombre #</span>' +
                        '<small class="text-muted d-block">#= ruta #</small>' +
                        '</div>',
                    draggable: {
                        placeholder: customPlaceholder
                    },
                    add: onAdd,
                    remove: onRemove,

                }).data("kendoListBox");

                // Botones de control del ListBox

                function onAdd(e) {
                    
                    var selectedListBox = $("#listboxAsignado").data("kendoListBox");
                    var dataItems = selectedListBox.dataItems();
                    
                    console.log(dataItems.length);
                      // Recorrer todos los elementos

                    

                    e.dataItems.forEach(function(item, index) {
                        console.log(`Elemento ${index + 1}:`);
                        console.log("  ID:", item.id);
                        console.log("  Nombre:", item.nombre);
                        console.log("  Ruta:", item.ruta);
                        console.log("  Icono:", item.icono);
                        
                        // Agregar al array JSON
                        menusJSON.push({
                            ruta: item.ruta || "",
                            nombre: item.nombre || "",
                            icono: item.icono || ""
                        });
                    });

                    $('#usuario_menu').val(JSON.stringify(menusJSON));
                    console.log("JSON generado:", JSON.stringify(menusJSON, null, 2));


                }


           
   


                function onRemove(e) {
                    console.log("remove : " + getWidgetName(e) + " : " + e.dataItems.length + " item(s)");
                };

                function customPlaceholder(draggedItem) {
                    return draggedItem
                        .clone()
                        .addClass("custom-placeholder")
                        .removeClass("k-ghost");
                }


                // Agregar nuevo menú
                $("#btnGuardarMenu").click(function() {
                    var ruta = $("#rutaMenu").val();
                    var nombre = $("#nombreMenu").val();
                    var icono = $("#iconoMenu").val();

                    if (ruta && nombre && icono) {
                        var nuevoId = menuData.length + 1;
                        var nuevoMenu = {
                            id: nuevoId,
                            ruta: ruta,
                            nombre: nombre,
                            icono: icono
                        };

                        menuData.push(nuevoMenu);
                        listboxDisponible.dataSource.read();

                        $("#rutaMenu").val('');
                        $("#nombreMenu").val('');
                        $("#iconoMenu").val('');

                        $('#modalAgregarMenu').modal('hide');
                        showAlert('Menú agregado correctamente', 'success');
                    } else {
                        showAlert('Complete todos los campos del menú', 'danger');
                    }
                });
                // Función para actualizar campo oculto con menús seleccionados
                function actualizarCampoMenu() {
                    var menus = listboxAsignado.dataItems();
                    var ids = menus.map(function(item) {
                        return item.id;
                    });
                    

                    // También puedes mostrar la cantidad seleccionada
                    var cantidad = ids.length;
                    $('#contadorMenus').remove();
                    if (cantidad > 0) {
                        $('h5:contains("Permisos de Menú")').append(
                            '<span id="contadorMenus" class="badge bg-primary ms-2">' + cantidad +
                            ' seleccionados</span>');
                    }
                }

                // Escuchar cambios en los ListBox
                listboxDisponible.bind("change", actualizarCampoMenu);
                listboxAsignado.bind("change", actualizarCampoMenu);
                listboxDisponible.bind("dragend", actualizarCampoMenu);
                listboxAsignado.bind("dragend", actualizarCampoMenu);

                // Función para validar formulario (usada por el botón del modal footer)
                function validarFormulario() {
                    var form = $('.FormularioAjax')[0];
                    form.dispatchEvent(new Event('submit'));
                }

                // Inicializar contador de menús
                actualizarCampoMenu();

            });
            </script>