<!doctype html>
<html lang="en">

<head>
	<title><?=$judul?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/css/demo.css">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=BASE_URL()?>assets/assets/img/apple-icon.png">
	 <link href="<?=BASE_URL()?>assets/assets/vendor/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=BASE_URL()?>assets/assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?=BASE_URL()?>assets/index.html"><img src="<?=BASE_URL()?>assets/assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
			<div class="container-fluid">
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown">
							<a href="" class="dropdown-toggle" data-toggle="dropdown"><span>
								<?=$this->session->userdata('nama')?>
							</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?=BASE_URL()?>logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<?php 
						// Pengecekan role untuk menentukan sidebar
							if ($this->session->userdata('level')=="1") {
								$this->load->view('v_sidebarAdmin');
							} elseif($this->session->userdata('level')=="2"){
								$this->load->view('v_sidebarManager');
							}else{
								$this->load->view('v_sidebarPelanggan');
							}
						?>
						
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"><?=$judul?></h3>
						</div>
						<div class="panel-body">
					<?php
						 // Load View Halaman 
						$this->load->view($halaman);
					?>
				</div>
				</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="<?=BASE_URL()?>assets/https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?=BASE_URL()?>assets/assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=BASE_URL()?>assets/assets/vendor/jquery/jquery-datatable.js"></script>
	<script src="<?=BASE_URL()?>assets/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=BASE_URL()?>assets/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=BASE_URL()?>assets/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?=BASE_URL()?>assets/assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?=BASE_URL()?>assets/assets/scripts/klorofil-common.js"></script>
	 <script src="<?=BASE_URL()?>assets/assets/vendor/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?=BASE_URL()?>assets/assets/vendor/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?=BASE_URL()?>assets/assets/vendor/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?=BASE_URL()?>assets/assets/vendor/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?=BASE_URL()?>assets/assets/vendor/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?=BASE_URL()?>assets/assets/vendor/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?=BASE_URL()?>assets/assets/vendor/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?=BASE_URL()?>assets/assets/vendor/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?=BASE_URL()?>assets/assets/vendor/jquery-datatable/extensions/export/buttons.print.min.js"></script>
</body>
<script type="text/javascript">
	$('.exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>

</html>
