<?php
try
{
session_start();
	$username2=$_SESSION['username3'];
	$name2=$_SESSION['name1'];
	$question=$_POST["tarea"];
	$hostname="student-db.cse.unt.edu";
	$user="hk0367";
	$count=0;
	$pwd="hk0367";

	if($database=mysql_connect($hostname,$user,$pwd))
	{
							
		$conn=mysql_select_db("hk0367");
		echo "username and password found";
				
		$result=mysql_query("INSERT INTO postTable (question, fkUntId, uname) VALUES ('$question', '$username2', '$name2');");
		
		header("Location:MainPage.php");
		
	}
	else{
			throw new exception("Connection not created");
		}
}

catch(Exception $ex)
{
	echo $ex->getmessage();
}

?>