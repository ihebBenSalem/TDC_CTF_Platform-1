<?php

$host="127.0.0.1";
$username="root";
$pass="root";
$db="ctf";

mysql_connect($host,$username,$pass) or die("An Error Occured");
mysql_select_db($db) or die("fail to select db");


?>
