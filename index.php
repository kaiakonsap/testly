<?php
//connect/join those files to this one
require 'config.php';
require 'classes/Request.php';
require 'classes/user.php';
require 'classes/database.php';
//if this kind of controller file exists in file tree
if (file_exists('controllers/'.$request->controller.'.php')) {
	//then connect/join this file also to this one
	require 'controllers/'.$request->controller.'.php';
	//make a variable controller from the class data    ??
	$controller = new $request->controller;
	//if the controller is of value 'requires_auth' then use the users require_auth() method
	if (isset($controller->requires_auth)) {
		$_user->require_auth();
	}
	//use the method(that exists in that controller file) that you got from action's attribute name
	$controller->{$request->action}();
	//else say that no page with that kind of a controller name does not exist
} else {
	echo "The page'{$request->controller}'does not exist";
}
