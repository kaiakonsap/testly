<?php
//class tests
class tests
{

//this will be useful somewhere ??????
	public $requires_auth = TRUE;

	function index()
	{
		//this will be useful somewhere ??????
		global $request;
		//merge master view which decides which body to put
		require 'views/master_view.php';
	}

}
