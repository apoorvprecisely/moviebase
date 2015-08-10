<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php require_once('Connections/localhost.php'); ?>

<?php 

ini_set( "display_errors", 0);
include 'dbc.php';
page_protect();

?>

<html>
<head>
<title>Messages</title>
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
        <input type="submit" name="srch"  value="Search User"></nobr></form></div></td>
  </tr>
  
  
  <tr> 
    <td width="1000" >
<?php 

if (isset($_SESSION['user_id'])) {?>

<div align="left" class="myaccount">
  <a href="profile.php"> Profile |</a>
   <a href="update.php"> Update |</a>
  <a href="dbase.php"> Edit List |</a>
  <a href="mysettings.php"> Settings |</a>
    <a href="logout.php">Logout |</a>
	<a href="messages.php"> Inbox</a>(<?php
	
	
$dbserver="localhost";
$dbuser="castlesh_root";
$dbpwd="apoorv";
$dbname="castlesh_jack";

$cid=mysql_connect($dbserver,$dbuser,$dbpwd) or die('try again');

mysql_select_db($dbname,$cid);
$unam=$_SESSION['user_email'];
$query="SELECT reciever,sender, title, `timestamp` FROM t_message WHERE reciever='$unam' and status='unread'";
mysql_query($query,$cid);
	$noti=mysql_affected_rows($cid);
echo $noti;	

	mysql_close($cid);
?>)</div>
<?php }
if (checkAdmin()) {
?>
      <p> <a href="admin.php"> </a></p>
	  <?php } ?>
      </td></tr>
      
      
      <tr>
    <td width="732" valign="top"><p>&nbsp;</p>
      <h2 class="titlehdr" align="center"></h2>  
      
      </td></tr>
      
	  <?php	
      if (isset($_GET['msg'])) {
	  echo "<div class=\"error\">$_GET[msg]</div>";
	  }
	  	
		  
	  ?>
      
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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
$hostname_localhost = "localhost";
$database_localhost = "castlesh_jack";
$username_localhost = "castlesh_root";
$password_localhost = "apoorv";
$localhost = mysql_pconnect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT reciever,sender, title, `timestamp` FROM t_message WHERE reciever='$unam' and status='unread'";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = @mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
$_SESSION['unread']=$totalRows_Recordset1;
$maxRows_Recordset2 = 10;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;
$hostname_localhost = "localhost";
$database_localhost = "castlesh_jack";
$username_localhost = "castlesh_root";
$password_localhost = "apoorv";
$localhost = mysql_pconnect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_localhost, $localhost);
$query_Recordset2 = "SELECT reciever,sender, title, `timestamp` FROM t_message WHERE reciever='$unam' and status='read'";
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $localhost) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = @mysql_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;

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

$queryString_Recordset2 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset2") == false && 
        stristr($param, "totalRows_Recordset2") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset2 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset2 = sprintf("&totalRows_Recordset2=%d%s", $totalRows_Recordset2, $queryString_Recordset2);
?>    
      <tr><td>
<br/><h2 class="titlehdr" align="left"><a href="newmessage.php">New Message</a></h2>   
</td></tr>

<tr><td><fieldset><legend>
<h3 class="titlehdr" >Unread Message</h3></legend>
 <?php if($noti!=0){ ?>
<table width="700" border="1"  cellspacing="0" cellpadding="4">
 <tr>
    <td bgcolor="#CCCCCC">Sender</td>
    <td bgcolor="#CCCCCC">Title</td>
    <td bgcolor="#CCCCCC">Date of creation</td>
    
  </tr>

  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['sender']; ?></td>
      <td><a href="readmessage.php?mrc=<?php echo $row_Recordset1['reciever'];?>&msd=<?php echo $row_Recordset1['sender'];?>&mttl=<?php echo $row_Recordset1['title']; ?>&mstmp=<?php echo $row_Recordset1['timestamp']; ?>" ><?php echo $row_Recordset1['title']; ?></a></td>
      <td><?php echo $row_Recordset1['timestamp']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table><?php } else if($noti==0)?><p ><?php echo "You have no unread message" ;?></p>
</td></tr>



<tr><td>


<table border="0" >
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
</table>
</fieldset>
</td></tr>



<tr><td>
</p>
<p><fieldset><legend><h3  class="titlehdr">Read Message</h3></legend>
   <?php if($totalRows_Recordset2!=0){ ?>
<table width="700" border="1"  cellspacing="0" cellpadding="4">

  <tr>
    <td bgcolor="#CCCCCC">Sender</td>
    <td bgcolor="#CCCCCC">Title</td>
    <td bgcolor="#CCCCCC">Date of creation</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset2['sender']; ?></td>
      <td><a href="readmessage.php?mrc=<?php echo $row_Recordset2['reciever'];?>&msd=<?php echo $row_Recordset2['sender'];?>&mttl=<?php echo $row_Recordset2['title']; ?>&mstmp=<?php echo $row_Recordset2['timestamp']; ?>" ><?php echo $row_Recordset2['title']; ?></a></td>
      <td><?php echo $row_Recordset2['timestamp']; ?></td>
    </tr>
    <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
</table><?php } else if($noti==0)?><p ><?php echo "You have no Read message" ;?>
</td></tr>

<tr><td>
<table  border="0">
  <tr>
    <td><?php if ($pageNum_Recordset2 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset2=%d%s", $currentPage, 0, $queryString_Recordset2); ?>">First</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset2 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset2=%d%s", $currentPage, max(0, $pageNum_Recordset2 - 1), $queryString_Recordset2); ?>">Previous</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset2 < $totalPages_Recordset2) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset2=%d%s", $currentPage, min($totalPages_Recordset2, $pageNum_Recordset2 + 1), $queryString_Recordset2); ?>">Next</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_Recordset2 < $totalPages_Recordset2) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset2=%d%s", $currentPage, $totalPages_Recordset2, $queryString_Recordset2); ?>">Last</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table></fieldset>
</td></tr>

<div class="footer">
  <tr> 
    <td colspan="3">
    </td>
  </tr></div>
</table>

</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>