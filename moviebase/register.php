<?php 



include 'dbc.php';

$err = array();
					 
if($_POST['doRegister'] == 'Register') 
{ 

foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}


if(empty($data['full_name']) || strlen($data['full_name']) < 4)
{
$err[] = "ERROR - Invalid name. Please enter atleast 3 or more characters for your name";
}

// Validate User Name
if (!isUserID($data['user_name'])) {
$err[] = "ERROR - Invalid user name. It can contain alphabet, number and underscore.";
//header("Location: register.php?msg=$err");
//exit();
}

// Validate Email
if(!isEmail($data['usr_email'])) {
$err[] = "ERROR - Invalid email address.";
//header("Location: register.php?msg=$err");
//exit();
}
// Check User Passwords
if (!checkPwd($data['pwd'],$data['pwd2'])) {
$err[] = "ERROR - Invalid Password or mismatch. Enter 5 chars or more";
//header("Location: register.php?msg=$err");
//exit();
}
	  
$user_ip = $_SERVER['REMOTE_ADDR'];

// stores sha1 of password
$sha1pass = PwdHash($data['pwd']);

// Automatically collects the hostname or domain  like example.com) 
$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);
$path   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

// Generates activation code simple 4 digit number
$activ_code = rand(1000,9999);

$usr_email = $data['usr_email'];
$user_name = $data['user_name'];

$rs_duplicate = mysql_query("select count(*) as total from users where user_email='$usr_email' OR user_name='$user_name'") or die(mysql_error());
list($total) = mysql_fetch_row($rs_duplicate);

if ($total > 0)
{
$err[] = "ERROR - The username/email already exists. Please try again with different username and email.";
}
/***************************************************************************/

if(empty($err)) {
$sql_insert = "INSERT into `users`
  			(`full_name`,`user_email`,`pwd`,`date`,`block`,`room`,`gender`,`users_ip`,`activation_code`,`user_name`
			)
		    VALUES
		    ('$data[full_name]','$usr_email','$sha1pass',now(),'$data[block]','$data[room]','$data[gender]','$user_ip','$activ_code','$user_name'
			)
			";
			
			
mysql_query($sql_insert,$link) or die("Insertion Failed:" . mysql_error());
$user_id = mysql_insert_id($link);  
$md5_id = md5($user_id);
mysql_query("update users set md5_id='$md5_id' where id='$user_id'");
//	echo "<h3>Thank You</h3> We received your submission.";

if($user_registration)  {
$a_link = "
*****ACTIVATION LINK*****\n
http://$host$path/activate.php?user=$md5_id&activ_code=$activ_code
"; 
} else {
$a_link = 
"Your account is *PENDING APPROVAL* and will be soon activated the administrator.
";
}

$message = 
"Hello \n
Thank you for registering with us. Here are your login details...\n

User ID: $user_name
Email: $usr_email \n 
Passwd: $data[pwd] \n

$a_link

Thank You

Administrator
$host_upper
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";

	mail($usr_email, "Login Details", $message,
    "From: \"Member Registration\" <auto-reply@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());

  header("Location: thankyou.php");  
  exit();
	 
	 } 
 }					 

?>
<html>
<head>
<title>Free Registration Form</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>

  <script>
  $(document).ready(function(){
    $.validator.addMethod("username", function(value, element) {
        return this.optional(element) || /^[a-z0-9\_]+$/i.test(value);
    }, "Username must contain only letters, numbers, or underscore.");

    $("#regForm").validate();
  });
  </script>

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
    
    
  <tr> <td>
   <p>
	<?php 
	 if (isset($_GET['done'])) { ?>
	  <h2>Thank you</h2> Your registration is now complete and you can <a href="index.php">login here</a>";
	 <?php exit();
	  }
	?></p>
      <h3 class="titlehdr">Free Registration / Signup</h3>
      <p>Please register a free account, before you can start posting your ads. 
        Registration is quick and free! Please note that fields marked <span class="required">*</span> 
        are required.</p>
	 <?php	
	 if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "* $e <br>";
	    }
	  echo "</div>";	
	   }
	 ?> 
	 
	  <br>
      <form action="register.php" method="post" name="regForm" id="regForm" >
        <table width="95%" border="0" cellpadding="3" cellspacing="3" class="forms">
        <fieldset>
          <tr> 
            <td colspan="2">Your Name <span class="required"><font color="#CC0000">*</font></span><br> 
              <input name="full_name" type="text" id="full_name" size="40" class="required"></td>
          </tr>
          <tr> <tr> 
            <td colspan="2">Block <select name="block">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
            <option value="G">G</option>
            <option value="H">H</option>
            <option value="I">I</option>
            <option value="J">J</option>
            <option value="K">K</option>
            <option value="L">L</option>
            <option value="M">M</option>
            <option value="N">N</option>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Room No <input name="room" type="text"></td>
          </tr>
          <tr> 
            <td colspan="2">Gender <select name="gender"> <option value="male">Male</option> <option value="female">Female</option></select></td>
          </tr>
          <tr> 
           
          </tr>
          
         
          <tr> 
            <td colspan="2"><h4><strong>Login Details</strong></h4></td>
          </tr>
          <tr> 
            <td>Username<span class="required"><font color="#CC0000">*</font></span></td>
            <td><input name="user_name" type="text" id="user_name" class="required username" minlength="5" > 
              <input name="btnAvailable" type="button" id="btnAvailable" 
			  onclick='$("#checkid").html("Please wait..."); $.get("checkuser.php",{ cmd: "check", user: $("#user_name").val() } ,function(data){  $("#checkid").html(data); });'
			  value="Check Availability"> 
			    <span style="color:red; font: bold 12px verdana; " id="checkid" ></span> 
            </td>
          </tr>
          <tr> 
            <td>Your Email<span class="required"><font color="#CC0000">*</font></span> 
            </td>
            <td><input name="usr_email" type="text" id="usr_email3" class="required email"> 
              <span class="example">** Valid email please..</span></td>
          </tr>
          <tr> 
            <td>Password<span class="required"><font color="#CC0000">*</font></span> 
            </td>
            <td><input name="pwd" type="password" class="required password" minlength="5" id="pwd"> 
              <span class="example">** 5 chars minimum..</span></td>
          </tr>
          <tr> 
            <td>Retype Password<span class="required"><font color="#CC0000">*</font></span> 
            </td>
            <td><input name="pwd2"  id="pwd2" class="required password" type="password" minlength="5" equalto="#pwd"></td>
          </tr>
          </fieldset>
        </table>
       <p align="center">
          <input name="doRegister" type="submit" id="doRegister" value="Register">
        </p>
      </form>
     
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
