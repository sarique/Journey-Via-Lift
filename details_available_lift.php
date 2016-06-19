
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
<link rel="stylesheet" href="styles/log_in.css" media="all" />
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
   <div class="content_wrapper">
   
   
              <a href="#portion_main" style='float:left; color:green;margin-left:300px'> Reviews</a>
		  <a href="write_review.php?lift_id=$lift_id'" style="color:#000; float:right;margin-right:400px" > write a Review</a>
          
     <div id="avialable_lift" style="margin-top:40px; background-color:#FFF">
   
   <?php

        
       global $db;
		  
		  if ($_SERVER["REQUEST_METHOD"] == "POST") {
			   
	   $lift_id = $_GET['lift_id'];
			  
			  }
			  
			  else{
				   
				   
		   	$lift_id = $_GET['lift_id'];
			
			 
			  }
		      
		       			   
             $get_products = "select * FROM add_offer where lift_id = '$lift_id'";
			 
			 $run_products = mysqli_query($connection, $get_products);
			                
			 while ($row_products=mysqli_fetch_array($run_products)){
                  
		  $lift_id = $row_products['lift_id'];
		  $vehicle =  $row_products['vehicle'];
		  $name = $row_products['name'];
		 $source = $row_products['source'];
		  $destination = $row_products['destination'];
		  $email = $row_products['email'];
		 $date = $row_products['date'];
		  $Photo = $row_products['Photo'];
		   $contacts =  $row_products['contact'];
		   $address =  $row_products['address'];
		  $count = 10;
		     
		 echo"
		
		 
		  <div id='details_image'>
		  
		  <img src='images/$Photo' width='200' height='200' /><br>
		  
		  </div>
		  
		 
		
		
	
		  ";
		 echo "<div id='details_other'>";
		   echo "<table>";
		    echo "<tr>";
			echo "<td>Name</td>";
	   echo "<td>".$name."</td>";
	   echo "</tr>";
	   
	   
	    echo "<tr>";
		echo "<td>Source</td>";
	    echo "<td>".$source."</td>";
	   echo "</tr>";
	   
	    echo "<tr>";
		echo "<td>Destination</td>";
	    echo "<td>$destination</td>";
	   echo "</tr>";
	   
	   echo "<tr>";
		echo "<td>Email</td>";
	   echo "<td>".$email."</td>";
	   echo "</tr>";
	    
	   
	    echo "<tr>";
		 echo "<td>Address</td>";
	   echo "<td>".$address."</td>";
	   echo "</tr>";
	   
	    echo "<tr>";
		echo "<td>Date of journey</td>";
	   echo "<td>".$date."</td>";
	   echo "</tr>";
		   
		echo "</table>";
		echo "</div>";
		
		
		         }
			 
		
			   
		   
             
		
                ?>
             
                 <?php
			               			   
             $get_uid = "select * FROM user_info where name = '$name'";
			 
			 $run_uid = mysqli_query($connection, $get_uid);
			 $row_uid=mysqli_fetch_array($run_uid);
			 $uid =$row_uid['user_id'];
			 
			    
						 
			          echo"<div id='details_id'>
					 <h3><b>Identity proof<b><h3><br>
		  <img src='images/$uid' width='250' height='250'/><br>
		  </div>";
			  
			  ?>
              
              
              <?php
  $value = "Send request"; 
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$status= "NOT DECIDED";
	$receiver_is= "driver";
	  
	    $qry =" SELECT * FROM user_info WHERE name='$user' limit 1";
	 $run_id = mysqli_query($connection, $qry);
	 $row_product=mysqli_fetch_array($run_id);
	 $user_contact =$row_product['contact'];
	
	 $get_Query = "insert into requests(Journey_id,sender, receiver, receiver_is, source, destination, date_of_journey, vehicle, status) values ('$lift_id','$user','$name', '$receiver_is', '$source', '$destination', '$date', '$vehicle', '$status')";
   
  mysqli_query($connection ,$get_Query);
     $msg ="" .$user  . " request lift from you that you \n wish to offer from  " .$source . " to \n " . $destination. " on 
	 " . $date. " by your  \n  ".$vehicle." accept his request from \n JourneyViaLift.com ";
	   
	    $qry =" SELECT * FROM requests WHERE Journey_id='$lift_id' limit 1";
	 $run_id = mysqli_query($connection, $qry);
	 $row_product=mysqli_fetch_array($run_id);
	 $request_id =$row_product['request_id'];
	 
$get_Query = "insert into notification(receiver, sender, journey_id, request_id, massage) values ('$name','$user', '$lift_id',$request_id,'$msg'  )";
   
  mysqli_query($connection ,$get_Query);
               $value = "Request sended"; 
			   
			  
             $to_email = $email;
 // use wordwrap() if lines are longer than 70 characters
 

 // send email
 $headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";
$subject = "Request for sharing lift";
mail($to_email,$subject,$msg,$headers);
 
 
                   }     
				    echo"<form action='details_available_lift.php?lift_id=$lift_id' method='post'  enctype='multipart/form-data' style='margin-left:400px' >
                            <input class='submit' name='submit' type='submit' value='$value'>
                           </form>";

				   
?>
               </div>      



</div>
                               



                           



   
 <div id="portion_main"><h2 style="color:#00F;float:none;padding:3px;margin-left:200px;font-style:oblique; margin-top:30px">Reviews of <?php echo "$name" ?></h2>
  
       <?php
	  
	  review($name);
	   ?>
       
</div>
</div>

</div>
<div id="footer1"><br /><br />
     <b style="color:inherit"><a href="index.php">About us </a>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<a href="index.php"> Travels guides</a>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <a href="massage.php"> Trust</a></b>  
     <br /><br /><br></br><br /><br />
    <h3 style="color:#FFF; padding-top:30px; text-align:center; ">&copy; 2016 - By www.JourneyVaiLift.com
    </h3>
    </div>
</body>
</html>