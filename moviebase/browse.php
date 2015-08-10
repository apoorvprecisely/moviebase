<?php

ini_set( "display_errors", 0);
include 'dbc.php';
page_protect();


?>
<?php require_once('Connections/localhost.php'); ?>


<html>
<head>
<title>Browse Database</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="wrapper">
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
  <a href="dbase.php"> Edit List |</a>
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
    
     <tr>
    <td width="732" valign="top">
      
	  <p><br/><br/><br/>
      <h1 class="titlehdr" align="center">Browse The Castle</h1><br/>
      
      <form name="go" id="go" method="get" action="searchresult.php">
      <table align="center">
      <table align="center" border="1" cellspacing="0" cellpadding="0" bgcolor="#cad9ea">
      <tr>
      <td>
      <input name="movie" type="checkbox" value="1" >Movies
      <br><input name="moviehd" type="checkbox" value="1" >Movie/HD/Brrip/1080p
      <br><input name="movie480" type="checkbox" value="1" >Movie/480p
      <br><input name="movie720" type="checkbox" value="1" >Movie/720p
      <br><input name="moviedvdrip" type="checkbox" value="1" >Movie/Dvdrip
      <br/>
      </td>
      <td>
      <input name="tv" type="checkbox" value="1" >TV
      <br><input name="tv480" type="checkbox" value="1" >TV/480p
      <br><input name="tvmp4" type="checkbox" value="1" >TV/mp4
      <br><input name="tvhdtv" type="checkbox" value="1" >TV/HDTV
      <br><input name="tvmsd" type="checkbox" value="1" >TV/mSD
      <br>
      </td>
     <td><input name="boys" type="checkbox" value="1" >Hostel/Boys
      <br/><input name="girls" type="checkbox" value="1"  >Hostel/Girls
      <br/>
      </td>
       <td><input name="blockvalue" type="checkbox" value="1" >Search By Block
      <select name="block">
      <option value="a">A</option>
      <option value="b">B</option><option value="c">C</option><option value="d">D</option><option value="e">E</option><option value="f">F</option><option value="g">G</option><option value="h">H</option><option value="i">I</option><option value="j">J</option><option value="k">K</option><option value="l">L</option><option value="m">M</option><option value="n">N</option>
      
      </select>
      <br/>
      </td>
       </tr>
       </table>
       <table align="center">
      <tr><td>
      Search:<br><input type="text"  name="string" style="width: 720px" ><input name="submit1" type="submit" value="submit" />     
    </td></tr>
  <tr><td>
  </td></tr>  
    
    
    </table>
     </table>

      </form>
      
      </td></tr>
      
      
     
  

  <tr>
    <td>&nbsp;</td></tr>




</table></div>
<div align="center" class="footer">
  
    Copyright (c) 2012 castleshare.com. All rights reserved. Design by APV.
    </div>
</body>
</html>
