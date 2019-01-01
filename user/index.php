<!DOCTYPE html>
<html>
<head>
	<?php require("poll_fetch.php"); ?>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta charset="utf-8">
	<title>eVoting</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
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
			<a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
			<h3>Instructions</h3>
			<p>
				Choose a Poll
			</p>
		</article>
	</section>
	<!-- Main Section -->
	<section class="container-fluid home-section">
		<div class="container">
			<div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-8 ">
				<div class="row">
					<ul class="poll-list">
						<?php
							// get the poll_id for the poll_fetch.php
							$get_poll_id_row = $select_user_result->fetch_assoc();
							while($row = $result->fetch_assoc()){
								$poll_id = $row["id"];
								$poll_name = urldecode($row["name"]);
								$poll_name_encoded = $row["name"];

								// if a poll ID is in the user poll_id column dont show the poll
								if(strpos($get_poll_id_row['poll_id'], $poll_id) !== false ) continue;
								// Go to the votingPage.php with parameters: name;
								echo "<li><a href='votingPage.php?name=${poll_name_encoded}'>${poll_name}</a> <span class='list-date'><span></li>";
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</section>
</body>
</html>