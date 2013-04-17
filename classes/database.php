<?php
//connect to my host and select database using defined variables or have error
mysql_connect(DATABASE_HOSTNAME,DATABASE_USERNAME) or mysql_error();
mysql_select_db(DATABASE_DATABASE)or mysql_error();
//my queries have letters like ä,ö,ü,õ
mysql_query("SET NAMES 'utf8");
mysql_query("SET CHARACTER 'utf8");

function q($sql,$debug=false)
{
	if($debug)
	{
		print "<pre>$sql</pre>";
	}
}

	function get_one($sql,$debug=false)
	{
		if($debug)
		{
			print "<pre>$sql</pre>";
		}
		$q=mysql_query($sql) or exit(mysql_error());
		if (mysql_num_rows($q)===FALSE)
		{
		die($sql);
		}
		$result=mysql_fetch_row($q);
		if(is_array($result)&&count($result)>0)
		{
			return $result[0];
		}
		return NULL;
		return (is_array($result))&&count($result)>0 ? $result[0] :null;
	}
