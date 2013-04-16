<?php

class auth
{
	function index(){
		global $request;
		global $errors;
	//$this->redirect('auth_view');
	if (isset($_SESSION['session_expired']))
	{
	$errors[]="sessioon on aegunud!";
		unset($_SESSION['session_expired']);
	}
	if(isset($_POST['username'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$user_id= get_one("SELECT user_id FROM user WHERE username='$username' AND password='$password'");
	if(! empty($user_id)){
		$_SESSION['user_id']=$user_id;
		$request->redirect('tests');
	}
		$errors[]="vale kasutaja või parool";
		
	}
	require'views/auth_view.php';


}
	function logout(){
		session_destroy();
		$request->redirect('auth_view');

	}

}
