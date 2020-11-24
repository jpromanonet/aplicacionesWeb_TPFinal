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
<?php
require_once APP_ROOT . "/views/partial/js/jsDataTables{$data['dataTables']}.php";
?>