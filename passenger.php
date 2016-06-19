
<?php
include("includes/connect.php"); // Establishing Connection with Server
 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Journey via lift</title>
<link rel="stylesheet" href="styles/log_in.css" media="all" />
</head>

<body>
<div class="main_wrapper">
 o 
       <?php
	   
	   
	    session_start();
	   $user =  $_SESSION['username'];
	     
	   
	   
	   ?>
       
       
       <div id="headline">
        <div id="form">
        <form method="GET" action="lift_available.php" enctype="multipart/form-data">
        <select class ="input"  name="source">
      <?php
	    
          $query = "SELECT * from locations";
           
$res = mysqli_query($connection,$query);



       
      while($row=mysqli_fetch_array($res))
        {
		   
            echo "<option value='".$row[0]."'>".$row[0]."</option>";
           
             
			
		}
		?>
              </select>
          To
           <select class ="input"  name="destination">
      <?php
	    
          $query = "SELECT * from locations";
           
$res = mysqli_query($connection,$query);



       
      while($row=mysqli_fetch_array($res))
        {
		   
            echo "<option value='".$row[0]."'>".$row[0]."</option>";
           
             
			
		}
		?>
              
            <input type="date" name="date" placeholder="Date"/>
           <input type="submit" name="find_lift" value="Want a lift"  style="background-color:#390; color:#FFF; " />
          
               
       <input type="submit" name="offer_lift" value="Offer a lift"  style="background-color:#390; color:#FFF;" />
         
           
           </form>
       
            
        </div>
        <div id="offer_button"> 
        <a href="offer_lift.php" style="alignment-adjust:central; margin-bottom:20px;"><input type="submit" name="search" value="Offer a lift"  style="         background-color:#390; color:#FFF;" /></a>
        <div id="offer_button">
         <div id="headline_content">

         <b>Welcome <?php echo "$user" ?>  </b>
         
          <img src="images/mayank.jpg" id="photo">
         </div>
          </div>
 <div id="navbar">
    <ul id="menu">
    
    
        <li><a href="my_account.php">Home</a></li>
       
       <li><a href="index.php">Log Out</a></li>
       <li><a href="passenger.php">As passenger</a></li>
       <li><a href="driver.php">As driver</a></li>
       <li><a href="messages.php">Messages</a></li>
       <li><a href="contact.php">Contact Us</a></li>
    </ul>
     
   <div class="content_wrapper">
   <div style="width:60%; margin:100px;">
   
   <?php

 
       global $db;
		  
		   	
		      
		       			   
             $get_products = "select * from history where passenger = '$user'";
			 
			 $run_products = mysqli_query($connection, $get_products);
			 
			 while ($row_products=mysqli_fetch_array($run_products)){
           $Journey_id = $row_products['Journey_id'];
		  $driver = $row_products['driver'];
		  $passenger = $row_products['passenger'];
		 $source = $row_products['source'];
		  $destination = $row_products['destination'];
		 // $email = $row_products['email'];
		 $Date = $row_products['Date'];
		  //$Photo = $row_products['Photo'];
		  
		  
		 echo"
		
		  <div id='single_product'>
		  <h3> Driver - $driver</h3>
		  <img src='images/photo1.jpg' width='180' height='180' /><br>
		 <p> <b> $source To $destination</b></p>
		  <a href='details.php?pro_id=$Journey_id' style='float:left;'>Details</a>
		   <p> <b>$Date </b></p>
		  </div>
		  ";
		
		
		         }
			 
		
			   
		   
 
 
?>
</div>

  </div>



</div>








</body>
</html>