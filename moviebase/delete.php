<?php

$movieid = $_GET['movieid'];

mysql_connect ('localhost', 'castlesh_root', 'apoorv');
//select the database
mysql_select_db('castlesh_jack') or die('Cannot select database');


//Set the query to return names of all employees
$query = "DELETE FROM t_movie WHERE movieid = '".$movieid."';";

//Run the query
$result = mysql_query($query) or die(mysql_error());
$link = $_SERVER['HTTP_REFERER'];
//sends a header directly to the browser telling it to redirect the user to the referring page
header("Location: $link");
;


?>