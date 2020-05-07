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
								<p class="lead">Registrasi PPOB</p>
							</div>
							<div class="alert" style="display:none;" id="alertLogin"></div>
							<form class="form-auth-small" action="#" method="post" id="formRegister" autocomplete="off">
								<div class="form-group">
									<label class="control-label sr-only">Nama Lengkap</label>
									<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Daya</label>
									<select name="tarif" class="form-control">
										<?php
											foreach($tarif as $t):
										?>
										<option value="<?=$t->id_tarif?>"><?=$t->daya?></option>
										<?php
											endforeach;
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Username</label>
									<input type="text" class="form-control" id="signin-email" placeholder="Username" name="username" required>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password"  placeholder="Password" name="password">
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Nomor KWH</label>
									<input type="text" class="form-control" placeholder="Nomor kwH" name="nomor">
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Nomor KWH</label>
									<input type="text" name="alamat" class="form-control" placeholder="Alamat">
								</div>
								
								<button id="buttonRegister" type="button" class="btn btn-primary btn-md btn-block">Register</button>
								<p style="margin-top:8px">Sudah punya akun? <a href="<?=BASE_URL()?>login">Login</a></p>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">PPOB</h1>
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
	$("#buttonRegister").click(()=>{
		const data = $("#formRegister").serialize();
		console.log(data);
		$.ajax({
			url:"<?=BASE_URL()?>register/daftar",
			dataType:"json",
			method:"POST",
			data:data,
			success:data=>{
				if (data.status ==1 ) {	
					window.location.href = "<?=BASE_URL()?>login";
					console.log(data.level)
				} else{
					$("#alertLogin").addClass("alert-danger").css("display","block").html(data.error);
					console.log("Gagal")
				}
			}
		})
	});
</script>
</html>
