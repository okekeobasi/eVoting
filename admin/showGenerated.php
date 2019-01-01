<?php
	require("generate.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta charset="utf-8">
	<title>eVoting</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
</head>
<body>
	<!-- Header -->
	<header>
		<h3 class="header-text">Welcome to eVoting</h3>
	</header>
	<hr>
	<!-- Instructions Section -->
	<section class="container-fluid" style="text-align: center;">
		<div>
			<a class="pull-left" href="./index.php"><span class="glyphicon glyphicon-backward"></span> return</a>
			<a class="pull-right" href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
		</div>
		<article>
			<h3>Instructions</h3>
			<p>
				Use the tag number and password provided in the textboxes below<br>
				to take part in the polls
			</p>
			<a href="showGenerated.php"><button class="btn btn-default">Generate</button></a>
		</article>
	</section>
	<!-- Login Section -->
	<section class="container-fluid home-section">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-4 col-md-4">
					<div class="login-box">
						<label for="Tag">Tag Number:</label><br>
						<input type="text" name="tag" class="form-control form-txt" value="<?php echo $tag ?>" disabled="true">
						<br>
						<label for="password">Password:</label><br>
						<input type="text" name="password" class="form-control form-txt" value="<?php echo $password ?>" disabled="true">
						<br>
						<a href="index.php"><button type="submit" class="form-control btn btn-default form-btn">Continue</button></a>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>