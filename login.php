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
				$nameErr = "euid is required";
		} 
		else 
		{
					$uname = $_POST["euid"];
					
					$result=mysql_query("select Password from registerTable where UntId='$uname'");
					
					$row=mysql_fetch_assoc($result);
					
					$passw= $row['Password'];
					
					//$result1=mysql_query("select FirstName from user where UserName='$uname'");
		
					//$row1=mysql_fetch_row($result1);
					//$fname=$row['FirstName'];
					
					session_start();
					$_SESSION['username1']=$uname;		
					
					//$_SESSION['firstname']=$fname;
					
					if (empty($_POST["Password"])) 
					{
							$passErr = "Password is required";
					} 
					else 
					{
						$pwd1= $_POST["Password"];
						
							if(strcmp($pwd1,$passw)== 0){
								header("Location:MainPage.php");
								mysql_close($database);
							}
							else{
								$passErr = "username or password is wrong";
							}
						}	
				}				
	}
  }
?>