 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
 	<script type="text/javascript">
 	    $(document).ready(function() {
 	        $('#financial_data_table').DataTable({
 	            "columnDefs": [{
 	                    "targets": [5],
 	                    "visible": true,
 	                    "searchable": true
 	                },
 	                {
 	                    "targets": [3, 4],
 	                    render: function(data, type, full, meta) {
 	                        if (type === 'display' && data < 0) {
 	                            return '<span class="lightRed">' + data + '</span>';
 	                        } else {
 	                            return '<span class="lightGreen">' + data + '</span>';
 	                        }
 	                    }
 	                },
 	                {
 	                    "targets": 2,
 	                    render: function(data, type, full, meta) {
 	                        return '$' + data;
 	                    }
 	                }
 	            ],
 	            "ordering": true,
 	            "info": false,
 	            "paging": false,
 	            "autoWidth": true,
 	            "pageLength": 10,
 	            "ajax": {
 	                url: "<?php echo base_url(); ?>index.php/financial_data/get_datatable",
 	                type: 'POST'
 	            },
 	            initComplete: function() {
 	                this.api().columns().every(function() {

 	                    var column = this;
 	                    if (column[0] == 5) {
 	                        var select = $('<select></select>')
 	                            .appendTo($(column.header()).empty())
 	                            .on('change', function() {
 	                                var val = $.fn.dataTable.util.escapeRegex(
 	                                    $(this).val()
 	                                );

 	                                column
 	                                    .search(val ? '^' + val + '$' : '', true, false)
 	                                    .draw();
 	                            });

 	                        column.data().unique().sort().each(function(d, j) {
 	                            select.append('<option ' + ((d == 'actives') ? 'selected' : '') + ' value="' + d + '">' + d + '</option>')
 	                        });
 	                        select.change();
 	                    }
 	                });
 	            }
 	        });
 	    });
 	</script>