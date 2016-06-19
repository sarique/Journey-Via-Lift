
<?php
include("includes/connect.php"); // Establishing Connection with Server
 include("funtions/funtions.php");
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
  
       <?php
	   
	   
	    session_start();
	   $user =  $_SESSION['username'];
	     
	   add();
	   
	   ?>
       
       
       <div id="headline">
        <div id="form1">
       <form method="GET" action="lift_available.php" enctype="multipart/form-data">
         
          <select class="input" name="source">
  <option value="kolkata" >Kolkata</option>
  <option value="asansol">asansol</option>
  <option value="airport">Airport</option>
  <option value="howrah">Howrah</option>
</select>To
           <select class="input" name="destination">
  <option value="kolkata" >Kolkata</option>
  <option value="asansol">asansol</option>
  <option value="airport">Airport</option>
  <option value="howrah">Howrah</option>
</select>
            <input type="date" name="date" placeholder="Date"/>
           <input type="submit" name="find_lift" value="Find a lift"  style="background-color:#390; color:#FFF; " />
          
               
       <input type="submit" name="offer_lift" value="Offer a lift"  style="background-color:#390; color:#FFF;" />
         
           
           </form>
            
        </div> 
         
                  <div id="headline_content">

         <b>Welcome <?php echo "$user" ?>  </b>
         <?php
		  $get_user = "select * from user_info where name = '$user'";
			 
			 $run_user = mysqli_query($connection, $get_user);
			 $row_image = mysqli_fetch_array($run_user);
			 $photo =  $row_image['Photo'];
			  
		  echo"
		
		  <div id='photo'>
		  
		  <img src='images/user_photo/$photo' width='75' height='75' />
		 
		  
		  </div>
		  ";
			
		 ?>
         
          
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
   
     <div id="avialable_lift" style="float:left; margin-left:200px; margin-right:200px;">
   
   <?php

        
       global $db;
		  
		   	$lift_id = $_GET['lift_id'];
		
		      
		       			   
             $get_products = "select * FROM add_offer where lift_id = '$lift_id'";
			 
			 $run_products = mysqli_query($connection, $get_products);
			                
			 while ($row_products=mysqli_fetch_array($run_products)){
                  
		  $lift_id = $row_products['lift_id'];
		  $name = $row_products['name'];
		 $source = $row_products['source'];
		  $destination = $row_products['destination'];
		  $email = $row_products['email'];
		 $date = $row_products['date'];
		  $Photo = $row_products['Photo'];
		   $contacts =  $row_products['contact'];
		  
		     
		 echo"
		
		  <div id='single_product'>
		  <h3>$name</h3>
		  <h3>$contacts</h3>
		  <img src='images/$Photo' width='150' height='150' />
		  <img src='images/$Photo' width='200' height='200' />
		  <img src='images/$Photo' width='150' height='150' />
		 <p> <b>$source TO $destination</b></p>
		  <a href='my_account.php?pro_id=$lift_id' style='float:left;'>Go back</a>
		   <p> <b>$date </b></p>
		  </div>
		  ";
		
		
		         }
			 
		
			   
		   
             
		
                ?>
              </div>
                    



</div>








</body>
</html>