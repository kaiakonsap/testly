<?php
//my class "Request"  that has 3 public attributes
class Request
{

	public $controller = DEFAULT_CONTROLLER;
	public $action = 'index';
	public $params = array();

//here I construct(=give values to)my previously defined 3 attributes
	public function __construct()
	{
		//if my server sends me any info from address bar
		if (isset($_SERVER['PATH_INFO'])) {
			//take it apart, disjoint using "/" sign and put it into variable $path_info
			if ($path_info = explode('/', $_SERVER['PATH_INFO'])) {

				// remove first number of exploded array (because it's empty)
				array_shift($path_info);
				/*if the first piece of my $path_info array exists, then chop it off and insert into my public $controller,
				remove the piece from the array after that else have the value "welcome"
				action - the same condition and extra condition not to be empty, else have value "index"
				*/
				$this->controller = isset($path_info[0]) ? array_shift($path_info) : 'welcome';
				$this->action = isset($path_info[0]) && ! empty ($path_info[0]) ? array_shift($path_info) : 'index';
				$this->params = isset($path_info[0]) ? $path_info : NULL;

			}
		}
	}

	public function redirect($destination)
	{
		header('Location: '.BASE_URL.$destination);
	}
}

//make a new instance of mu class that carries all the attributes defined above
$request = new Request;

