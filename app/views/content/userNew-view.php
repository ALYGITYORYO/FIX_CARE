
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
                                        <h4 class="display-5 fw-bold mb-0"> <!-- fw-bold para más grueso -->
                                            Usuarios
                                        </h4>
                                    </div>
                                    <!-- Botón en la misma línea -->
                                    <div>
                                        <button type="button" class="btn btn-lg btn-light" data-bs-toggle="modal"
                      data-bs-target="#staticBackdrop">
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
                                $(document).ready(function () {
                                    var crudServiceBaseUrl = "https://demos.telerik.com/service/v2/core",
                                        dataSource = new kendo.data.DataSource({
                                            transport: {
                                                read: {
                                                    url: crudServiceBaseUrl + "/detailproducts"
                                                },
                                                update: {
                                                    url: crudServiceBaseUrl + "/detailproducts/Update",
                                                    type: "POST",
                                                    contentType: "application/json"
                                                },
                                                destroy: {
                                                    url: crudServiceBaseUrl + "/detailproducts/Destroy",
                                                    type: "POST",
                                                    contentType: "application/json"
                                                },
                                                parameterMap: function (options, operation) {
                                                    if (operation !== "read" && options.models) {
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
                                                aggregates: [
                                                    { field: "TotalSales", aggregate: "sum" }
                                                ]
                                            },
                                            schema: {
                                                model: {
                                                    id: "ProductID",
                                                    fields: {
                                                        ProductID: { editable: false, nullable: true },
                                                        Discontinued: { type: "boolean", editable: false },
                                                        TotalSales: { type: "number", editable: false },
                                                        TargetSales: { type: "number", editable: false },
                                                        LastSupply: { type: "date" },
                                                        UnitPrice: { type: "number" },
                                                        UnitsInStock: { type: "number" },
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
                                        { command: "destroy", title: "&nbsp;", width: 120 }],
                                    });
                                });

                                function onDataBound(e) {
                                    var grid = this;
                                    grid.table.find("tr").each(function () {
                                        var dataItem = grid.dataItem(this);
                                        var themeColor = dataItem.Discontinued ? 'success' : 'error';
                                        var text = dataItem.Discontinued ? 'available' : 'not available';

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
                                                minorTicks: { visible: false },
                                                majorGridLines: { visible: false }
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
                                    box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
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
                                    box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
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

                                #grid .k-grid-edit-row > td > .k-rating {
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
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                              Alta de ususario
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">

<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off" enctype="multipart/form-data" >

		<input type="hidden" name="modulo_usuario" value="registrar">

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nombres</label>
				  	<input class="input" type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Apellidos</label>
				  	<input class="input" type="text" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input class="input" type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Email</label>
				  	<input class="input" type="email" name="usuario_email" maxlength="70" >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Clave</label>
				  	<input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Repetir clave</label>
				  	<input class="input" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
				<div class="file has-name is-boxed">
					<label class="file-label">
						<input class="file-input" type="file" name="usuario_foto" accept=".jpg, .png, .jpeg" >
						<span class="file-cta">
							<span class="file-label">
								Seleccione una foto
							</span>
						</span>
						<span class="file-name">JPG, JPEG, PNG. (MAX 5MB)</span>
					</label>
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">
			<button type="reset" class="button is-link is-light is-rounded">Limpiar</button>
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>



                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                              Close
                            </button>
                            <button type="button" class="btn btn-primary">
                              Understood
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
  <!--END Modal -->

