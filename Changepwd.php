<html>
<head>
<?php
session_start();
	$name2=$_SESSION['name1'];
	$uname=$_SESSION['username3'];
	$pwd2=$_SESSION['pwd1']; // the password used to login or password from registerTable
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
try
{

	$opwd=$_POST['opassid'];// old password entered in this page
	$npwd=$_POST['npassid'];// new password entered in this page
	$hostname="student-db.cse.unt.edu";
	$user="hk0367";
	$count=0;
	$pwd="hk0367";
	$disp="";
	$err="";
	if($database=mysql_connect($hostname,$user,$pwd))
	{
							
		$conn=mysql_select_db("hk0367");
		$c=strcmp($opwd,$pwd2);
		if($c==0)
		{
			$result=mysql_query("UPDATE registerTable set Password='$npwd' WHERE UntId='$uname';");
			$disp = "Password changed susseccfully !!!";
			//echo $npwd;
		}
		
		else
		{	
			$err = "Oops!!! Incorrect password has been entered...";	
		}
		
	}
	else
	{
		throw new exception("Connection not created");
	}
}

catch(Exception $ex)
{
	echo $ex->getmessage();
}
}
?>

<title>Change your Password</title>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<!-- Original style, script -->
<link rel="stylesheet" type="text/css" title="Green" href="KnowledgeSharing/KShop/style_green.css" />
<script src="KnowledgeSharing/KShop/styleswitch.js" type="text/javascript"></script>

<!-- Bootstrap style, script -->
  <link rel="stylesheet" type="text/css" href="KnowledgeSharing/KShop/bootstrapcss.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 

<style>
ul li {display: inline-block;}
ul li:hover {background: #555;}
ul li:hover ul {display: block;}
ul li ul 
{
  position: absolute;
  width: 200px;
  display: none;
}
ul li ul li 
{ 
  background: #555; 
  display: block;
}
ul li ul li a {display:block !important;} 
ul li ul li:hover {background: #666;}
</style> 

</head>


<body>

<div id="header">
  <div id="header_inner" class="fixed">
    
	<div id="logo1">
      <!--<h2><span>Welcome to KShop</span></h2>-->
	  <a href="MainPage.php"><img src="KnowledgeSharing/KShop/images/Logo.jpg" class="floatTL" alt="Something scenic" height="70" width="70"/></a>
    </div>
	
	<!-- id="menu" -->	
	<div class="container" style="float:right">
	<ul class="nav nav-pills">

	
	<li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#menu3"><?php echo $name2; ?><span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="editProfile.php">Edit Profile</a></li>
        <li><a href="Changepwd.php">Change Password</a></li>
        <li><a href="Signout.php">Sign Out</a></li>                        
      </ul>
    </li>
	
	</ul>
	
	</div>  
	
  </div>
</div>

<div id="main">
  <div id="main_inner" class="fixed">
    <div id="primaryContent_3columns">
	<div id="columnA_3columns" style="width:670px">
    <p style="font-size:x-large; font-family:Monotype Corsiva"> Change your Password here: </p>
	
	<span class="error" Style="font-family:Comic Sans MS; font-size:large; color:Red"> <?php echo $err;?> </span>
	<span class="error" Style="font-family:Comic Sans MS; font-size:large; color:Green"> <?php echo $disp;?> </span>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
	<fieldset>
	<legend style="font-family:Monotype Corsiva; font-size:large"> Enter your Password </legend>
	
	<table>
	<tr>
	<td><label for="opassid"> Old Password - </label></td> 
	<td><input id="pass1" type="password" name="opassid"></td>
	</tr>

	<tr>	
	<td><label for="npassid"> New Password - </label></td> 
	<td><input id="pass2" type="password" name="npassid"></td>
	</tr>	
	
	<tr>
	<td><input type="submit" class="button" value=" Confirm " style="font-size:small; width: 7em;  height: 2em;"></td>
	</tr>
	</table>
	
	</fieldset>
	</form>
	
    </div>
    <br class="clear" />
  </div>
  </div>
</div>

</br></br><br>
<div id="footer" class="fixed"> Copyright &copy; 2016 KConnect. All rights reserved. </div>
</body>


</html>