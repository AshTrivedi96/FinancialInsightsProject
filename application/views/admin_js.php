	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		function stock(trigger_value, i) {

			let stock_category = $("#stock_category").val();
			var main_stock_value = trigger_value;
			let to_delete = 0;
			if ($("#admin_stock_checkbox" + i).prop('checked') == false) {
				to_delete = 1;
			} else {
				to_delete = 0;
			}

			href = "<?php echo base_url(); ?>index.php/admin_stock/save_stock";
			console.log(main_stock_value);
			if (stock_category != '') {
				$.ajax({

					url: href,
					type: 'post',
					data: {
						top_stock_value: main_stock_value,
						category: stock_category,
						to_delete: to_delete
					},
					success: function(data) {
						console.log(data);
					}

				});
			} else {
				if ($("#admin_stock_checkbox" + i).prop('checked') == true) {
					swal("error", "Please Select Category", "error");
					$("#admin_stock_checkbox" + i).prop('checked', false);
				}
			}
		}
	</script>
	<script type="text/javascript">
		intialized = {};
			$(document).ready(function() {
			loadTab('trading');

			$("#stock_category").on('change', function() {
				let stock_category = $("#stock_category").val();
				let href = "<?php echo base_url(); ?>index.php/admin_stock/load_stock";
				$(".admin_stock_checkbox").each(function() {

					$(this).prop('checked', false);

				});

				$.ajax({

					url: href,
					type: 'post',
					data: {
						category: stock_category
					},
					success: function(data) {
						console.log(data);
						let response = JSON.parse(data);
						let cat_length = Object.keys(response.category_stocks).length;

						for (i = 0; i < cat_length; i++) {
							$(".admin_stock_checkbox").each(function() {

								if (response.category_stocks[i].shortname == $(this).val()) {
									$(this).prop('checked', true);
								}

							})
						}
					}
				});

			});
		});

		function loadTab(category) {
			if (!(category in intialized)) {
				$('#' + category + '_table').DataTable({
					"columnDefs": [{
							"targets": [4, 5],
							render: function(data, type, full, meta) {
								if (type === 'display' && data < 0) {
									return '<span class="lightRed">' + data + '</span>';
								} else {
									return '<span class="lightGreen">' + data + '</span>';
								}
							}
						},
						{
							"targets": 3,
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
						url: "<?php echo base_url(); ?>index.php/admin_stock/get_datatable?category=" + category,
						type: 'POST'
					},
				});
				intialized[category] = 1;
			}
		}

		function openTab(evt, tabId) {
			loadTab(tabId);
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(tabId).style.display = "block";
			evt.currentTarget.className += " active";
		}
		document.getElementById("defaultOpen").click();
	</script>