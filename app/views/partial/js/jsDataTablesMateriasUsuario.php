<script>
    let usuario_id = $('#usuario_id').val();
    let tablaMateriasUsuario = $('#tablaMateriasUsuario').DataTable({
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
                text: '<i class="fas fa-file-excel"></i>',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                //Botón para CSV
                extend: 'csvHtml5',
                title: 'CSV',
                filename: 'ExportCSV',
                className: 'btn btn-warning',
                text: '<i class="fas fa-file-csv"></i>',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                //Botón para PDF
                extend: 'pdfHtml5',
                title: 'PDF',
                filename: 'ExportPDF',
                className: 'btn btn-danger',
                text: '<i class="far fa-file-pdf"></i>',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }

            },
            {
                //Botón para Copiar a Portapapeles
                extend: 'copyHtml5',
                title: 'Portapapeles',
                className: 'btn btn-secondary',
                text: '<i class="fas fa-copy"></i>',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                //Botón para Imprimir
                extend: 'print',
                //orientation: 'landscape',
                title: 'Imprimir',
                className: 'btn btn-dark',
                text: '<i class="fas fa-print"></i>',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
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
        ], //Orden por DEFAULT Columna Materia
        'processing': true,
        'serverSide': true,
        'responsive': true,
        'serverMethod': 'GET',
        'ajax': {
            'url': '<?php echo URL_ROOT; ?>/materiausuario/getMateriasUsuarioDataTables',
            'data':{
            'usuario_id':usuario_id,
        },
        },
        'columns': [{
                data: 'key',
                'orderable': false,
                'responsivePriority': 1001,
            },
            {
                data: 'nombre',
                'orderable': true,
                'responsivePriority': 1,
            },
            {
                data: 'created_at',
                'orderable': true,
            },
            {
                defaultContent: "<button type='button' class='btn btn-danger btn-xs destroy'> <i class='fas fa-trash-alt'></i></button>",
                'orderable': false,
                'responsivePriority': 2,
            },
        ],
        'columnDefs': [{
            targets: [4],
            visible: false,
            searchable: false,
            data: 'id'
        }, ]

    });
    /**Acciones Botón Eliminar */
    $('#tablaMateriasUsuario tbody').on('click', 'button.destroy', function() {
        let data = tablaMateriasUsuario.row($(this).parents("tr")).data();
        /**Asignamos el id al Hidden id */
        $('#modalEliminar #id').val(data.id);
        /**Abrimos el Modal */
        $('#modalEliminar').modal('show');
    });
</script>