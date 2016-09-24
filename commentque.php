<?php

session_start();
$username4=$_SESSION['username3'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
try
{

	$t=$_POST["item"];
	//$username4=$_SESSION['username3'];
	$ans=$_POST["ansarea"];
	$hostname="student-db.cse.unt.edu";
	$user="hk0367";
	$count=0;
	$pwd="hk0367";

	if($database=mysql_connect($hostname,$user,$pwd))
	{
							
		$conn=mysql_select_db("hk0367");
		$result1=mysql_query("select id from postTable where question='$t'");
		$row=mysql_fetch_assoc($result1);
		$i=$row['id'];
		$result=mysql_query("UPDATE postTable set answer='$ans' WHERE question='$t';");
		$result=mysql_query("INSERT INTO commentTable (qid, answer, fkUId) VALUES ('$i','$ans', '$username4');");
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
}
?>