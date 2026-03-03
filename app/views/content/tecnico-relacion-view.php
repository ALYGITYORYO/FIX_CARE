<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5 class="fw-bold mb-4"><i class="ri-user-settings-line me-2"></i>Asignar Técnico a Organizaciones</h5>
        
        <form class="FormularioAjax" action="<?= APP_URL; ?>app/ajax/organizacionAjax.php" method="POST">
            <input type="hidden" name="modulo_organizacion" value="registrar_relacion_tecnico">
            
            <div class="row g-3">
                <div class="col-md-5">
                    <label class="form-label fw-bold">Seleccionar Técnico</label>
                    <select name="id_tecnico" id="selectTecnico" class="form-select" required>
                        <option value="">Seleccione un técnico...</option>
                        </select>
                </div>

                <div class="col-md-7">
                    <label class="form-label fw-bold">Organizaciones Autorizadas</label>
                    <select id="multiOrganizaciones" name="organizaciones_asignadas[]" multiple="multiple" data-placeholder="Seleccione organizaciones...">
                    </select>
                </div>

                <div class="col-12 text-end mt-4">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 shadow">
                        <i class="ri-save-3-line me-1"></i> Guardar Relación
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
    // 1. Cargar Técnicos al Select
    async function obtenerTecnicos() {
        // Asumiendo que tienes un endpoint para listar usuarios por rol
        const response = await fetch('<?=APP_URL; ?>app/ajax/usuarioAjax.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'modulo_usuario=obtener_tecnicos' 
        });
        const tecnicos = await response.json();
        tecnicos.forEach(t => {
            $('#selectTecnico').append(`<option value="${t.id}">${t.nombre} ${t.apepat} (${t.user})</option>`);
        });
    }

    // 2. Inicializar Kendo MultiSelect para Organizaciones
    async function inicializarMultiSelect() {
        const response = await fetch('<?=APP_URL; ?>app/ajax/organizacionAjax.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'modulo_organizacion=obtener_organizaciones'
        });
        const orgs = await response.json();

        $("#multiOrganizaciones").kendoMultiSelect({
            dataTextField: "nombre",
            dataValueField: "id",
            dataSource: orgs,
            tagTemplate: '<span class="selected-value"></span><span>#:data.nombre#</span>',
            autoClose: false
        });
    }

    // 3. (Opcional) Cargar asignaciones actuales al cambiar de técnico
    $('#selectTecnico').change(async function() {
        const id = $(this).val();
        if(!id) return;
        
        const res = await fetch('<?=APP_URL; ?>app/ajax/organizacionAjax.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `modulo_organizacion=obtener_relaciones_tecnico&id_tecnico=${id}`
        });
        const asignadas = await res.json(); // Debe devolver array de IDs: [7, 8]
        
        const multi = $("#multiOrganizaciones").data("kendoMultiSelect");
        multi.value(asignadas);
    });

    obtenerTecnicos();
    inicializarMultiSelect();
});

</script>