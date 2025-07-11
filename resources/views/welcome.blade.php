<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ url('rocker/assets/images/favicon-32x32.png') }}" type="image/png" />
	<!-- loader-->
	<link href="{{ url('rocker/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ url('rocker/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ url('rocker/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ url('rocker/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ url('rocker/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ ('rocker/assets/css/icons.css') }}" rel="stylesheet">
	<title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<nav class="navbar navbar-expand-lg navbar-light bg-white rounded fixed-top rounded-0 shadow-sm">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="{{ url('rocker/assets/images/logo-img.png') }}" width="140" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent1">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<li class="nav-item"> <a class="nav-link active" aria-current="page" href="#"><i class='bx bx-home-alt me-1'></i>Home</a>
						</li>
						<li class="nav-item"> <a class="nav-link" href="#"><i class='bx bx-user me-1'></i>About</a>
						</li>
						<li class="nav-item"> <a class="nav-link" href="#"><i class='bx bx-category-alt me-1'></i>Features</a>
						</li>
						<li class="nav-item"> <a class="nav-link" href="#"><i class='bx bx-microphone me-1'></i>Contact</a>
						</li>
						<li class="nav-item"> <a class="nav-link" href="{{ route('login.page') }}"><i class='bx bx-user me-1'></i>Sign in</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="error-404 d-flex align-items-center justify-content-center">
			<div class="card shadow-none bg-transparent">
				<div class="card-body text-center">
					<h1 class="display-4 mt-5">We are Coming Soon!</h1>
					<p>We are currently working hard on this page. Subscribe our newsletter
						<br>to get update when it'll be live.</p>
					<div class="row">
						<div class="col-12 col-lg-12 mx-auto">
							<form class="">
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Enter Your Email ID">
									<button class="btn btn-primary" type="button"><i class="bx bx-right-arrow-alt"></i>
									</button>
								</div>
							</form>
							<h4 class="mt-3">Follow Us :</h4>
							<div class="error-social mt-3"> <a href="javascript:;" class="bg-facebook"><i class='bx bxl-facebook'></i></a>
								<a href="javascript:;" class="bg-twitter"><i class='bx bxl-twitter'></i></a>
								<a href="javascript:;" class="bg-google"><i class='bx bxl-google'></i></a>
								<a href="javascript:;" class="bg-linkedin"><i class='bx bxl-linkedin'></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bg-white p-3 fixed-bottom border-top shadow">
			<div class="d-flex align-items-center justify-content-between flex-wrap">
				<ul class="list-inline mb-0">
					<li class="list-inline-item">Follow Us :</li>
					<li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-facebook me-1'></i>Facebook</a>
					</li>
					<li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-twitter me-1'></i>Twitter</a>
					</li>
					<li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-google me-1'></i>Google</a>
					</li>
				</ul>
				<p class="mb-0">Copyright © 2021. All right reserved.</p>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
	<!-- Bootstrap JS -->
	<script src="{{ url('rocker/assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>