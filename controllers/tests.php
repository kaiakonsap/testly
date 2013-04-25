<?php
//class tests controlls all related to my tests
class tests
{

//make my auth variable true, so people have to log in
	public $requires_auth = TRUE;
//saves the queries, user id and asks for a view to create tests index view
	function index()
	{

		//add tests.js included in the view
		$this->scripts[] = 'tests.js';
		global $request;
		global $_user;

		//save query array that gets tests that are not deleted
		$tests = get_all("SELECT * FROM test NATURAL JOIN user WHERE test.deleted=0");

		//save the session key of logged in user
		$id = $_SESSION['user_id'];

					//save the logged in user status name
		$status = get_one("SELECT status FROM user WHERE user_id='$id'");

		//include master view
		require 'views/master_view.php';
	}

	// asks all the components necessary for showing already made test
	function edit()
	{
		global $request;

		//add tests.js included in the view
		$this->scripts[] = 'test_add_edit.js';

		//save parameters(test id) from address line
		$id = $request->params[0];

		//select test with that id
		$test = get_all("SELECT * FROM test WHERE test_id='$id'");

		//select a question data with that id
		$question = get_all("SELECT * FROM question WHERE test_id='$id'");

		//save first(and the only) element of the query array into $test variable
		$test = $test[0];
		/*if question array exists has different value than NULL, save it to $question,
		 else put an array member with empty string there*/
		$question = isset($question[0]) ? $question[0] : array('question_text' => '');
		require 'views/master_view.php';

	}
//lets me delete a test
	function remove()
	{
		global $request;
		//take params attribute from the file path($request object)
		$id = $request->params[0];
		//make query that sets deleted to be 1 = the test is now deleted
		$result = q("UPDATE test SET deleted=1 WHERE test_id='$id'");
		require 'views/master_view.php';
	}
//makes possible to add a new test
	function add()
	{
		global $request;
		//javascript
		$this->scripts[] = 'test_add_edit.js';
		//Fills array elements with empty strings for some reason
		$test = array(
			'test_id'       => '',
			'name'          => '',
			'introduction'  => '',
			'conclusion'    => '',
			'passcode'      => '',
			'question_text' => ''
		);

		//new empty array for test answers for some reason
		$question = array('question_text' => '');
		require 'views/master_view.php';

	}
}
