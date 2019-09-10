<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo SITE_NAME; ?></title>
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
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row row-card-no-pd">
						<div class="col-sm-6 col-md-4 col-lg-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fa fa-plus-square"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Post</p>
												<h4 class="card-title" id="dashboard-post"></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fa fa-users"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Reciter</p>
												<h4 class="card-title" id="dashboard-reciter"></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">User</p>
												<h4 class="card-title" id="dashboard-user"></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Statistik</div>
								</div>
								<div class="card-body">
									<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="pills-visitor-tab" data-toggle="pill" href="#pills-visitor" role="tab" aria-controls="pills-visitor" aria-selected="true">Visitor</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-post-tab" data-toggle="pill" href="#pills-post" role="tab" aria-controls="pills-post" aria-selected="false">Post</a>
										</li>
									</ul>
									<div class="tab-content mt-2 mb-3" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-visitor" role="tabpanel" aria-labelledby="pills-visitor-tab">
											<div class="chart-container">
												<canvas id="lineChart"></canvas>
											</div>
											<div class="chart-container">
												<canvas id="doughnutChart"></canvas>
											</div>
										</div>
										<div class="tab-pane fade" id="pills-post" role="tabpanel" aria-labelledby="pills-post-tab">
											Sabar
										</div>
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
    </div>
    <!-- JAVASCRIPT -->
    <?php $this->load->view('include/js'); ?>
	<script>
	$(document).ready(function(){
		var lineChart = document.getElementById('lineChart').getContext('2d');
		var doughnutChart = document.getElementById('doughnutChart').getContext('2d');
		$.getJSON("<?php echo base_url('developer/dashboard/statsVisitor '); ?>", (data) => {
			var myLineChart = new Chart(lineChart, {
				type: 'line',
				data: {
					labels: data.daily,
					datasets: [{
						label: "Visitor",
						borderColor: "#1d7af3",
						pointBorderColor: "#FFF",
						pointBackgroundColor: "#1d7af3",
						pointBorderWidth: 2,
						pointHoverRadius: 4,
						pointHoverBorderWidth: 1,
						pointRadius: 4,
						backgroundColor: 'transparent',
						fill: true,
						borderWidth: 2,
						data: data.visitor,
					}]
				},
				options : {
					responsive: true, 
					maintainAspectRatio: false,
					legend: {
						position: 'bottom',
						labels : {
							padding: 10,
							fontColor: '#1d7af3',
						}
					},
					tooltips: {
						bodySpacing: 4,
						mode:"nearest",
						intersect: 0,
						position:"nearest",
						xPadding:10,
						yPadding:10,
						caretPadding:10
					},
					layout:{
						padding:{left:15,right:15,top:15,bottom:15}
					}
				}
			});
		});

		$.getJSON("<?php echo base_url('developer/log/statsBrowser') ?>", (data) => {
			var myDoughnutChart = new Chart(doughnutChart, {
				type: 'doughnut',
				data: {
					datasets: [{
						data: data.persen,
						backgroundColor: ['#2ecc71','#3498db','#9b59b6', '#e74c3c','#e67e22','#f1c40f', '#2c3e50']
					}],

					labels: data.browser,
				},
				options: {
					responsive: true, 
					maintainAspectRatio: false,
					legend : {
						position: 'bottom'
					},
					layout: {
						padding: {
							left: 20,
							right: 20,
							top: 20,
							bottom: 20
						}
					}
				}
			});
		});

		$.getJSON("<?php echo base_url('developer/dashboard/count') ?>", (data) => {
			$("#dashboard-post").html(data.post);
			$("#dashboard-reciter").html(data.reciter);
			$("#dashboard-user").html(data.user);
		});
	});
	</script>
    <!-- JAVASCRIPT -->
</body>
</html>