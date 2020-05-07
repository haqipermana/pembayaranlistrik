<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="<?=BASE_URL()?>assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=BASE_URL()?>assets/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=BASE_URL()?>assets/assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left" style="display: flex; align-items: center;">
						<div class="content">
							<div class="header">
								<p class="lead">Login to your account</p>
							</div>
							<div class="alert" style="display:none;" id="alertLogin"></div>
							<form class="form-auth-small" action="#" method="post" id="formLogin" autocomplete="off">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Username</label>
									<input type="text" class="form-control" id="signin-email" placeholder="Username" name="username" required>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password"  placeholder="Password" name="password" required>
								</div>
								
								<button id="buttonLogin" type="button" class="btn btn-primary btn-lg btn-block">Login</button>
								<p style="margin-top:20px">Belum punya akun? <a href="<?=BASE_URL()?>register">Register</a></p>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">PPOB Dashboard</h1>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
<script src="<?=BASE_URL()?>assets/assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
	// Event Listener ketika button login ditekan
	$("#buttonLogin").click(()=>{
		// Menjadikan form menjadi string
		const data = $("#formLogin").serialize();
		// Menggunakan ajax untuk method login
		$.ajax({
			url:"<?=BASE_URL()?>login/getLogin",
			dataType:"json",
			method:"POST",
			data:data,
			success:data=>{
				if (data.status ==1 ) {	
					// Redirect ke halaman penggunaan
					window.location.href = "<?=BASE_URL()?>penggunaan";
					console.log(data.level)
				} else if(data.status ==2){
					// Redirect ke halaman pembayaran
					window.location.href = "<?=BASE_URL()?>pembayaran";
					console.log(data.level)
				} else{
					// Jika response status = 0
					$("#alertLogin").addClass("alert-danger").css("display","block").html(data.error);
					console.log("Gagal")
				}
			}
		})
	});
</script>
</html>
