<?php

class tests
{

	public $requires_auth = TRUE;

	function index()
	{
		global $request;
		require 'views/master_view.php';
	}

}
