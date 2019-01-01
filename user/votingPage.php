<!DOCTYPE html>
<html>
<head>
	<?php require("candidates_fetch.php"); ?>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta charset="utf-8">
	<title>eVoting</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
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
		<article>
			<div>
				<a class="pull-left" href="./index.php"><span class="glyphicon glyphicon-backward"></span> return</a>
				<a class="pull-right" href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
			</div>
			<h3><?php echo urldecode($name); ?></h3>
			<p>
				Choose your desired candidate(s)<br>
				Tap the checkbox next to the candidates name<br>
				click submit when done<br>
			</p>
			<h3>Choose only <?php echo $max; ?></h3>
		</article>
	</section>
	<!-- Candidate Section -->
	<section class="container-fluid home-section">
		<div class="container">
			<div method="get" class="col-lg-offset-2 col-lg-10 col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-12 col-xs-12">
				<div class="row">
					<?php
						//Check the comments in the admin\viewPoll.php
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
											<img src="../admin/candidatePics/${pic_name}" alt="${candidate}">
										</div>
										<hr>
										<div class="title">
											<p>${candidate}</p>
											<input type="checkbox" onclick="track(this)" value="$candidate" class="inactive"/>
										</div>
									</div>
ENDOFSTRING;
								echo $table_row;
						}
					?>
				</div>
				<br>
				<div class="row">
					<button class="btn btn-lg btn-primary" onclick="submit()">Submit</button>
				</div>
			</form>	
		</div>
	</section>

	<script type="text/javascript">
		var max = "<?php echo $max; ?>";

		function track(obj){
			$(obj).toggleClass('active');

			if($('.active').length >= max){
				$(".inactive").attr("disabled", true);
				$(".active").attr("disabled", false);
			}
			else if($('.active').length < max){
				$(".inactive").attr("disabled", false);
				$(".active").attr("disabled", false);
			}
		}

		function submit(){
			num = $('.active').length
			candidates = [];
			for(var i=0; i<num; i++){
				candidates.push($('.active')[i].value)
			}
			candidates_obj = JSON.parse(JSON.stringify(candidates))
			console.log(candidates_obj);
			
			url = "submitVotes.php"; 
			id = <?php echo $_SESSION['user_id']; ?>;
			
			$.ajax({
	  			url: url,
	  			type: 'GET',
	  			data: {
	  			    id: id,
	  			    data: candidates_obj,
	  			    poll_name: "<?php echo $name; ?>",
	  			    poll_id : "<?php echo $poll_id; ?>"
	  			},
	  			success: function(data){
	  				alert('Thank You for voting')
	  				window.location = '/eVoting/user';
	  			},
	  			// dataType: 'json'
	  		});
		}

	</script>
</body>
</html>