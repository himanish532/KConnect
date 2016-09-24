<html>
<head>
<?php
session_start();

	$name2=$_SESSION['name1'];
	$uname=$_SESSION['username3'];
	
	
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
try
{
	$t=$_POST["item"];// question that is selected
	echo $_POST["item"];
	$hostname="student-db.cse.unt.edu";
	$user="hk0367";
	$count=0;
	$pwd="hk0367";

	if($database=mysql_connect($hostname,$user,$pwd))
	{
		//echo $t;					
		$conn=mysql_select_db("hk0367");
		$result1=mysql_query("select id from postTable where question='$t'");
		$row=mysql_fetch_assoc($result1);
		$i=$row['id'];
		//echo $i;
		$data=array();
		$result=mysql_query("select answer from commentTable where qid = '$i';");
		while($row=mysql_fetch_assoc($result))
		{
			$data[]=$row['answer'];
			$count++;
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

<title>Answers History</title>

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
    <p style="font-size:x-large; font-family:Monotype Corsiva"> Answers for the question are here: </p>
	
	
	<!--<span class="error" Style="font-family:Comic Sans MS; font-size:large; color:Green"> <?php echo $disp;?> </span>-->
	
	<? for ($y = 0; $y < $count; $y++)	
	{?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
	<fieldset>
	<legend style="font-family:Monotype Corsiva; font-size:large"> History </legend>
	
	<? echo "<br>". $data[$y] . "<br>";?>
	
	</fieldset>
	</form>
	<?}
	?>
	
    </div>
    <br class="clear" />
  </div>
  </div>
</div>

</br></br><br>
<div id="footer" class="fixed"> Copyright &copy; 2016 KConnect. All rights reserved. </div>
</body>


</html>