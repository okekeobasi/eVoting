<?php
/*
*Validate inputs for Errors	
*/

class Validator{
	/*
	*Check if the Submitted form input has Quote (' or ");
	*/
	public static function quoteChecker($input){
		if( (strpos($input, "'") !== false) || (strpos($input, '"') !== false) ){
			return urlencode($input);
		}
		else return $input;
	}
}
?>