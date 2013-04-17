<?php
//my class named auth
class auth
{

	//my function named 'index'  that has two global variables
	function index()
	{
		global $request;
		global $errors;
//if super global variable $_SESSION has the value 'session_expired'
		if (isset($_SESSION['session_expired'])) {
			// have an error and destroy  global variable $_SESSION ????
			$errors[] = "sessioon on aegunud!";
			unset($_SESSION['session_expired']);
		}
		//if you get POST info labeled "username"
		if (isset($_POST['username'])) {
			//then save my post info to a variable
			$username = $_POST['username'];
			$password = $_POST['password'];
			//ask via mysql query if it has the matching username and return it's user_id  to variable $user_id
			$user_id = get_one("SELECT user_id FROM user WHERE username='$username' AND password='$password'");
			//if the variable is not empty
			if (! empty($user_id)) {
				//make my $_SESSION have this users user_id and
				$_SESSION['user_id'] = $user_id;
				//redirect my user to a new view, but from request?????????????
				$request->redirect('tests');
			}
			//if my user doesn't get redirected have an error
			$errors[] = "vale kasutaja või parool";

		}
		//and btw join this document also here to have a view of some sort
		require'views/auth_view.php';


	}

	//log out my user, end his SESSION and redirect to authorizing again
	function logout()
	{
		global $request;
		session_destroy();
		$request->redirect('auth');

	}

}
