<?php
  	
	$username = "#";
	$password = "#";
	$host     = "localhost";
  $table = '#';
  
	$db = mysql_connect($host, $username, $password);
	mysql_select_db("content",$db);

print $db;
exit;
	$empty_table = "TRUNCATE TABLE '$table'";
	mysql_query($empty_table) or die (mysql_error());

	$file = "baseline_commonlyused.txt";
  	$output = file($file);
  
	foreach($output as $var) {
		$var = rtrim($var);
		$var = mysql_real_escape_string($var);
		$numkey    = $tmp[0];
		$variable  = $tmp[1];
		$type 	   = $tmp[2];
		$label 	   = $tmp[3];
		$observedn = $tmp[4];
		$missingn  = $tmp[5];

	$sql = "INSERT INTO $table SET variable='$variable', type='$type', label='$label', observedn='$observedn', missingn='missingn'";
	mysql_query($sql) or die (mysql_error());
	}
	
echo "Done!";
?>