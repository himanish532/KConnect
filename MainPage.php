<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<?php
session_start();
$name=$_SESSION['firstname'];
$_SESSION['name1']=$name;

$passw= $_SESSION['passwd'];
$_SESSION['pwd1']=$passw;

$username=$_SESSION['username1'];
$_SESSION['username3']=$username;


try
{

	
	$hostname="student-db.cse.unt.edu";
	$user="hk0367";
	$count=0;
	$count1=0;
	$count2=0;
	$count3=0;
	$count12=0;
	$pwd="hk0367";

	if($database=mysql_connect($hostname,$user,$pwd))
	{
						
		$conn=mysql_select_db("hk0367");
				
		$data=array();
		$result=mysql_query("SELECT question FROM postTable WHERE fkUntId='$username';");
		while($row=mysql_fetch_assoc($result))
		{
			
		
		$data[]=$row['question'];
			$count++;
			
		}
		//$data=$row[0];
		$data11=array();
		$data1=array();
		$result1=mysql_query("SELECT question,uname FROM postTable WHERE fkUntId <> '$username';");
		while($row=mysql_fetch_assoc($result1))
		{
			
		
		$data1[]=$row['question'];
		$data11[]=$row['uname'];
		$count1++;
			
		}
		
		$data2=array();
		$result2=mysql_query("SELECT fkUntId FROM postTable WHERE fkUntId <> '$username';");
		while($row=mysql_fetch_assoc($result2))
		{
			
		
		$data2[]=$row['fkUntId'];
			
			
			
		}
		
		$data12=array();
		$data3=array();
		$data4=array();
		$result4=mysql_query("SELECT question,answer,uname FROM postTable;");
		while($row=mysql_fetch_assoc($result4))
		{
		$data4[]=$row['question'];
		$data3[]=$row['answer'];
		$data12[]=$row['uname'];
		$count2++;	
		}
			
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
<title>HomePage</title>

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
    <li class="active"><a data-toggle="pill" href="#menu2">READS</a></li>
    <li><a data-toggle="pill" href="#menu1">ANSWERS</a></li>	
    <li><a data-toggle="pill" href="#home">QUERIES</a></li>
	
	<li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#menu3"><?php echo $name; ?><span class="caret"></span></a>
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
	  
        <!-- POST button functionality -->
		
		<form method="post" action="postques.php">
		<textarea name="tarea" rows="4" cols="50" placeholder="Post your question here..."></textarea><br>
		<input type="submit" class="button" value=" Post " style="float:right; margin-right:23%; width: 7em;  height: 2em;" />
		</form>
		
       	<!-- Dynamic tabs -->
	
	<div class="tab-content" style="width:650px">
	
	<!-- The questions posted from non-login users should be retrieved from postTable -->
	
    <div id="menu2" class="tab-pane fade in active" style="font-size:large; font-family:Comic Sans MS">
      <h3>Notifications</h3>
      <p>Questions posted by other users are displayed here</p>
		
	<? for ($y = 0; $y < $count1; $y++)	
	{?>	
		<form method="post" action="commentque.php">
		<div>
			<fieldset style="border-color:black">
			<input type="hidden" name="item" value="<? echo $data1[$y]; ?>" />
			<? echo "<br>". $data1[$y] . " ~ " . $data11[$y] . "<br>";?>
			<textarea name="ansarea" rows="2" cols="50" placeholder="Please respond here..."> </textarea><br>
			<input type="submit" class="button" value=" Comment " style="float:right; margin-right:23%; width: 7em;  height: 2em;" />
			</fieldset>
		</div>
		</form>	
	<?}
	?>
    </div>
	
	
	<!-- ANSWERS stored in the postTable should be retrieved here -->
	
    <div id="menu1" class="tab-pane fade" style="font-size:large; font-family:Comic Sans MS">
      <h3>FEEDS</h3>
      <p>The answers for All the question(s) will be displayed here</p>
	  	<? for ($z = 0; $z < $count2; $z++)
		{ ?>
		<div>
			<a href="ansHistory.php"><? echo "<br>". $z . " . " . $data4[$z] . " ~ ". $data12[$z];?></a>
			<? echo "<br>" . " Ans " . " : " . $data3[$z];?>			
		</div>
		<?} 
		?> 
    </div>
	
	<!-- Questions posted by the logged in user from postTable should be retrieved here -->
	
    <div id="home" class="tab-pane fade" style="font-size:large; font-family:Comic Sans MS">
      <h3>My Queries</h3>
		<p> Here is the history of your Queries <?php echo $name; ?> : </p> 
		<? for ($x = 0; $x < $count; $x++)
		{ ?>
		<div>
			<? echo "<br>". $x . " . " . $data[$x];?>	
		</div>
		<?} 
		?>
	</div>

	</div>
	   
    </div>
    </div>
	
    <div id="secondaryContent_3columns">
      <div id="columnB_3columns">
        <h4><span>Search</span></h4>
        <form method="post" action="search.php">
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

</br></br><br>
<div id="footer" class="fixed" > Copyright &copy; 2016 KConnect. All rights reserved. </div>
</body>
</html>
