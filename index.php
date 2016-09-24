<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Welcome to KConnect</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" title="Red" href="KnowledgeSharing/KShop/style_green.css" />

<script src="KnowledgeSharing/KShop/styleswitch.js" type="text/javascript"></script>
<script src="KnowledgeSharing/KShop/LoginValidation.js"></script>
<script src="WelcomeValidation.js"></script>

<!-- PHP Code -->
<?php
  
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
	$hostname="student-db.cse.unt.edu";  
	$user="hk0367";
	$count=0;
	$pwd="hk0367";
	
  $nameErr= $uname = $passErr = $pwd1 = "";
	  
	if($database=mysql_connect($hostname,$user,$pwd))
	{
		
		$conn=mysql_select_db("hk0367");
		
        		//echo 'Username and Password Found';
				
		 if (empty($_POST["euid"])) 
		 {
				$nameErr = "euid is required !!!";
		} 
		else 
		{
					$uname = $_POST["euid"];
					
					$result=mysql_query("select Password from registerTable where UntId='$uname'");
					$row=mysql_fetch_assoc($result);
					$passw= $row['Password'];
					
					$result1=mysql_query("select Username from registerTable where UntId='$uname'");
					$row1=mysql_fetch_assoc($result1);
					$fname=$row1['Username'];
					
					session_start();
					$_SESSION['username1']=$uname;		
					$_SESSION['passwd']=$passw;
					$_SESSION['firstname']=$fname;
					
					if (empty($_POST["Password"])) 
					{
							$passErr = "Password is required !!!";
					} 
					else 
					{
						$pwd1= $_POST["Password"];
						
							if(strcmp($pwd1,$passw)== 0){
								header("Location:MainPage.php");
								mysql_close($database);
							}
							else{
								$passErr = "username or password is wrong !!!";
							}
						}	
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

<tr>
<td><span class="error" style="color:Red; font-size:small"> <?php echo $nameErr;?></span></td>
<td><span class="error" style="color:Red"> <?php echo $passErr;?></span></td>
</tr>

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
       
        <img src="KnowledgeSharing/KShop/images/Back1.png" class="floatTL" alt="Something scenic" height="150" width="150"/>
        
        <br class="clear" />
        <div class="post">
          <h3>About the Application</h3>
         
          <p><h3>
KConnect is the place where knowledge connects people.		  
This is an open Discussion forum. This application helps you to ask any query based on the subject knowledge or you can help your friends by ansewering their doubts, which will eventually create a healthy discussion
virtually and connects students from all programs.
</h4></h3></p>
          
        </div>
      </div>
    </div>

    <div id="secondaryContent_2columns">
      <div id="columnC_2columns">
	<h3>Sign Up</h3>
	<!-- onSubmit="return formValidation();" -->
	<form name='registration' method="post" action="register.php"">
        
        <ul class="links">
		<li class="first"> <label for="userid"> UserName </label> 
		<input type="text" name="userid" required></li>
        <li><label for="passid"> Password </label> 
		<input id="pass1" type="password" name="passid" required></li>
		<li><label for="cpassid"> Confirm Password </label> 
		<input id="pass2" type="password" name="cpassid" required></li>
        <li><label for="email"> Email </label> 
		<input type="email" name="email" required></li>
		<li><label for="type"> User Type: </label> 
					<select name="type" required> 
						<option selected="" value="Default">(Please select a user type)</option> 
						<option> Professor </option>
						<option> TA/RA/GA </option>	
						<option> Graduate Student </option>
						<option> Freshman </option>
					</select>
		</li>
		<li><label for="secqns"> Security Question </label> 
					<select name="secqns" required> 
						<option selected="" value="Default">(Please select a security question)</option> 
						<option> What is your first pet name ? </option>
						<option> Who is your inspiration ? </option>	
						<option> What is your favourite color ?  </option>
						<option> Where are you from ? </option>
					</select>
		</li>
		<li> <label for="secans"> Security Answer </label> 
		<input type="text" name="secans" required></li>
		<li> <label for="euid"> UNT ID </label> 
		<input type="text" name="euid" maxlength="8" required></li>
		<li> <input type="submit" name="submit" class="button" value="Submit" style="font-size: small; height:30px; width:60px" /> 
		<input type="reset" value="Reset" style="height:30px; width:60px"></li>
	
        </ul>
        
       </form> 
      </div>
    </div>
    <br class="clear" />
  </div>
</div>
<div id="footer" class="fixed"> Copyright &copy; 2016 KConnect Website. All rights reserved. </div>
</body>
</html>
