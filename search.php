<html>
<head>
<?php

session_start();
	$name2=$_SESSION['name1'];
	$username2=$_SESSION['username3'];
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
try
{

	$key=$_POST["keywords"];
	$hostname="student-db.cse.unt.edu";
	$user="hk0367";
	$count=0;
	$pwd="hk0367";

	if($database=mysql_connect($hostname,$user,$pwd))
	{
							
		$conn=mysql_select_db("hk0367");
		//echo $key;
		$data1=array();
		$data2=array();
		$result5=mysql_query("SELECT question, answer FROM postTable WHERE question LIKE '%$key%';");
		$c=mysql_num_rows($result5);
		while($row=mysql_fetch_assoc($result5))
		{ 
				$data1[]=$row['question'];
				$data2[]=$row['answer'];
				$count++;	
		}
		if($c==0)
		{
			$err = "Oops, there is no search result to display";
		}
		
		//echo $row;
		//header("Location:MainPage.php");
		
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

<title>Search Results</title>

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
    <!--<li class="active"><a data-toggle="pill" href="#home">QUERIES</a></li>
    <li><a data-toggle="pill" href="#menu1">ANSWERS</a></li>	
    <li><a data-toggle="pill" href="#menu2">READS</a></li>-->
	
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
    <p style="font-size:x-large; font-family:Monotype Corsiva"> Search results for the given keyword is as follows: </p>
		<? for ($z = 0; $z < $count; $z++)
		{ ?>
		<div style="font-size:large; font-family:Comic Sans MS">
		
		<? 
			echo "<br>" . "(" . $z . ")" . " Qns " . " : " . $data1[$z];
			echo "<br>" . " Ans " . " : " . $data2[$z];
		?>
					
		</div>
		<?} 
		?>
	<span class="error" Style="font-family:Comic Sans MS; font-size:large; color:Red"> <?php echo $err;?> </span>	
    </div>
	
    <div id="secondaryContent_3columns" style="margin-right: -35em;">
      <div id="columnB_3columns">
        <h4><span>Search</span></h4>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div id="search">
            <input type="text" class="text" name="keywords" style="border:solid 1px #050404"/>
            <input type="submit" class="button" value="Go" />

            <br class="clear" />
          </div>	 
        </form>
      </div>
    </div>
	
    <br class="clear" />
  </div>
  </div>
</div>

</br></br><br>
<div id="footer" class="fixed"> Copyright &copy; 2016 KConnect. All rights reserved. </div>
</body>


</html>