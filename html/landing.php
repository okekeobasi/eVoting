<!DOCTYPE html>
<html>
<head>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta charset="utf-8">
	<title>eVoting</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
</head>
<body>
	<!-- Header -->
	<header>
		<h3 class="header-text">Welcome to eVoting</h3>
	</header>
	<hr>
	<!-- Instructions Section -->
	<section class="container-fluid" style="text-align: center;">
		<article>
			<h3>Poll Name</h3>
			<p>
				Choose your desired candidate(s)<br>
				Tap the checkbox next to the candidates name<br>
				click submit when done<br>
				choose wisely
			</p>
		</article>
	</section>
	<!-- Candidate Section -->
	<section class="container-fluid home-section">
		<div class="container">
			<form class="col-lg-offset-2 col-lg-10 col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-12 col-xs-12">
				<div class="row">
					<!-- Cards -->
					<div class="card">
						<div class="image">
							<img src="assets/img/bj.png" alt="Bojack">
						</div>
						<hr>
						<div class="title">
							<input type="checkbox" name="candidate" value="Bojack">
							<p>Bojack</p>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<button class="btn btn-lg btn-primary">Submit</button>
				</div>
			</form>	
		</div>
	</section>
</body>
</html>