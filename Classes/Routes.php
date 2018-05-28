<?php
/*
*JavaScript routing
*/
class Routes{
	/*
	*Display Login Errors
	*/
	public $link = "index.php";
	public static function err_display($error){
		$redirect = <<<ENDOFSTRING
			<script type="text/javascript">
				alert("Enter correct {$error}");
				window.location="index.php";
			</script>
ENDOFSTRING;

		echo $redirect;
	}

	/*
	*redirect after success
	*/
	public static function redirect_to($location){
		$redirect = <<<ENDOFSTRING
			<script type="text/javascript">
				window.location="/eVoting/{$location}";
			</script>
ENDOFSTRING;

		echo $redirect;
	}

	/*
	*Display custom Errors
	*/
	public static function err_custom($error, $link){
		$redirect = <<<ENDOFSTRING
			<script type="text/javascript">
				alert("{$error}");
				window.location="/eVoting/{$link}";
			</script>
ENDOFSTRING;

		echo $redirect;
	}

	/*
	*History Return
	*/
	public static function err_return($error){
		$redirect = <<<ENDOFSTRING
			<script type="text/javascript">
				alert("{$error}");
				window.history.back()";
			</script>
ENDOFSTRING;

		echo $redirect;
	}

}
?>