</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?= base_url() ?>assets/js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?= base_url() ?>assets/js/sb-admin-2.js"></script>
<!--bootstrap-datepicker.js-->
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.js"></script>
<!--<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.en-GB.js"></script>-->

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        
  //datepicker
  


$('.datepicker').datepicker();
$(".datepicker").on("changeDate", function(event) {
    $("#my_hidden_input").val(
        $(".datepicker").datepicker('getFormattedDate')
     )
});

  //edn datepicker

    });
</script>



</body>

</html>
