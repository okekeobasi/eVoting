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
			<h3>Poll name</h3>
		</article>
	</section>
	<!-- Main Section -->
	<section class="container-fluid home-section">
		<div class="container">
			<div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-8 ">
				<div class="row">
					<a href="viewfancyPoll.php?name=<?php echo $_GET['name'] ?>">
						<span class="glyphicon glyphicon-th-large"></span> Change View
					</a>
				</div>
				<div class="row">
					<table id="table" class="table-responsive table-hover table">
						<thead>
							<th>Candidate</th>
							<th>Votes</th>
							<th>%</th>
						</thead>
						<?php
						// Generate the total sum of votes
						$sum = 0;
						$sum_votes = 0;
							// the $sum_result is initiated in candidates_fetch
							while($sum_row = $sum_result->fetch_assoc()){
								//the user_id is saved in a record seperated by a colon rg '1:2'
								$sum_voters = $sum_row["user_id"];
								// split and count the user_id
								if (strpos($sum_voters, ':') !== false) {
								    $sum_votes = explode(":", $sum_voters);
									$sum_votes = sizeof($sum_votes) - 1;
								}
								else{
									$sum_votes = 0;
								}
								// get the sum for the percentage column
								$sum = $sum + $sum_votes;
							}
						?>

						<?php
							while($row = $result->fetch_assoc()){
								$candidate = $row["name"];
								$voters = $row["user_id"];
								if (strpos($voters, ':') !== false) {
								    $votes = explode(":", $voters);
									$votes = sizeof($votes) - 1;
								}
								else{
									$votes = 0;
								}
								$perc = ($votes/$sum) * 100;
								// get this for the table 
								$table_row = <<<ENDOFSTRING
										<tr>
											<td>${candidate}</td>
											<td>${votes}</td>
											<td>${perc}</td>
										</tr>
ENDOFSTRING;
									echo $table_row;
							}
						?>
					</table>
				</div>
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

	<!-- Javascript -->
	<!-- DataTables -->
	<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function () {
		    $('#table').DataTable({
		    	'autoWidth'   : false,
		    	'paging'      : false,
		    	'lengthChange': false,
		    	'searching'   : true,
		    	'info'        : false,
      			'ordering'    : true,
		    })
		  })

		function ask(){
			window.onbeforeunload = function(){
	            return 'Are you sure?';
	        };
		}
	</script>
</body>
</html>