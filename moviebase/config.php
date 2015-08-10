<?php



/* Define MySQL connection details and database table name */ 
$SETTINGS["hostname"]='localhost';
$SETTINGS["mysql_user"]='castlesh_root';
$SETTINGS["mysql_pass"]='apoorv';
$SETTINGS["mysql_database"]='castlesh_jack';
$SETTINGS["data_table"]='t_movie'; // this is the default database name that we used

/* Connect to MySQL */

if (!isset($install) or $install != '1') {
	$connection = mysql_connect($SETTINGS["hostname"], $SETTINGS["mysql_user"], $SETTINGS["mysql_pass"]) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.');
	$db = mysql_select_db($SETTINGS["mysql_database"], $connection) or die ('request "Unable to select database."');
};
?>