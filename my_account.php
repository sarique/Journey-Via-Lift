
<?php
include("includes/connect.php"); // Establishing Connection with Server
 include("funtions/funtions.php");
 include("funtions/common.php");
 include("includes/db.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/car-sharing2.jpg" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Journey via lift</title>
<link rel="stylesheet" href="styles/my_account.css" media="all" />
<link rel="stylesheet" href="styles/common.css" media="all" />
</head>

<body>
 
<div class="main_wrapper">
    
       <?php
	   
	   
	     
		 
	   $user =  $_SESSION['username'];
	     
	   if ($_SERVER["REQUEST_METHOD"] == "GET"){
		   
		    
			}
	   
	   ?>
       
       
       
        
      
        
         
      <?php
	   
              
	    head();
          
           
         


       
     ?>
          
	    
       
         <div id="lift_offer" style="float:right; background: rgba(0,0,200,0.7);" align="center">
 <h1 style="color:#FFF; margin-top:15px;">Request a lift as a </h1>
 <h1 style="color:#FFF">passenger</h1><br>
 <h3 style="color:#FFF">Save on travel costs and meet like</h3>
 <h3 style="color:#FFF">minded people</h3>

 <div id="box">
 
 <h1 align="center"><a href="offer_lift.php">Offer a lift</a></h1>
 
 </div>
 </div>
 
  
  
  
 <div id="lift_find" style="float:left;" align="center">
 <h1 style="color:#FFF;margin-top:15px;">Share a lift as a</h1>
 <h1 style="color:#FFF">driver</h1><br>
 <h3 style="color:#FFF">Add your trip or daily commute and </h3>
 <h3 style="color:#FFF">start sharing the costs</h3>

 <div id="box" style="margin-left:100px;">
  <h1 style="color:#0C6"><a href="find_lift.php">Find a lift</a></h1>
 </div>
 </div>
   <div id="avialable_lift">
   
   <?php

        
       global $db;
			$count = 0;   
		   	
		      
		       			  $date = new DateTime();
               $from_date = $date->format('Y-m-d');
                $date->modify('+180 days');
               $to_date = $date->format('Y-m-d');
           $get_products = "select * from add_offer where (date>='$from_date' AND date < '$to_date') AND 	name != '$user'   ORDER BY rand() LIMIT 6 ";
			 
			 $run_products = mysqli_query($connection, $get_products);
			                echo " <div id='head'><h3>Recent Available Rides<h3></div>"; 
			 while ($row_products=mysqli_fetch_array($run_products)){
                 	$count++;  
		  $lift_id = $row_products['lift_id'];
		  $name = $row_products['name'];
		 $source = $row_products['source'];
		  $destination = $row_products['destination'];
		  $email = $row_products['email'];
		 $date = $row_products['date'];
		  $Photo = $row_products['Photo'];
		  
		     
		 echo"
		
		  <div id='portion' style='float:left;padding:15px;border:2px solid #999;width:400px;'>
		  <h3 style='margin-right:350px'>$name</h3>
		 
		   
		    <a href='details_available_lift.php?lift_id=$lift_id' style='float:left;'><img src='images/user_photo/$Photo' width='140' height='140' /><br></a>
		 <p>$name want to share his journey  <br>and want to provide<br>lift from <b> $source <br> TO $destination</b></p>
		 <br>   
		 <p> <b><br> on $date</b></p><br>
		   <br> <a href='details_available_lift.php?lift_id=$lift_id' style='float:right;color:red;margin-right:60px'>send him a request</a>
		   
		  </div>
		  ";
		         
				 
			 }
			 
			 if($count == 0){
				        echo "<div style ='font:25px/40px Arial,tahoma,sans-serif;color:green'> OOPS!!</div>";
						 echo "<div style ='font:25px/40px Arial,tahoma,sans-serif;color:red'> No lift available</div>";
				          }
		
		         
			 
		
			   
		   
 
 
                ?>
              </div><!--avialable_lift ends here-->
             
                    <div id="required_lift">
                     <?php

 
       global $db;
		  $count = 0;	 	
	   
		       			   
         $get_products = "select * from want_lift where (date>='$from_date' AND date <='$to_date') AND 	username != '$user'   ORDER BY rand() LIMIT 6 ";
			 
			 $run_products = mysqli_query($connection, $get_products);
				                echo " <div id='head'><h3>Recent Required Rides<h3></div>";
		 while ($row_products=mysqli_fetch_array($run_products)){
                 
		  $lift_id = $row_products['lift_id'];
		  $name = $row_products['username'];
		 $source = $row_products['source'];
		  $destination = $row_products['destination'];
		  $email = $row_products['email'];
		 $date = $row_products['date'];
		  $Photo = $row_products['image'];
		  $count++;
		     
		 echo"
		
		  <div id='portion' style='float:right;padding:15px;border:2px solid #999;width:400px;'>
		   <h3 style='margin-right:350px'>$name</h3>
	
		   
		   
		     <a href='details_want_lift.php?lift_id=$lift_id' style='float:left;'><img src='images/user_photo/$Photo' width='140' height='140' /><br></a>
		 <p>$name want to travel from<br> <b> $source <br> TO $destination</b></p>
		 <br> and willing to take lift to save some <b>money<b>  
		 <p> <b><br> on $date</b></p>
		   <br> <a href='details_want_lift.php?lift_id=$lift_id' style='float:right;color:red;margin-right:60px'>send him a request</a>
		   
		
		  </div>
		  ";
		
		
		         }
			 if($count == 0){
				        echo "<div style ='font:25px/40px Arial,tahoma,sans-serif;color:green'> OOPS!!</div>";
						echo "<div style ='font:25px/40px Arial,tahoma,sans-serif;color:red'> No rides available</div>";
				          }
		
			   
		   
 
 
?>
  </div><!--required_lift ends here-->




</div>



<?php
footer();

?>

</body>
</html>