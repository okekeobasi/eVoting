<!DOCTYPE html>
<html>
<head>
	<?php require("candidates_fetch.php"); ?>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta charset="utf-8">
	<title>eVoting</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
	<!-- DataTables -->
  	<link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
</head>
<body style="margin-bottom: 3%;">
	<!-- Header -->
	<header>
		<h3 class="header-text"><a href="#">Welcome to eVoting</a></h3>
	</header>
	<hr>
	<!-- Instructions Section -->
	<section class="container-fluid" style="text-align: center;">
		<div>
			<a class="pull-left" href="./index.php"><span class="glyphicon glyphicon-backward"></span> return</a>
			<a class="pull-right" href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
		</div>
		<article>
			<h3>Poll name</h3>
		</article>
	</section>
	<!-- Candidate Section -->
	<section class="container-fluid home-section">
		<div class="container">
			<div class="col-lg-offset-2 col-lg-10 col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-12 col-xs-12">
				<div class="row">
					<a href="viewPoll.php?name=<?php echo $_GET['name'] ?>">
						<span class="glyphicon glyphicon-th-list"></span> Change View
					</a>
				</div>
				<div class="row">
					<?php
						while($row = $result->fetch_assoc()){
							$candidate = $row["name"];
							$pic_name = $row["picture"];
							$voters = $row["user_id"];
							if (strpos($voters, ':') !== false) {
							    $votes = explode(":", $voters);
								$votes = sizeof($votes);
							}
							else{
								$votes = 0;
							}
							$table_row = <<<ENDOFSTRING
									<div class="card">
										<div class="image">
											<img src="./candidatePics/${pic_name}" alt="${candidate}">
										</div>
										<hr>
										<div class="title">
											<p>${candidate}</p>
										</div>
									</div>
ENDOFSTRING;
								echo $table_row;
						}
					?>
				</div>
				<br>
				<div class="row">
					<form action="deletePoll.php">
						<button class="btn btn-danger" type="submit" name="delete" 
						value="<?php echo $_GET['name'] ?>"  onclick="ask()">
							<span class="glyphicon glyphicon-trash"></span> Delete Poll
						</button>
					</form>
				</div>
			</div>	
		</div>
	</section>
</body>
</html>