 <?php


$movieid = $_GET['movieid'];
$type = $_REQUEST['type'];
$file = $_REQUEST['file'];
// connect to the mysql database server.
mysql_connect ('localhost', 'castlesh_root', 'apoorv');
//select the database
mysql_select_db('castlesh_jack') or die('Cannot select database');

$query = "UPDATE t_movie
SET file = '$file' , type = '$type' WHERE movieid = '$movieid' ";

//Run the query
$result = mysql_query($query) or die(mysql_error());
//link variable is equal to the referring page
$link = $_SERVER['HTTP_REFERER'];
//sends a header directly to the browser telling it to redirect the user to the referring page
//header("Location: http://castleshare.com/dbase.php");
echo Updated;
?>   