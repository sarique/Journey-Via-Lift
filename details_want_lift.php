
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
          
     <div id="avialable_lift" style="margin-top:40px; background-color:#FFF"">
   
   <?php

        
       global $db;
		  
		   	 if ($_SERVER["REQUEST_METHOD"] == "POST") {
			   
	   $lift_id =  $_SESSION['user_id'];
			  
			  }
			  
			  else{
				   
				   
		   	$lift_id = $_GET['lift_id'];
			
			 $_SESSION['user_id'] = $lift_id;
			  }
		
		      
		       			   
             $get_products = "select * FROM want_lift where lift_id = '$lift_id'";
			 
			 $run_products = mysqli_query($connection, $get_products);
			                
			 while ($row_products=mysqli_fetch_array($run_products)){
                  
		  $lift_id = $row_products['lift_id'];
		  $name = $row_products['username'];
		 $source = $row_products['source'];
		  $destination = $row_products['destination'];
		  $email = $row_products['email'];
		 $date = $row_products['date'];
		  $Photo = $row_products['image'];
		   $contacts =  $row_products['contact'];
		    $age = $row_products['age'];
			$address = $row_products['address'];
			$vehicle = $row_products['vehicle'];
			$count = 10;
  		     
		 echo"
		
		  <div id='details_image'>
		  
		  <img src='images/$Photo' /><br>
		   <a href='my_account.php?pro_id=$lift_id' style='float:left;'>Go back</a>
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
	$receiver_is= "passenger";
	 $get_Query = "insert into requests(Journey_id,sender, receiver, receiver_is, source, destination, date_of_journey, vehicle, status) values ('$lift_id','$user','$name', '$receiver_is', '$source', '$destination', '$date', '$vehicle', '$status')";
   
  
   
   mysqli_query($connection ,$get_Query);
               $massage ="" .$user  . " request you to take lift from him ";
			   
			   
			   $qry =" SELECT * FROM requests WHERE Journey_id='$lift_id' limit 1";
	 $run_id = mysqli_query($connection, $qry);
	 $row_product=mysqli_fetch_array($run_id);
	 $request_id =$row_product['request_id'];
	 
	 	 

	 
$get_Query = "insert into notification(receiver, sender, journey_id, request_id, massage) values('$name','$user', '$lift_id',$request_id,'$massage') ";
   
  mysqli_query($connection ,$get_Query);
			   $value = "Request sended"; 
			   $msg = "" .$user  . " request you to take lift from him from you contact him his contact is " .$contacts. " ";
			   

 // use wordwrap() if lines are longer than 70 characters
 $msg = wordwrap($msg,70);

 // send email
 mail("sarique.902@gmail.com","My subject",$msg);
 
                   }     
				    echo"<form action='details_want_lift.php' method='post'  enctype='multipart/form-data' style='margin-left:400px' >
                            <input class='submit' name='submit' type='submit' value='$value'>
                           </form>";

				   
?>

                </div><!--avialable_lift ends here-->
                    









</div><!--content_wrapper ends here-->

<div style="margin-top:600px; margin-left:500px">


</div>

   
    <div id="portion_main"><h2 style="color:#00F;float:none;padding:3px;margin-left:200px;font-style:oblique;">Reviews of <?php echo "$name" ?></h2>
  
       <?php
	  
	  
	     $sql = "select * FROM review where for_whom = '$name'";
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
	  echo "<a href='#headline' style='float:center; color:green; padding:20px; '>Go to starting page</a>";
	 
	 
	   ?>
       
</div>

</div>

<?php
footer();
?>
</body>
</html>