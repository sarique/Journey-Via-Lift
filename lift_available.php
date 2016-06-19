
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
<link rel="shortcut icon" href="images/car-sharing2.jpg" />
<link rel="stylesheet" href="styles/lift_available.css" media="all" />
<link rel="stylesheet" href="styles/common.css" media="all" />
</head>

<body>
<div class="main_wrapper">
  
       <?php
	   
	   
	    
	   $user =  $_SESSION['username'];
	     
	   add();
	   
	   ?>
        <?php
	   
              
	    head();
          
           
         


       
     ?>
   <div class="content_wrapper" style="background-image:none;">
   
   <div id="avialable_lift" style="float:left; margin-left:200px; margin-right:200px;">
   
   <?php

        if(isset($_GET['find_lift'])){
       global $db;
	       $counter = 0;	  
		   	$source = $_GET['source'];
			$destination = $_GET['destination'];
			$date = $_GET['date'];
		      
		       			   
             $get_products = "select * FROM add_offer where (source='$source' AND destination = '$destination' AND date ='$date') AND (name != '$user' AND confirmation ='NO')";
			 
			 $run_products = mysqli_query($connection, $get_products);
			                echo " <div  style='color:green; font-size:30px'>Available lift</div>"; 
							
							 
			 while ($row_products=mysqli_fetch_array($run_products)){
                  $counter++;
		  $lift_id = $row_products['lift_id'];
		  $name = $row_products['name'];
		 $source = $row_products['source'];
		  $destination = $row_products['destination'];
		  $email = $row_products['email'];
		 $date = $row_products['date'];
		  $Photo = $row_products['Photo'];
		  $contacts =  $row_products['contact'];
		     
		 echo"
		
		  <div id='portion' style='padding:15px;border:2px solid #999'>
		  
		  <h3 style='margin-right:350px'>$name</h3>
		  <a href='details_available_lift.php?lift_id=$lift_id' style='float:left;'><img src='images/$Photo' width='170' height='170' /><br></a>
		 <p>$name is going from<br><b> $source TO <br>$destination</b></p>
		  by his own <b> Vehicle and  want to share his journey
		   <p> <b> on $date</b></p>
		   <br> <a href='details_available_lift.php?lift_id=$lift_id' style=''>send him a request</a>
		  </div>
		  ";
		
		
		         }
			 
		if($counter == 0)
		{     echo "<div style ='font:25px/40px Arial,tahoma,sans-serif;color:red'> OOPS!!</div>";
		 echo "<div style ='font:25px/40px Arial,tahoma,sans-serif;color:black'> No lift available</div>";
   
			}
			   
		   
             
		}
                ?>
              </div><!--avialable_lift ends here-->
                    <div id="required_lift" style="float:left; margin-left:200px; margin-right:200px;">
                     <?php

                        if(isset($_GET['offer_lift'])){
                         global $db;
		  
		   	
		      $source = $_GET['source'];
			$destination = $_GET['destination'];
		       			   
             $get_products = "select * FROM want_lift where (source='$source' AND destination = '$destination') AND username != '$user' ";
			 
			 $run_products = mysqli_query($connection, $get_products);
				                echo " <div id='head' style='color:red'><h2>Required Rides</h2> </div>";
								$n=mysqli_fetch_row($run_products);
								if($n == 0){
							    echo "<div style ='font:25px/40px Arial,tahoma,sans-serif;color:green'> OOPS!!</div>";
		 echo "<div style ='font:25px/40px Arial,tahoma,sans-serif;color:RED'> No required lift available</div>";
							 }
							 
		 while ($row_products=mysqli_fetch_array($run_products)){
                  
		  $lift_id = $row_products['lift_id'];
		  $name = $row_products['username'];
		 $source = $row_products['source'];
		  $destination = $row_products['destination'];
		  $email = $row_products['email'];
		 $date = $row_products['date'];
		  $Photo = $row_products['image'];
		  
		     
		 echo"
		
		  <div id='portion' style='padding:15px;border:2px solid #999'>
		   <h3 style='margin-right:350px'>$name</h3>
		    <a href='details_want_lift.php?lift_id=$lift_id' style='float:left;'><img src='images/user_photo/$Photo' width='170' height='170' /><br></a>
		 <p>$name want to travel from<br> <b> $source <br> TO $destination</b></p>
		 <br> and willing to take lift to save some <b>money<b>  
		 <p> <b><br> on $date</b></p>
		   <br> <a href='details_want_lift.php?lift_id=$lift_id' style=''>send him a request</a>
		   
		
           
		  
		  
		  </div>
		  ";
		
		
		         }
			 
		
			   
						}
 
 
?>
  </div><!--required_lift ends here-->

</div>

</div>






<?php
footer();

?>

</body>
</html>