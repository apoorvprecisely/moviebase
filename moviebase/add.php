<?php

require 'config.php';
$uname=$_GET['uname'];
$file = $_REQUEST['file'];
$type = $_REQUEST['type'];

// connect to the mysql database server.
mysql_connect ('localhost', 'castlesh_root', 'apoorv');
//select the database
mysql_select_db('castlesh_jack') or die('Cannot select database');

$query = "insert ignore into t_movie (uname,file,filesize,extension,type) values('$uname','$file','','','$type')";

//Run the queries
$result = mysql_query($query) or die(mysql_error());

//link variable is equal to the referring page
$link = $_SERVER['HTTP_REFERER'];
//sends a header directly to the browser telling it to redirect the user to the referring page
header("Location: $link");

?>