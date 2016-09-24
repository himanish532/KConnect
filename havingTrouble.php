<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Forgot Password | Can't login | KConnect</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" title="Red" href="KnowledgeSharing/KShop/style_green.css" />

<script src="KnowledgeSharing/KShop/styleswitch.js" type="text/javascript"></script>
<script src="KnowledgeSharing/KShop/LoginValidation.js"></script>
<script src="WelcomeValidation.js"></script>

<!-- PHP code to compare email id from the textbox with email id from database -->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$mailid=$_POST["email1"];
	$qns=$_POST["secqns"];
	$ans=$_POST["secans"];
	$hostname="student-db.cse.unt.edu";
	$user="hk0367";
	$pwd="hk0367";
	$nameErr= $uname = $passErr = $pwd1 = "";
	
	if($database=mysql_connect($hostname,$user,$pwd))
	{
		$conn=mysql_select_db("hk0367");
		
		if (empty($_POST["euid"])) 
		{
				$nameErr = "euid is required";
		} 
		else 
		{
					$uname = $_POST["euid"];
					
					$result=mysql_query("select Password from registerTable where UntId='$uname'");
					
					$row=mysql_fetch_assoc($result);
					
					$passw= $row['Password'];
					
					$result1=mysql_query("select Username from user where UntId='$uname'");
		
					$row1=mysql_fetch_assoc($result1);
					$fname=$row1['Username'];
					
					session_start();
					$_SESSION['username1']=$uname;		
					
					$_SESSION['firstname']=$fname;
					
					if (empty($_POST["Password"])) 
					{
							$passErr = "Password is required";
					} 
					else 
					{
						$pwd1= $_POST["Password"];
						
							if(strcmp($pwd1,$passw)== 0)
							{
								header("Location:MainPage.php");
								mysql_close($database);
							}
							else
							{
								$passErr = "username or password is wrong";
							}
					}	
		}	
		
		
		// Code for Forgot password and error message display
		
		$result0=mysql_query("select Password from registerTable where Email='$mailid' AND Secqns='$qns' AND Secans='$ans';");
		$row1=mysql_fetch_assoc($result0);
		if(mysql_num_rows($result0)==0)
		{
			$err = "Oops!!! there is no PASSWORD registered with the given details...";
		}
		else
		{	
			$data1=$row1['Password'];	
		}
	}
}	
?>



</head>

<body>

<div id="header">
  <div id="header_inner" class="fixed">
  
    <div id="logo">
      <a href="index.php"><h1 style="font-size:60px;"><span>KConnect</span></h1></a>
    </div>
	
<div id="menu" style="bottom: 0.1em;">

<form id="form1" name='login' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table cellspacing="5">
<tbody>

<tr>
<td><label for="euid" style="font-size:medium; font-weight:bold; color:white"> UNT ID </label></td>
<td><label for="Password" style="font-size:medium; font-weight:bold; color:white"> Password </label></td>
</tr>

<tr cellspacing="5">
<td><input type="text" name="euid" placeholder="UNT ID"></td>
<td><input type="password" name="Password" Placeholder="Password"></td>
</tr>

<!--<tr>
<td><span class="error" style="color:white"> <?php echo $nameErr;?></span></td>
<td><span class="error" style="color:white"> <?php echo $passErr;?></span></td>
</tr>-->

<tr>
<td><input type="submit" value=" Log in " style="font-size:small"></td>  <!-- On Click should redirect to Home Page -->
<td><a href="havingTrouble.php" style="color:white; font-size:medium">Having trouble ?</a></td>
</tr>

</tbody>
</table>
</form>      


    </div>
  </div>
</div>

<div id="main">
  <div id="main_inner" class="fixed">
    <div id="primaryContent_2columns">
      <div id="columnA_2columns">
       
			
			
			
			<br class="clear" />
			<div class="post">
			  <h3 style="font-family:Comic Sans MS;">Your Password is :</h3>
			 
			 <span class="error" Style="font-family:Comic Sans MS; font-size:large; font-weight:bold"> <?php echo $data1;?> </span>
			 <span class="error" Style="font-family:Comic Sans MS; font-size:large; color:Red"> <?php echo $err;?> </span>
			 <p> </p>
			  
			 
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<fieldset>
			<legend style="font-family:Monotype Corsiva; font-size:large"> Find Your Account </legend>
			
			<table>
			<tr>
			<td><label for="email1"> Email </label></td>
			<td><label for="secqns"> Security Question </label></td>
			<td><label for="secans"> Security Answer </label></td> 
			</tr>
			
			<tr>			
			<td><input type="email" name="email1" Placeholder="Enter your registered mailID"></td>
			<td> 
					<select name="secqns"> 
						<option selected="" value="Default">(Please select a security question)</option> 
						<option> What is your first pet name ? </option>
						<option> Who is your inspiration ? </option>	
						<option> What is your favourite color ?  </option>
						<option> Where are you from ? </option>
					</select>
			</td>
			<td><input type="text" name="secans" Placeholder="Enter your security answer"></td>
			</tr>
			
			<tr>
			<td><input type="submit" class="button" value=" Search " style="font-size:small; width: 7em;  height: 2em;"></td>  
			<td><a href="index.php"><input type="button" class="button" value="Close" style="font-size:small; width: 7em;  height: 2em;"></a></td>
			</tr>
			</table>
			</fieldset>
			</form>
			  
			</div>
      </div>
    </div>

    
    <br class="clear" />
  </div>
</div>
<div id="footer" class="fixed"> Copyright &copy; 2016 KConnect Website. All rights reserved. </div>
</body>
</html>
