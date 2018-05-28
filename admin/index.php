<!DOCTYPE html>
<html>
<head>
	<?php require("poll_fetch.php"); ?>
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
		<a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
		<article>
			<h3>Instructions</h3>
			<p>
				Select a Poll or Create a new one
			</p>
			<p>Generate a Voting tag and Password</p>
			<a href="showGenerated.php"><button class="btn btn-default">Generate</button></a>
		</article>
	</section>
	<!-- Main Section -->
	<section class="container-fluid home-section">
		<div class="container">
			<div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-8 ">
				<div class="row">
					<a href="newPoll.php"><span class="glyphicon glyphicon-plus"></span>Create new</a>
				</div>
				<div class="row">
					<ul class="poll-list">
						<?php
							while($row = $result->fetch_assoc()){
								$poll_name = $row["name"];
								echo "<li><a href='viewPoll.php?name=${poll_name}'>${poll_name}</a> <span class='list-date'><span></li>";
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</section>
</body>
</html>