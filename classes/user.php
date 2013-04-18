<?php
//my class user that has one public attribute - $logged_in
class user
{

	public $logged_in = FALSE;

//construct my class, give values
	function __construct()
	{
		//built in function to start SESSION
		session_start();
		//if user_id exists in my SESSION super global variable set my attribute to be true
		if (isset($_SESSION['user_id'])) {
			$this->logged_in = TRUE;
		}
	}

//the authentication function with global variable  $request
	public function require_auth()
	{
		global $request;
		//if logged_in variable is NOT true
		if ($this->logged_in !== TRUE) {
			//check if both of there two things exist and equal to whatever 'XMLHttpRequest' is????????
			if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
				//set the "header"?????? of a html to to have 'HTTP/1.0 401 Unauthorized'
				header('HTTP/1.0 401 Unauthorized');
				//exit.....?? set 'session_expired' to be an array value in json_encode funtionor something like that
				exit(json_encode(array('data' => 'session_expired')));
			} //else expire my SESSION and redirect to auth controller
			else {
				$_SESSION['session_expired'] = TRUE;
				$request->redirect('auth');
			}
		}

	}
}

//make a new instance of this class to use
$_user = new user();