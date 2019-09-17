<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo SITENAME; ?></title>
	<?php $this->load->view('include/css'); ?>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<?php $this->load->view('include/navbar'); ?>
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<?php $this->load->view('include/sidebar'); ?>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Pegawai</h2>
								<h5 class="text-white op-7 mb-2">Data Pegawai</h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="#" class="btn btn-primary btn-round" data-toggle="modal" data-target="#addModal" class="btn btn-secondary btn-round">Add Pegawai</a>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Data Pegawai</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="datatables" class="display table table-striped table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Username</th>
													<th>Level</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>Username</th>
													<th>Level</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody id="datatables-data"></tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<?php $this->load->view('include/footer'); ?>
			</footer>
		</div>

		<!-- MODAL -->
		<?php $this->load->view('pegawai/modal'); ?>
		<!-- MODAL -->
    </div>
    <!-- JAVASCRIPT -->
    <?php $this->load->view('include/js'); ?>
	<script>
	$(document).ready(function(){
	// CONFIG
		var table;
		table = $("#datatables").DataTable({
			"ajax"			: "<?php echo base_url('pegawai/data') ?>",
			"processing"	: true,
			"deferRender"	: true,
		});
		$('.datepicker').datepicker({
			format: "yyyy-mm-dd",
			todayHighlight: true,
			autoclose: true,
			endDate: "<?php echo date('Y-m-d'); ?>"
		});
		$.getJSON("<?php echo base_url('users/get_users'); ?>", (data) => {
			for(var i=0; i<data.length; i++){
				$(".users").append($('<option>', {value: data[i].kode, text: data[i].username}));
			}
		});
		$.getJSON("<?php echo base_url('globals/get_kota'); ?>", (data) => {
			for(var i=0; i<data.length; i++){
				$(".tempat").append($('<option>', {value: data[i].id, text: data[i].name}));
			}
		});
	// CONFIG

	// CRUD
		// DETAIL DATA
		$("#datatables-data").on("click", "#detail_data", function(){
			var kode = $(this).data("kode");
			$("#updateModal").modal("show");
			$.ajax({
				url			: "<?php echo base_url('pegawai/detail'); ?>",
				type		: "GET",
				dataType	: "JSON",
				data		: {kode:kode},
				success		: (data) => {
					$("#kode").val(data.kode);
					$("#users_update").val(data.users_kode);
					$("#nama_update").val(data.nama);
					$("#jenis_kelamin_update").val(data.jenis_kelamin);
					$("#tempat_update").val(data.tempat);
					$("#tanggal_lahir_update").val(data.tanggal_lahir);
					$("#alamat_update").val(data.alamat);
					$("#agama_update").val(data.agama);
					$("#no_telp_update").val(data.no_telp);
					$("#status_update").val(data.status);
				},
				error		: (err)	=> {
					alert(err);
				}
			});
		});
		// DETAIL DATA
		// ADD DATA
		$("#form_add").on("submit", function(e){
			e.preventDefault();
			$.ajax({
				url			: "<?php echo base_url('pegawai/add'); ?>",
				type		: "POST",
				dataType	: "JSON",
				data		: $(this).serialize(),
				success		: (data) => {
					$("#addModal").modal("hide");
					$("input, select, textarea").val("");
					$("#error_add").empty();
					swal({
						icon	: "success",
						title	: "Success",
						text	: `${data.status.message}`,
					});
					table.ajax.reload();
				},
				error		: (err) => {
					$("#error_add").html(`<div class="alert alert-danger">${err.responseText}</div>`);
				}
			});
		});
		// ADD DATA
		// UPDATE DATA
		$("#form_update").on("submit", function(e){
			e.preventDefault();
			$.ajax({
				url			: "<?php echo base_url('pegawai/update'); ?>",
				type		: "POST",
				dataType	: "JSON",
				data		: $(this).serialize(),
				success		: (data) => {
					$("#updateModal").modal("hide");
					$("input, select").val("");
					$("#error_update").empty();
					swal({
						icon	: "success",
						title	: "Success",
						text	: `${data.status.message}`,
					});
					table.ajax.reload();
				},
				error		: (err) => {
					$("#error_update").html(`<div class="alert alert-danger">${err.responseText}</div>`);
				}
			});
		})
		// UPDATE DATA
		// DELETE DATA
		$("#datatables-data").on("click", "#delete_data", function(){
			var kode = $(this).data("kode");
			swal({
				title: "Are you Sure?",
				icon: "warning",
				buttons:{
					cancel: {
						visible: true,
						text : "No, Cancel !",
						className: "btn btn-danger"
					},
					confirm: {
						text : 'Yes, delete it!',
						className : 'btn btn-success'
					}
				}
			}).then((isConfirm) => {
				if (isConfirm) {
					$.ajax({
						url			: "<?php echo base_url('pegawai/delete'); ?>",
						type		: "POST",
						data		: {kode:kode},
						success		: (res) => {
							swal({
								title: "Success",
								text: "Successfully Delete Data",
								icon: "success",
								button: "OK",
							});
							table.ajax.reload();
						}
					})
				} else {
					swal({
						title: "Congratulations!",
						text: "Data is not Removed",
						icon: "success",
						button: "OK",
					});
				}
			});
		})
		// DELETE DATA
	// CRUD
	});
	</script>
    <!-- JAVASCRIPT -->
</body>
</html>