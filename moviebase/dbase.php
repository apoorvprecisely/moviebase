<?php 
include 'dbc.php';
page_protect();


?>

<?php require_once('Connections/localhost.php'); ?>
<?php
$uname=$_SESSION['user_email'];
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

mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT movieid, uname, `file`, filesize, extension, type FROM t_movie WHERE uname = '$uname' ORDER BY file ASC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

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


 require_once('Connections/localhost.php'); ?>

<html>
<head>
<title>My List</title>
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
    <td width="1000">
<?php 
/*********************** MYACCOUNT MENU ****************************
This code shows my account menu only to logged in users. 
Copy this code till END and place it in a new html or php where
you want to show myaccount options. This is only visible to logged in users
*******************************************************************/
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
$query="SELECT * FROM t_message WHERE reciever='$unam' and status='unread'";
mysql_query($query,$cid);
	$noti=mysql_affected_rows($cid);
echo $noti;	

	mysql_close($cid);
?>)</div></td></tr>
<?php }
if (checkAdmin()) {
/*******************************END**************************/
?>
      <p> <a href="admin.php"></a></p>
	  <?php } ?>
      
      
      
      
<tr>
    <td width="732" valign="top">
      <h3 class="titlehdr"><div align="right"></div></h3>  
	  <?php	
      if (isset($_GET['msg'])) {
	  echo "<div class=\"error\">$_GET[msg]</div>";
	  }
	  	
		  
	  ?>
	 
<p><div align="center"><table width="900" align="center" border="0" cellpadding="4" cellspacing="1">
	  <?php
    echo "<div >Add Movie/TV Title</div>\n";
	echo "<div class=\"addform\"><form method='post' action=\"add.php?uname=$uname\">\n".
	"	<input type=\"text\" style=\"width: 720px\" name=\"file\"/>\n".
	"	<input type=\"text\" name=\"type\"/>\n".
	"	<input type=\"image\" src=\"images/add.png\" alt=\"Add Row\" class=\"update\" title=\"Add Row\">\n".
	"</form></div>";
    ?>
    
      </table></div>
 </td></tr> 
  <tr><td>
  
  
</p>
     <table  align="center" border="0" cellspacing="0" cellpadding="4">
<tr>
<td>
 
</td>
</tr>




        <tr>
          
          
          <td bgcolor="">Title</td>
         
          
          <td bgcolor="">Type</td>
        </tr>
        <?php do { ?>
          <tr>
           <form name="updater" method='post' action="dupdate.php?movieid=<?php echo $row_Recordset1['movieid'];?>">
           
            <td><input name="file" type="text" style="width: 720px " value="<?php echo $row_Recordset1['file']; ?>"></td>
            
            <td><input name="type" type="text" value="<?php echo $row_Recordset1['type']; ?>"></td>
            <td><input type="image" src="images/update.png" alt="Update Row" class="update" title="Update Row"><a href="delete.php?movieid=<?php echo $row_Recordset1['movieid'];?>"><img title='Delete Row' alt=\"Delete\" class='del' src='images/delete.png'/></a></td></form>
          </tr>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table></td></tr>
    <tr><td><table align="center" border="0">
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
  
  
  
 
<tr><td>
<b>Legend:</b>
<br />
<img alt="Add" src="images/add.png"> Add a row after entering the correct information.<br />
<img alt="Update" src="images/update.png"> Update a row after editing it.<br />
<img alt "Delete" src="images/delete.png"> Delete a row.<br />
</div>
</td></tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
