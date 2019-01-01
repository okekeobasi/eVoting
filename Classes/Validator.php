<?php
/*
*Validate inputs for Errors	
*/

class Validator{
	/*
	*Check if the Submitted form input has Quote (' or ");
	*/
	public static function quoteChecker($input){
		if( (strpos($input, "'") !== false) || (strpos($input, '"') !== false) 
			|| (strpos($input, ' ') !== false) ){
			// If it has a quote then encode it.
			return urlencode($input);
		}
		else return $input;
	}
}
?>