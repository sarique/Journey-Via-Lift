
<?php
include("includes/connect.php"); // Establishing Connection with Server
 include("funtions/funtions.php");
  include("funtions/common.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Journey via lift</title>
<link rel="stylesheet" href="styles/common.css" media="all" />
<link rel="shortcut icon" href="images/car-sharing2.jpg" />
<link rel="stylesheet" href="styles/lift_available.css" media="all" />
</head>

<body>
<div class="main_wrapper">
  
       <?php
	   
	   
	 
	   $user =  $_SESSION['username'];
	     
	   add();
	   
	    head();
	   ?>
       
       
   <div class="content_wrapper" style="background-image:none; height:auto; color:#000;">
   
   <div id="avialable_lift" style="float:left; margin-left:200px; margin-right:200px;">
   
   <?php

        
       global $db;
	       $counter = 0;	  
		   	
		      
		       			 $date = new DateTime();   
						 $date = $date->format('Y-m-d');
             $get_products = "select * FROM requests where (receiver = '$user' AND  date_of_journey>= '$date' )   ORDER BY date_time DESC ";
			 
			 $run_products = mysqli_query($connection, $get_products);
			                echo " <div style ='font:25px/40px Arial,tahoma,sans-serif;color:green'>You have requests from</div>"; 
							
							 
			 while ($row_products=mysqli_fetch_array($run_products)){
                  $counter++;
				$status=  $row_products['status'];	
				$date_time = $row_products['date_time'];	
	       $Journey_id = $row_products['Journey_id'];		   
		  $request_id = $row_products['request_id'];
		  $name = $row_products['sender'];
		 $source = $row_products['source'];
		  $destination = $row_products['destination'];
		  //$email = $row_products['email'];
		 $date = $row_products['date_of_journey'];
		 // $Photo = $row_products['Photo'];
		//  $contacts =  $row_products['contact'];
		 $qry_img = "SELECT * FROM user_info WHERE name='$name' limit 1";
	    $run_img = mysqli_query($connection, $qry_img);
	   $row_img = mysqli_fetch_array($run_img);
	   $img =$row_img['Photo'];
		     if($status == 'NOT DECIDED'){
		 echo"
		
		  <div id='portion' style='padding:15px;border:2px solid #999'>
		  $date_time
		   <h3 style='margin-right:350px'> $name</h3><br>
		  <a href='request_details.php?request_id=$request_id&Journey_id=$Journey_id' style='float:left;'><img src='images/$img' width='170' height='170' /><br></a>
		    <b>your decision<b>
		 <input class='button'  type='submit' value='$status' style='color:white; background-color:black; width:140px; height:40px'>
		 <br><br>
		 <p>   $name wants to journey with you<br> from <b>$source <br> TO $destination</b></p>
		  
		   <p>On <b>$date</b></p><br>
		   <a href='request_details.php?request_id=$request_id&Journey_id=$Journey_id' style='color:red'>accept his request<br></a>
		  </div>
		  ";
		
			 }
			 
			 
			 else{
		 echo"
		
		  <div id='portion' style='padding:15px;border:2px solid #999'>
		  $date_time
		   <h3 style='margin-right:350px'> $name</h3><br>
		  <a href='' style='float:left;'><img src='images/$img' width='170' height='170' /><br></a>
		    <b>your decision<b>
		 <input class='button'  type='submit' value='$status' style='color:white; background-color:black; width:140px; height:40px'>
		 <br><br>
		 <p>   $name wants to journey with you<br> from <b>$source <br> TO $destination</b></p>
		  
		   <p>On <b>$date</b></p><br>
		   
		  </div>
		  ";
		
			 }
		         }
				 
				 	if($counter == 0)
		{     echo "<div style ='font:25px/40px Arial,tahoma,sans-serif;color:green'> OOPS!!</div>";
		 echo "<div style ='font:25px/40px Arial,tahoma,sans-serif;color:black'>You have no requests</div>";
   
			}
				 
			/*	  $get_products = "select * FROM requests where 	sender = '$user' AND confirmation ='YES'";
			 
			 $run_products = mysqli_query($connection, $get_products);
			                echo " <div style ='font:25px/40px Arial,tahoma,sans-serif;color:green'> confirmed requests </div>"; 
							
							 
			 while ($row_products=mysqli_fetch_array($run_products)){
                  $counter++;
				  
				  
				  
		  $request_id = $row_products['request_id'];
		  $get_Query = "UPDATE requests SET sender_seen='YES' WHERE request_id = '$request_id' ";
   
           mysqli_query($connection ,$get_Query);
		  $name = $row_products['receiver'];
		 $source = $row_products['source'];
		  $destination = $row_products['destination'];
		  //$email = $row_products['email'];
		 $date = $row_products['date_of_journey'];
		 // $Photo = $row_products['Photo'];
		//  $contacts =  $row_products['contact'];
		        $qry_img = "SELECT * FROM user_info WHERE name='$name' limit 1";
	    $run_img = mysqli_query($connection, $qry_img);
	   $row_img = mysqli_fetch_array($run_img);
	   $img =$row_img['Photo'];
			  
		 echo"
		
		  <div id='portion' style='padding:15px;border:2px solid #999'>
		  
		   <h3 style='margin-right:350px'>$name</h3><br>
		  <a href='request_details.php' style='float:left;'><img src='images/$img' width='170' height='170' /><br></a>
		 
		 <p>$name accepted your request<br> to journey with you<br> from <b>$source <br> TO $destination</b></p>
		  
		   <p>On <b>$date</b></p><br>
		   
		  </div>
		  ";
		
		
		         }
			 
			 
		if($counter == 0)
		{     echo "<div style ='font:25px/40px Arial,tahoma,sans-serif;color:green'> OOPS!!</div>";
		 echo "<div style ='font:25px/40px Arial,tahoma,sans-serif;color:white'>You have no requests</div>";
   
			}
			   */
		   
             
		
                ?>
              

</div>

</div>








</body>
</html>