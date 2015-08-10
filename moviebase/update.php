<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php 
include 'dbc.php';
page_protect();
?>

<html>
<head>
<title>Update List</title>
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
    </td></tr>
 
 
    <tr><td>
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
  <a href="dbase.php">Edit List |</a>
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
/*******************************END**************************/
?>
      <p> <a href="admin.php">Admin CP </a></p>
	  <?php } ?>
      </td></tr>
      
      <tr>
    <td width="732" valign="top"><p>&nbsp;</p>
      <h3 class="titlehdr">Welcome <?php echo $_SESSION['user_name'];
	  
	
	  
	  
	  ?></h3>
    
	  <p>
	    <?php	
      if (isset($_GET['msg'])) {
	  echo "<div class=\"error\">$_GET[msg]</div>";
	  }
	  	
		  
	  ?>
	  </p>
	  <p>
      
 <br/><fieldset><legend><strong>Step 1</strong></legend>
      <br/>
        Download this <a href="castleplugin.rar">plugin</a> extract it and follow the instructions in instruction.txt      </p>
<p><br/>NOTE:You will have to download this only once 
<br/><br/>Q:Why downloading this plugin is necessary?<br/>A:1.Because this is the only way we can access your folder and files
<br/>2.It is always better than downloading a 700MB movie when you can get it here at castleshare.
<form enctype="multipart/form-data" action="upload.php" method="POST"></fieldset>
<br/><fieldset><legend><strong>Step 2</strong></legend>
 <br/>Please choose "list.csv": <input name="uploaded" type="file" />
 <input type="submit" value="Upload" />
 </form> 
This form sends your file "list.csv"</fieldset>
      </td></tr>
    <tr><td>

    <div class="footer">
  <tr> 
    <td colspan="3">
    </td>
  </tr></div>  
</table>

</body>
</html>

