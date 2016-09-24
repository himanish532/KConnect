<?php


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
try
{
	
	$username=$_POST["userid"];
	$password=$_POST["passid"];
	$email=$_POST["email"];
	$usertype=$_POST["type"];
	$secqn=$_POST["secqns"];
	$secan=$_POST["secans"];
	$untid=$_POST["euid"];
	$hostname="student-db.cse.unt.edu";
	$user="hk0367";
	$count=0;
	$pwd="hk0367";
	if($database=mysql_connect($hostname,$user,$pwd))
	{
		$conn=mysql_select_db("hk0367");
		$result=mysql_query("INSERT INTO registerTable (Username,Password,Email,UserType,UntId,Secqns,Secans) VALUES ('$username','$password','$email','$usertype','$untid','$secqn','$secan');");
		header("Location:index.php");	
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