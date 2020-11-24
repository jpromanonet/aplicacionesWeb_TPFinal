<!-- JS Datatables -->
<script src="<?php echo URL_ROOT; ?>/dataTables/dataTables/js/jquery.dataTables.js"></script>
<script src="<?php echo URL_ROOT; ?>/dataTables/dataTables/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo URL_ROOT; ?>/dataTables/buttons/js/dataTables.buttons.js"></script>
<script src="<?php echo URL_ROOT; ?>/dataTables/buttons/js/buttons.bootstrap4.js"></script>
<script src="<?php echo URL_ROOT; ?>/dataTables/JSZip/jszip.js"></script>
<script src="<?php echo URL_ROOT; ?>/dataTables/pdfMake/pdfmake.js"></script>
<script src="<?php echo URL_ROOT; ?>/dataTables/pdfMake/vfs_fonts.js"></script>
<script src="<?php echo URL_ROOT; ?>/dataTables/buttons/js/buttons.html5.js"></script>
<script src="<?php echo URL_ROOT; ?>/dataTables/buttons/js/buttons.colVis.js"></script>
<script src="<?php echo URL_ROOT; ?>/dataTables/buttons/js/buttons.print.js"></script>
<script src="<?php echo URL_ROOT; ?>/dataTables/responsive/js/dataTables.responsive.js"></script>
<script src="<?php echo URL_ROOT; ?>/dataTables/responsive/js/responsive.bootstrap4.js"></script>
<script>
    var tablaUsuarios = $('#tablaUsuarios').DataTable({
        'language': {
            'url': '<?php echo URL_ROOT; ?>/dataTables/Spanish.json'
        },
        'lengthMenu': [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, 'Todos']
        ],
        dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B> <'col-sm-12 col-md-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [{
                //Botón para Excel
                extend: 'excelHtml5',
                title: 'Excel',
                filename: 'ExportExcel',
                className: 'btn btn-success',
                text: '<i class="fas fa-file-excel"></i>'
            },
            {
                //Botón para CSV
                extend: 'csvHtml5',
                title: 'CSV',
                filename: 'ExportCSV',
                className: 'btn btn-warning',
                text: '<i class="fas fa-file-csv"></i>'
            },
            {
                //Botón para PDF
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                title: 'PDF',
                filename: 'ExportPDF',
                className: 'btn btn-danger',
                text: '<i class="far fa-file-pdf"></i>'
            },
            {
                //Botón para Copiar a Portapapeles
                extend: 'copyHtml5',
                title: 'Portapapeles',
                className: 'btn btn-secondary',
                text: '<i class="fas fa-copy"></i>'
            },
            {
                //Botón para Imprimir
                extend: 'print',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                title: 'Imprimir',
                className: 'btn btn-dark',
                text: '<i class="fas fa-print"></i>'
            },
            {
                //Botón para Ocultar Columnas
                extend: 'colvis',
                title: 'Ocultar',
                className: 'btn btn-info',
                text: '<i class="fas fa-eye-slash"></i>'
            }
        ],
        "order": [
            [1, "ASC"]
        ], //Orden por DEFAULT Columna Apellido
        'processing': true,
        'serverSide': true,
        'serverMethod': 'POST',
        'ajax': {
            'url': '<?php echo URL_ROOT; ?>/usuario/getUsuariosDataTables',
            'data': {
                '<?php echo CSRF_TOKEN_NAME ?>': '<?php echo getCsrf(); ?>',
            },
        },
        'columns': [{
                data: 'key',
                'orderable': false,
            },
            {
                data: 'apellido',
                'orderable': true,
            },
            {
                data: 'nombre',
                'orderable': true,
            },
            {
                data: 'dni',
                'orderable': true,
            },
            {
                data: 'email',
                'orderable': true,
            },
            {
                data: 'rol',
                'orderable': true,
            },
            {
                defaultContent: "<button name='edit' id='edit' type='button' class='btn btn-success btn-xs '> <i class='fas fa-user-edit'></i></button> <button name='destroy' id='destroy' type='button' class='btn btn-danger btn-xs '> <i class='fas fa-trash-alt'></i></button>",
                'orderable': false,
            },
        ],
        'columnDefs': [{
            targets: [7],
            visible: false,
            searchable: false,
            data: 'id'
        }, ]

    });
    /**Acciones Botón Editar */
    $('#tablaUsuarios tbody').on('click', '#edit', function() {
        var data = tablaUsuarios.row($(this).parents("tr")).data();
        /**Redirigimos al formulario de Edición con el id */
        $(location).attr('href','<?php echo URL_ROOT; ?>/usuario/edit/' + data.id);
    });
    /**Acciones Botón Eliminar */
    $('#tablaUsuarios tbody').on('click', '#destroy', function() {
        var data = tablaUsuarios.row($(this).parents("tr")).data();
        console.log(data);
        /**Asignamos el id al Hidden id */
        $('#modalEliminar #id').val(data.id);
        /**Abrimos el Modal */
        $('#modalEliminar').modal('show');
    });
</script>