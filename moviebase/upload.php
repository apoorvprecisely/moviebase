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
/*******************************END**************************/
?>
      <p> <a href="admin.php">Admin CP </a></p>
	  <?php } ?>
      </td></tr>
      
      <tr>
    <td width="732" valign="top"><p>&nbsp;</p>
      <h3 class="titlehdr">Welcome <?php echo $_SESSION['user_name'];
	  
	
	  
	  
	  ?></h3>
    
	  <?php	
      if (isset($_GET['msg'])) {
	  echo "<div class=\"error\">$_GET[msg]</div>";
	  }
	  	
		  
	  ?>
      <p>
 <?php 
 $newname = $unam."csv"; 

 $target = 'upload/'.$newname;
  
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
 
 //This is our size condition 
 if ($uploaded_size > 350000) 
 { 
 echo "Your file is too large.<br>"; 
 $ok=0; 
 } 
 
 //This is our limit file type condition 
 if ($uploaded_type =="text/php") 
 { 
 echo "No PHP files<br>"; 
 $ok=0; 
 } 
 
 //Here we check that $ok was not set to 0 by an error 
 if ($ok==0) 
 { 
 Echo "Sorry your file was not uploaded"; 
 } 
 
 //If everything is ok we try to upload it 
 else 
 { 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 { 
 echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded"; 
 } 
 else 
 { 
 echo "Sorry, there was a problem uploading your file."; 
 } 
 } 
 
 
 $fp=fopen("$target","r");

$delimiter=",";
while ($row=fgetcsv($fp,$fs,$delimiter))
{

$dbserver="localhost";
$dbuser="castlesh_root";
$dbpwd="apoorv";
$dbname="castlesh_jack";
$uname=$_SESSION['user_email'];
$cid=mysql_connect($dbserver,$dbuser,$dbpwd) or die('try again');
mysql_select_db($dbname,$cid);
$query="SELECT * FROM t_movie WHERE uname='$uname' and file='$row[0]'";
mysql_query($query,$cid);
$noti=mysql_affected_rows($cid);

mysql_close($cid);
 if($noti=='0')
{

$dbserver="localhost";
$dbuser="castlesh_root";
$dbpwd="apoorv";
$dbname="castlesh_jack";
$uname=$_SESSION['user_email'];
$cid=mysql_connect($dbserver,$dbuser,$dbpwd) or die('try again');
mysql_select_db($dbname,$cid);
$query="insert ignore into t_movie (uname,file,filesize,extension,type) values('$uname','$row[0]','$row[1]','$row[2]','$row[3]')";
mysql_query($query,$cid);
$not=mysql_affected_rows($cid);
	
mysql_close($cid);
	

}



}
fclose($fp);
$fp=fopen("$target","w");

fclose($fp); 
 
 
 
 ?> 
 
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