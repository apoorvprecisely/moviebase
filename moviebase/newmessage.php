<?php 
include 'dbc.php';
page_protect();
?>

<html>
<head>
<title>New Message</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="styles.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
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

</td></tr>

<?php }
if (checkAdmin()) {
?>
      <p> <a href="admin.php">Admin CP </a></p>
	  <?php } ?>
    
    
    
    <tr>
    <td width="732" valign="top"><p>&nbsp;</p>
      <h3 class="titlehdr">Welcome <?php echo $_SESSION['user_name'];?></h3>  
	  <?php	
      if (isset($_GET['msg'])) {
	  echo "<div class=\"error\">$_GET[msg]</div>";
	  }
	  	
		  
	  ?>
     </td></tr>
     
     
     <tr><td> 
<div >
	<h3 align="center">New Personnal Message</h3>
    <form action="newmessage.php" method="post" onSubmit="MM_validateForm('title','','R','recip','','R','message','','R');return document.MM_returnValue">
		<br />
        <fieldset><legend>Form</legend>
        <label for="title">Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text"  id="title" name="title" /><br /><br />
        <label for="recip">Recipient</label><input type="text"  id="recip" name="recip" value="<?php echo $id=$_GET['id'];?>"/><br /><br />
        <label for="message">Message</label><br/><textarea cols="40" rows="5" id="message" name="message"></textarea><br />
        </fieldset><input type="submit" name='send' value="Send" />
    </form>
</div>

</td></tr>
<tr><td>
	 
     
<?php 
if(isset($_REQUEST['send']))
{
$sender=$_SESSION['user_email'];	
$reciever=$_REQUEST['recip'];	
$title=$_REQUEST['title'];	

$message=$_REQUEST['message'];	
date_default_timezone_set('Asia/Kolkata');
$timestamp=date('m/d/Y h:i:s a', time());
$status='unread';
	
$dbserver="localhost";
$dbuser="castlesh_root";
$dbpwd="apoorv";
$dbname="castlesh_jack";

$cid=mysql_connect($dbserver,$dbuser,$dbpwd) or die('try again');

mysql_select_db($dbname,$cid);

$query="insert into t_message values('$sender','$reciever','$title','$message','$timestamp','$status')";
mysql_query($query,$cid);
	$n=mysql_affected_rows($cid);
 mysql_close($cid);
?><h3><?php echo "Messsage Sent Successfully"?></h3><?php
}
?> </td></tr>


    <div class="footer">
  <tr> 
    <td colspan="3">
    </td>
  </tr></div>
</table>
</body>
</html>

