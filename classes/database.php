<?php
//connect to my host and select database using defined variables or have error
mysql_connect(DATABASE_HOSTNAME, DATABASE_USERNAME) or mysql_error();
mysql_select_db(DATABASE_DATABASE)or mysql_error();
//my queries have letters like ä,ö,ü,õ
mysql_query("SET NAMES 'utf8");
mysql_query("SET CHARACTER 'utf8");
//this function takes care of debug,saves a mysql query and returns mysql stuff according to query command.
//has a mysql command, empty query pointer and variable for debugging
function q($sql, &$query_pointer = NULL, $debug = FALSE)
{
	//for debugging
	if ($debug) {
		print "<pre>$sql</pre>";

	}
	//save my sql query here or give an error
	$query_pointer = mysql_query($sql)or mysql_error();

	/*take first 4 letters of my query and in case SELE(ct) return number of query rows, in case INSE(rt) return the key,
else just return affected rows*/
	switch (substr($sql, 0, 4)) {
		case 'SELE':
			return mysql_num_rows($query_pointer);
		case 'INSE':
			return mysql_insert_id();
		default:
			return mysql_affected_rows();
	}
}

//this function makes sure if my mysql query had any results, it gets a query data from auth.php
function get_one($sql, $debug = FALSE)
{
	if ($debug) {
		print "<pre>$sql</pre>";
	}
	//make query with $sql data or give an error
	$q = mysql_query($sql) or exit(mysql_error());
	//if no rows in my query die
	if (mysql_num_rows($q) === FALSE) {
		die($sql);
	}
	//save a row into my variable
	$result = mysql_fetch_row($q);
	//if my variable is a array and has  more than 0 members return the first member else give NULL=none
	return (is_array($result)) && count($result) > 0 ? $result[0] : NULL;
}

//make query, save into variable?????????????????
function get_all($sql)
{
	$q = mysql_query($sql) or exit(mysql_error());
	//while there is possible to save query result into array $result or I can take elements of the end of array
	//???return $result
	while (($result[] = mysql_fetch_assoc($q)) || array_pop($result)) {
		;
	}
	return $result;
}