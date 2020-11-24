<script>
    let tablaInscripcionMesas = $('#tablaInscripcionMesas').DataTable({
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
            'url': '<?php echo URL_ROOT; ?>/inscripcionmesa/getMesasFinalesHasUserDt',
        },
        'columns': [{
                data: 'key',
                'orderable': false,
                'responsivePriority': 1001,
            },
            {
                data: 'materia',
                'orderable': true,
                'responsivePriority': 1,
            },
            {
                data: 'aula',
                'orderable': true,
            },
            {
                data: 'fecha',
                'orderable': true,
            },
            {
                defaultContent: "<button type='button' class='btn btn-success btn-xs inscribir'> <i class='fas fa-check-double'></i> Inscribirme</button>",
                'orderable': false,
                'responsivePriority': 2,
            },
        ],
        'columnDefs': [{
            targets: [5],
            visible: false,
            searchable: false,
            data: 'id'
        }, ]

    });
    
    /**Acciones Botón Inscribir */
    $('#tablaInscripcionMesas tbody').on('click', 'button.inscribir', function() {
        let data = tablaInscripcionMesas.row($(this).parents("tr")).data();
        /**Asignamos el id al Hidden id */
        $('#modalInscribir #id').val(data.id);
        $('#modalInscribir #fecha').html( "Mesa Fecha con Fecha: "+data.fecha );
        $('#modalInscribir #materia').html( "De la Materia: "+data.materia );
        /**Abrimos el Modal */
        $('#modalInscribir').modal('show');
    });
</script>