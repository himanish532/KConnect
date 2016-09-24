<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
try
{
	//$username=$password=$email=$usertype=$secqn=$secan=$untid=0;
	$usernameerr=$passworderr=$emailerr=$usertypeerr=$secqnerr=$secanerr=$untiderr="";
	
	
	
	
	$hostname="student-db.cse.unt.edu";
	$user="hk0367";
	$count=0;
	$pwd="hk0367";
	
	if($database=mysql_connect($hostname,$user,$pwd))
	{
		
		$conn=mysql_select_db("hk0367");
		
		
		if(empty($_POST["userid"])) 
		{
			$a=1;
			$usernameerr = "Username is required !!!";
		}
		else
		{
			$username=$_POST["userid"];
		}
		
		if(empty($_POST["passid"]))
		{
			$b=1;
			$passworderr = "Password is required !!!";	
		}
		else
		{
			$password=$_POST["passid"];
		}
		
		if(empty($_POST["email"]))
		{
			$c=1;
			$emailerr = "Email is required !!!";	
		}
		else
		{
			$email=$_POST["email"];
		}
		
		if(empty($_POST["type"]))
		{
			$d=1;
			$usertypeerr = "UserType is required !!!";	
		}
		else
		{
			$usertype=$_POST["type"];
		}
		
		if(empty($_POST["secqns"]))
		{
			$e=1;
			$secqnerr = "Security Question is required !!!";	
		}
		else
		{
			$secqn=$_POST["secqns"];
		}	
		
		if(empty($_POST["secans"]))
		{
			$f=1;
			$secanerr = "Security Answer is required !!!";	
		}
		else
		{
			$secan=$_POST["secans"];
		}	
		
		if(empty($_POST["euid"]))
		{
			$g=1;
			$untiderr = "UntId is required !!!";	
		}
		else
		{
			$untid=$_POST["euid"];
		}
		
		if($a&&$b&&$c&&$d&&$e&&$f&&$g==1)
		{
			//$emptyerr = "All fields need values"
			//echo "<script type='text/javascript'>alert('failed!')</script>";
			//echo "registeration failed";
			//echo $untiderr;
		}	
		
		else
		{
			$result=mysql_query("INSERT INTO registerTable (Username,Password,Email,UserType,UntId,Secqns,Secans) VALUES ('$username','$password','$email','$usertype','$untid','$secqn','$secan');");
			header("Location:index.php");
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