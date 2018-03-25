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
		<article>
			<h3>Poll name</h3>
		</article>
	</section>
	<!-- Main Section -->
	<section class="container-fluid home-section">
		<div class="container">
			<div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-8 ">
				<div class="row">
					<table id="table" class="table-responsive table-hover table">
						<thead>
							<th>Candidate</th>
							<th>Votes</th>
							<th>%</th>
						</thead>
						<?php
							while($row = $result->fetch_assoc()){
								$candidate = $row["name"];
								$voters = $row["user_id"];
								if (strpos($voters, ':') !== false) {
								    $votes = explode(":", $voters);
									$votes = sizeof($votes);
								}
								else{
									$votes = 0;
								}
								$table_row = <<<ENDOFSTRING
										<tr>
											<td>${candidate}</td>
											<td>${votes}</td>
											<td>%</td>
										</tr>
ENDOFSTRING;
									echo $table_row;
							}
						?>
					</table>
				</div>
				<div class="row">
					<form>
						<button class="btn btn-danger" type="submit" name="delete" value="poll-name"  onclick="ask()">
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