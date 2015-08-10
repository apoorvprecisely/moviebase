<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php require_once('Connections/localhost.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 20;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
$str=$_GET['string'];
$moviehd=$_GET['moviehd'];
$movie480=$_GET['movie480'];
$movie720=$_GET['movie720'];
$moviedvdrip=$_GET['moviedvdrip'];
$movie=$_GET['movie'];
$tv=$_GET['tv'];
$tv480=$_GET['tv480'];
$tvmp4=$_GET['tvmp4'];
$tvhdtv=$_GET['tvhdtv'];
$tvmsd=$_GET['tvmsd'];
$games=$_GET['games'];
$boys=$_GET['boys'];
$girls=$_GET['girls'];
$blockvalue=$_GET['blockvalue'];
$block=$_GET['block'];



mysql_select_db($database_localhost, $localhost);
//start

//when none selected
if($movie!='1'&&$moviehd!='1'&&$movie480!='1'&&$movie720!='1'&&$moviedvdrip!='1'&&$tv!='1'&&$tv480!='1'&&$tvmp4!='1'&&$tvhdtv!='1'&&$tvmsd!='1'&&$games!='1'&&$boys!='1'&&$girls!='1'&&$blockvalue!='1')
{
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room FROM t_movie INNER JOIN users ON t_movie.uname=users.user_name WHERE t_movie.file LIKE '%$str%' ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($blockvalue!='1'){
if($boys=='1'){
		
if($movie=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND users.gender='male'
ORDER BY t_movie.file ASC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($moviehd=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND ( t_movie.file LIKE  '%480p%'
OR t_movie.file LIKE  '%hd%'
OR t_movie.file LIKE  '%brrip%'
OR t_movie.file LIKE  '%1080p%')
AND users.gender='male'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($movie480=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%480p%'
AND users.gender='male'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($movie720=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%720p%'
AND users.gender='male'
ORDER BY t_movie.file ASC   ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($moviedvdrip=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%dvdrip%'
AND users.gender='male'
ORDER BY t_movie.file ASC   ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

}
if($tv=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND users.gender='male'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tv480=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%480p%'
AND users.gender='male'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvmp4=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.extension='mp4'
AND users.gender='male'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvhdtv=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%hdtv%'
AND users.gender='male'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvmsd=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%msd%'
AND users.gender='male'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($games=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'games'
AND users.gender='male'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
else if($movie!='1'&&$moviehd!='1'&&$movie480!='1'&&$movie720!='1'&&$moviedvdrip!='1'&&$tv!='1'&&$tv480!='1'&&$tvmp4!='1'&&$tvhdtv!='1'&&$tvmsd!='1'&&$games!='1'&&$girls!='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room FROM t_movie INNER JOIN users ON t_movie.uname=users.user_name WHERE t_movie.file LIKE '%$str%' 
AND users.gender='male'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
}
if($girls=='1'){	
if($movie=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND users.gender='female'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($moviehd=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND ( t_movie.file LIKE  '%480p%'
OR t_movie.file LIKE  '%hd%'
OR t_movie.file LIKE  '%brrip%'
OR t_movie.file LIKE  '%1080p%')
AND users.gender='female'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($movie480=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%480p%'
AND users.gender='female'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($movie720=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND users.gender='female'
AND t_movie.file LIKE  '%720p%'
ORDER BY t_movie.file ASC   ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($moviedvdrip=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%dvdrip%'
AND users.gender='female'
ORDER BY t_movie.file ASC   ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

}
if($tv=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND users.gender='female'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

}
if($tv480=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%480p%'
AND users.gender='female'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvmp4=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.extension='mp4'
AND users.gender='female'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvhdtv=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%hdtv%'
AND users.gender='female'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvmsd=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%msd%'
AND users.gender='female'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($games=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'games'
AND users.gender='female'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
else if($movie!='1'&&$moviehd!='1'&&$movie480!='1'&&$movie720!='1'&&$moviedvdrip!='1'&&$tv!='1'&&$tv480!='1'&&$tvmp4!='1'&&$tvhdtv!='1'&&$tvmsd!='1'&&$games!='1'&&$boys!='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room FROM t_movie INNER JOIN users ON t_movie.uname=users.user_name WHERE t_movie.file LIKE '%$str%'
AND users.gender='female'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
}
else if($girls!='1'&&$boys!='1'){	
if($movie=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($moviehd=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND ( t_movie.file LIKE  '%480p%'
OR t_movie.file LIKE  '%hd%'
OR t_movie.file LIKE  '%brrip%'
OR t_movie.file LIKE  '%1080p%')
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($movie480=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%480p%'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($movie720=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%720p%'
ORDER BY t_movie.file ASC   ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($moviedvdrip=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%dvdrip%'
ORDER BY t_movie.file ASC   ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

}
if($tv=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tv480=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%480p%'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvmp4=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.extension='mp4'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvhdtv=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%hdtv%'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvmsd=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%msd%'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($games=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'games'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}

}}

if($blockvalue=='1'){
if($boys=='1'){
		
if($movie=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND users.gender='male'
AND users.block='$block'
ORDER BY t_movie.file ASC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($moviehd=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND users.block='$block'
AND ( t_movie.file LIKE  '%480p%'
OR t_movie.file LIKE  '%hd%'
OR t_movie.file LIKE  '%brrip%'
OR t_movie.file LIKE  '%1080p%')
AND users.gender='male'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($movie480=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%480p%'
AND users.gender='male'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($movie720=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND users.block='$block'
AND t_movie.file LIKE  '%720p%'
AND users.gender='male'
ORDER BY t_movie.file ASC   ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($moviedvdrip=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%dvdrip%'
AND users.gender='male'
AND users.block='$block'
ORDER BY t_movie.file ASC   ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

}
if($tv=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND users.block='$block'
AND users.gender='male'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tv480=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%480p%'
AND users.gender='male'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvmp4=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.extension='mp4'
AND users.gender='male'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvhdtv=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%hdtv%'
AND users.gender='male'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvmsd=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%msd%'
AND users.gender='male'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($games=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'games'
AND users.gender='male'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
else if($movie!='1'&&$moviehd!='1'&&$movie480!='1'&&$movie720!='1'&&$moviedvdrip!='1'&&$tv!='1'&&$tv480!='1'&&$tvmp4!='1'&&$tvhdtv!='1'&&$tvmsd!='1'&&$games!='1'&&$girls!='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room FROM t_movie INNER JOIN users ON t_movie.uname=users.user_name WHERE t_movie.file LIKE '%$str%' 
AND users.gender='male'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
}
if($girls=='1'){	
if($movie=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND users.gender='female'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($moviehd=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND ( t_movie.file LIKE  '%480p%'
OR t_movie.file LIKE  '%hd%'
OR t_movie.file LIKE  '%brrip%'
OR t_movie.file LIKE  '%1080p%')
AND users.gender='female'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($movie480=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%480p%'
AND users.gender='female'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($movie720=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND users.gender='female'
AND t_movie.file LIKE  '%720p%'
AND users.block='$block'
ORDER BY t_movie.file ASC   ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($moviedvdrip=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%dvdrip%'
AND users.gender='female'
AND users.block='$block'
ORDER BY t_movie.file ASC   ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

}
if($tv=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND users.gender='female'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

}
if($tv480=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%480p%'
AND users.gender='female'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvmp4=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.extension='mp4'
AND users.gender='female'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvhdtv=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%hdtv%'
AND users.gender='female'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvmsd=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.file LIKE  '%msd%'
AND users.gender='female'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($games=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'games'
AND users.block='$block'
AND users.gender='female'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
else if($movie!='1'&&$moviehd!='1'&&$movie480!='1'&&$movie720!='1'&&$moviedvdrip!='1'&&$tv!='1'&&$tv480!='1'&&$tvmp4!='1'&&$tvhdtv!='1'&&$tvmsd!='1'&&$games!='1'&&$boys!='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room FROM t_movie INNER JOIN users ON t_movie.uname=users.user_name WHERE t_movie.file LIKE '%$str%'
AND users.gender='female' AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
}
else if($girls!='1'&&$boys!='1'){	
if($movie=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($moviehd=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND users.block='$block'
AND ( t_movie.file LIKE  '%480p%'
OR t_movie.file LIKE  '%hd%'
OR t_movie.file LIKE  '%brrip%'
OR t_movie.file LIKE  '%1080p%')
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($movie480=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%480p%'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($movie720=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%720p%'
AND users.block='$block'
ORDER BY t_movie.file ASC   ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($moviedvdrip=='1'){	
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'movie'
AND t_movie.file LIKE  '%dvdrip%'
AND users.block='$block'
ORDER BY t_movie.file ASC   ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

}
if($tv=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tv480=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND users.block='$block'
AND t_movie.file LIKE  '%480p%'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvmp4=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND t_movie.extension='mp4'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvhdtv=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND users.block='$block'
AND t_movie.file LIKE  '%hdtv%'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($tvmsd=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'tv'
AND users.block='$block'
AND t_movie.file LIKE  '%msd%'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}
if($games=='1'){
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room
FROM t_movie
INNER JOIN users ON t_movie.uname = users.user_name
WHERE t_movie.file LIKE  '%$str%'
AND t_movie.type =  'games'
AND users.block='$block'
ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}

}}

if($movie!='1'&&$moviehd!='1'&&$movie480!='1'&&$movie720!='1'&&$moviedvdrip!='1'&&$tv!='1'&&$tv480!='1'&&$tvmp4!='1'&&$tvhdtv!='1'&&$tvmsd!='1'&&$games!='1'&&$boys!='1'&&$girls!='1'&&$blockvalue=='1')
{
$query_Recordset1 = "SELECT t_movie.movieid, t_movie.uname, t_movie.file, t_movie.filesize, t_movie.extension, t_movie.type, users.gender, users.block, users.room FROM t_movie INNER JOIN users ON t_movie.uname=users.user_name WHERE t_movie.file LIKE '%$str%' AND users.block='$block' ORDER BY t_movie.file ASC  ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
}

















//end
if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<?php
include 'dbc.php';
page_protect();


?>

<html>
<head>
<title>Browse Database</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
 <tr height="100px"colspan="3" bgcolor="#000036"> 
  
   <td>
    <table>
    <tr>
    <td align="left"><img src="images/banner.jpg" width="324" height="100" alt="castleshare" longdesc="http://www.castleshare.com">
    </td>
    </tr>
    </table>
   </td>  
  </tr> 
    
    
    
    
  <tr> 
    <td colspan="3"><a href="browse.php"><strong>Browse |</strong></a><strong><a href="#">Forum |</a><a href="#">TV Listing |</a></strong><strong><a href="users.php">Users </a></strong>
      <div align="right" class="search"> <form name="search" id="search" method="post" action="users.php"><nobr><input type="text"  name="string" >&nbsp;        &nbsp;
        <input type="submit" name="srch"  value="Search User"></nobr></form></div>
    </td>
  </tr>
  
  <tr> 
    <td width="1000" >
<?php 

if (isset($_SESSION['user_id'])) {?>
<div align="left" class="myaccount">
  <a href="profile.php"> Profile |</a>
   <a href="update.php"> Update |</a>
  <a href="dbase.php"> Edit List|</a>
  <a href="mysettings.php"> Settings |</a>
    <a href="logout.php">Logout |</a>
	<a href="messages.php"> Inbox</a></div>
    </td></tr>
<?php }
if (checkAdmin()) {
/*******************************END**************************/
?>
      <p> <a href="admin.php"></a></p>
	  <?php } ?>
    
    
    
      
	  <p>
	    <?php	
      if (isset($_GET['msg'])) {
	  echo "<div class=\"error\">$_GET[msg]</div>";
	  }
	  	  
	  ?>
	  </p>
    <br/><br/>
    
     <tr>
    <td width="1000" valign="top"> <table width="1000" align="center" border="1" cellspacing="0" cellpadding="4">
     <?php if($totalRows_Recordset1!=0){?>
      <tr style="color:#FFF">
        <td bgcolor="#036">Titleid</td>
        <td bgcolor="#036">Owner</td>
        <td bgcolor="#036">Title</td>
        <td bgcolor="#036">Size</td>
        <td bgcolor="#036">Extension</td>
        <td bgcolor="#036">Type</td>
        <td bgcolor="#036">Address</td>
        <td bgcolor="#036">Block</td>
        <td bgcolor="#036">Room</td>
      </tr><?php } else echo "<h2 >No results match query</h2>" ?>
      <?php do { ?>
        
        <tr>
          <td bgcolor="#cad9ea"><?php echo $row_Recordset1['movieid']; ?></td>
          <td bgcolor="#cad9ea" ><a href="userprofile.php?userprofile=<?php echo $row_Recordset1['uname'];  ?>"><?php echo $row_Recordset1['uname']; ?></a></td>
          <td bgcolor="#cad9ea" ><?php echo $row_Recordset1['file']; ?></td>
          <td bgcolor="#cad9ea"><?php echo $row_Recordset1['filesize']; ?></td>
          <td bgcolor="#cad9ea"><?php echo $row_Recordset1['extension']; ?></td>
          <td bgcolor="#cad9ea"><?php echo $row_Recordset1['type']; ?></td>
          <td bgcolor="#cad9ea"><?php if($row_Recordset1['gender']=='male')
		          {
					  echo "Boys Hostel";
				  }
				  if($row_Recordset1['gender']=='female')
		          {
					  echo "Girls Hostel";
				  }
		  
		  
		  
		  
		   ?></td>
          <td bgcolor="#cad9ea"><?php echo $row_Recordset1['block']; ?></td>
          <td bgcolor="#cad9ea"><?php echo $row_Recordset1['room']; ?></td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table></td></tr>
      
      
     
  

  <tr>
    <td><table border="0" align="center">
      <tr>
        <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">First</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">Previous</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">Next</a>
            <?php } // Show if not last page ?></td>
        <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">Last</a>
            <?php } // Show if not last page ?></td>
      </tr>
  </table></td></tr>




</table>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>