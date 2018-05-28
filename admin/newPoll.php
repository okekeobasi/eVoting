<!DOCTYPE html>
<html>
<head>
	<?php require("sessionChecker.php");?>
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
			<h3>Instructions</h3>
			<p>
				Enter the the name of the Poll, <br>
				and the number of candidates<br>
				Enter the number of input fields you need<br>
				Leave unnecessary fields blank<br>
				<strong>MIND YOUR SPELLINGS</strong>
			</p>
		</article>
	</section>
	<!-- Main Section -->
	<section class="container-fluid home-section">
		<div class="container">
			<div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-8 ">
				<div class="row text-center">
					<form id="myForm" onsubmit="insert()" method="POST" action="createPoll.php" enctype="multipart/form-data">
						<input type="text" name="name" placeholder="Poll Name..." class="form-control"><br>
						<h4><label>Maximum number of Votes:</label></h4>
						<input type="number" name="max" id="max" placeholder="Type here..." class="poll-text" required="true">

						<h4><label>How many candidates:</label></h4>
						<input type="number" name="candidates" id="candidates" placeholder="Type here..." class="poll-text" required="true">
						<button class="btn btn-sm btn-default" onclick="create()" type="button">create</button><br><br>
						<div id="text-div"></div>
						<hr>
						<button class="btn btn-default" id="form-btn" onclick="validateMyForm();">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Javascript -->
	<script type="text/javascript">
		var max = 0;
		function create() {
			val = $('#candidates').val();
			if(val != ""){
				for(i = 0; i < val; i++){
					var row = '<input type="text" class="poll-text" name="candidate' + max + '" placeholder="Enter candidate name">'
					var row_img = '<input type="file" class="poll-text" name="imgcandidate' + max + '" accept="image/*">'
					var row_img_lbl = '<label for="files">Choose Contestant picture if any</label>'
					$('#text-div').append(row)
					$('#text-div').append(row_img_lbl)
					$('#text-div').append(row_img)
					$('#text-div').append('<br><br>')
					max = max + 1;
				}
			}
			console.log(max)
		}

		function validateMyForm(){
			window.onbeforeunload = function(){
	            return 'Are you sure of the Information provided?';
	        };
		}

		function insert(){
			var hidden = '<input type="hidden" name="number" value ="' + max + '" placeholder="Enter candidate name">'
			$('#text-div').append(hidden)
		}
	</script>
</body>
</html>