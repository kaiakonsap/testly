<?php
//connect to my host and select database using defined variables or have error
mysql_connect(DATABASE_HOSTNAME,DATABASE_USERNAME) or mysql_error();
mysql_select_db(DATABASE_DATABASE)or mysql_error();
//my queries have letters like ä,ö,ü,õ
mysql_query("SET NAMES 'utf8");
mysql_query("SET CHARACTER 'utf8");
