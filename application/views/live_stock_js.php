 	
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
$(document).ready(function() {
    $('#live_stock_table').DataTable({
    	"pageLength": 50,
        "ajax": {
            url : "<?php echo base_url(); ?>index.php/live_stock/get_datatable",
            type : 'POST'
        },
    });
});
</script>
