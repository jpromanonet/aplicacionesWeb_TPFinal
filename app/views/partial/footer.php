<script src="<?php echo URL_ROOT; ?>/jquery/jquery-3.5.1.min.js"></script>
<!-- JS Bootstrap -->
<script src="<?php echo URL_ROOT; ?>/js/popper.min.js"></script>
<script src="<?php echo URL_ROOT; ?>/js/bootstrap.min.js"></script>
<!-- JS Select2 -->
<script src="<?php echo URL_ROOT; ?>/js/select2.min.js"></script>
<!-- Check JS Datatables -->
<?php
if (isset($data['dataTables'])) {
    require_once APP_ROOT . "/views/partial/js/jsDataTables.php";
}
?>
<script src="<?php echo URL_ROOT; ?>/js/main.js"></script>
<script>
$('#carrera').on("change", function (e) {
    let carrera = $('#carrera').val();
    let usuario = $('#usuario_id').val()
    $('#materias').select2({
        theme: 'bootstrap4',
        ajax: {
            url: "<?php echo URL_ROOT ?>/materiausuario/getMateriasByCarreraNotHasUsuario",
            type: "get",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    carrera_id:carrera,
                    usuario_id:usuario
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        },
    });
});
</script>
</body>

</html>