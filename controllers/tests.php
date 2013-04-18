<?php
//class tests
class tests
{

//this will be useful somewhere ??????
	public $requires_auth = TRUE;

	function index()
	{

		global $request;
		global $_user;
		$tests = get_all("SELECT * FROM test NATURAL JOIN user WHERE test.deleted=0");

		//merge master view which decides which body to put
		require 'views/master_view.php';
	}

}
