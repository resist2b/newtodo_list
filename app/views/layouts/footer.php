</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<!-- moment -->
<script src="<?= base_url() ?>assets/js/moment.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/tooltip.js"></script>
<!-- bootbox -->
<script src="<?= base_url() ?>assets/js/bootbox.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?= base_url() ?>assets/js/metisMenu.min.js"></script>


<!-- Datejs » Getting Started With Datejs - An open-source JavaScript Date Library -->
<script type='text/javascript' src='<?= base_url() ?>assets/Datejs-master/globalization/en-US.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/Datejs-master/core.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/Datejs-master/sugarpak.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/Datejs-master/parser.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/Datejs-master/time.js'></script>

<!-- DataTables JavaScript -->
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?= base_url() ?>assets/js/sb-admin-2.js"></script>
<!-- 
Bootstrap 3 Datepicker
https://eonasdan.github.io/bootstrap-datetimepicker/ 
-->

<script src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.js"></script>
<!--<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.en-GB.js"></script>-->

<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script>
    $(document).ready(function () {



//http://bootsnipp.com/snippets/featured/bootstrap-snipp-for-datatable
        $("#mytable #checkall").click(function () {
            if ($("#mytable #checkall").is(':checked')) {
                $("#mytable input[type=checkbox]").each(function () {
                    $(this).prop("checked", true);
                });

            } else {
                $("#mytable input[type=checkbox]").each(function () {
                    $(this).prop("checked", false);
                });
            }
        });

        $("[data-toggle=tooltip]").tooltip();
        // end of  //http://bootsnipp.com/snippets/featured/bootstrap-snipp-for-datatable
    });
</script>

<!-- Bootstrap 3 Datepicker -->
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    //Y-m-d h:i:s
                    format: 'YYYY-MM-DD  H:mm'
                });
            });
        </script>



</body>

</html>
