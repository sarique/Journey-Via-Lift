
<?php
include("includes/connect.php"); // Establishing Connection with Server
 $user= $_GET['user_name'];
	   
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Journey via lift</title>
<link rel="stylesheet" href="styles/passenger.css" media="all" />
</head>

<body>
<div class="main_wrapper">
 
       
       
 <div id="navbar">
    <ul id="menu">
    
    
        <li><a href="my_account.php">Home</a></li>
       
       <li><a href="index.php">Log Out</a></li>
       <li><a href="passenger.php">As passenger</a></li>
       <li><a href="driver.php">As driver</a></li>
       <li><a href="messages.php">Messages</a></li>
       <li><a href="contact.php">Contact Us</a></li>
    </ul>
     
    
    </div>
    
  
   

 


</div>

  <div style="width:500px;"><h2 style="color:#00F;float:none;padding:3px;margin-left:200px;font-style:oblique;">Reviews of <?php echo "$user" ?></h2>
  
       <?php
	  
	  $user= $_GET['user_name'];
	     $sql = "select * FROM review where for_whom = '$user'";
   $records = mysqli_query($connection,$sql);
		
   while($data = mysqli_fetch_assoc($records)){
	   echo"<div id='portion'> ";
	   
	   
	  
	   
	    echo $data['writer'];
	   echo"<br>";
	   echo $data['about_vehicle'];
	   
	   echo"<br>";
	    //echo"<span style='margin-right: 20em;'>";
		//echo"</span>";
	   
	   
	   
	   
		echo"Recommend"; 
		echo"<span style='margin-right: 2em;'>";
		echo"</span>";
		echo $data['recommend'];
		echo"<br>";
	    echo"Rating"; 
		echo"<span style='margin-right: 2em;'>";
		echo"</span>";
		echo $data['rating_for_vehicle'];
		
		 echo"<br>";
	    echo "=====================================================";
	  echo"</div>"; 
	  
   }//end while
	   
	   ?>
       
</div>




 


</body>
</html>