<?php
ini_set( "display_errors", 0);
 require_once('Connections/localhost.php'); ?>

<?php 
include 'dbc.php';
page_protect();
?>

<html>
<head>
<title>Inbox</title>
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
?>)</div></td></tr>



<?php }
if (checkAdmin()) {
/*******************************END**************************/
?>
      <p> <a href="admin.php">Admin CP </a></p>
	  <?php } ?>
   
   
   
   
    <tr>
    <td width="732" valign="top"><p>&nbsp;</p>
      <h3 class="titlehdr">Welcome <?php echo $_SESSION['user_name'];?></h3> </td></tr> 
	  <?php	
      if (isset($_GET['msg'])) {
	  echo "<div class=\"error\">$_GET[msg]</div>";
	  }
	  	
		  
	  ?>
      <p>
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
$mrc=$_GET['mrc'];
$msd=$_GET['msd'];
$mttl=$_GET['mttl'];
$mstmp=$_GET['mstmp'];
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
$query_Recordset1 = "SELECT * FROM t_message WHERE sender ='$msd' and reciever ='$mrc' and title ='$mttl' and timestamp ='$mstmp' ";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
//update to read


if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = @mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;


$dbserver="localhost";
$dbuser="castlesh_root";
$dbpwd="apoorv";
$dbname="castlesh_jack";

$cid=mysql_connect($dbserver,$dbuser,$dbpwd) or die('try again');

mysql_select_db($dbname,$cid);

$query="update t_message set status='read' WHERE sender ='$msd' and reciever ='$mrc' and title ='$mttl' and timestamp ='$mstmp' ";
mysql_query($query,$cid);
	$n=mysql_affected_rows($cid);
	
	mysql_close($cid);

?>
      


      </p>
      <tr><td>
      <table width="700" border="1" align="center" cellspacing="0" cellpadding="4">
        
        <?php do { ?>
          <tr>
            <td>Sender:<?php echo $row_Recordset1['sender']; ?></td></tr>
          <tr>
            <td>Title:<?php echo $row_Recordset1['title']; ?></td></tr>
            <tr><td>Message-<br/><br/><?php echo $row_Recordset1['message']; ?></td></tr>
          
          <?php 
		  $id=$row_Recordset1['sender'];
		  } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table></td></tr>
      
      
   
  <tr>
  <td ><h3 align="center"><a href="newmessage.php?id=<?php echo $id?>">Reply</a></h3>


  </td>
  </tr>
  
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
?>