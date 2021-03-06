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
			<h3>Instructions</h3>
			<p>
				Enter the tag number and password given to you into the textboxes below<br>
				Login and choose your desired candidate
			</p>
		</article>
	</section>
	<!-- Login Section -->
	<section class="container-fluid home-section">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-4 col-md-4">
					<div class="login-box">
						<form>
							<label for="Tag">Tag Number:</label><br>
							<input type="text" name="tag" class="form-control form-txt" placeholder="Tag Number..." required>
							<br>
							<label for="password">Password:</label><br>
							<input type="password" name="password" class="form-control form-txt" placeholder="Password..." required>
							<br>
							<button type="submit" class="form-control btn btn-default form-btn">Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>