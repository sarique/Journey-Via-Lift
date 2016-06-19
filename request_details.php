
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
   
   
              <a href="#portion_main" style="float:left; color:green;margin-left:300px"> Reviews</a>
		  <a href="write_review.php?lift_id=$lift_id'" style="color:#000; float:right;margin-right:400px" > write a Review</a>
    
    <div id="avialable_lift" style="margin-top:40px; background-color:#FFF">
   
   <?php

        
       global $db;
		  
		  if ($_SERVER["REQUEST_METHOD"] == "POST") {
			   
	  $request_id = $_GET['request_id']; 
			 
			  }
			  
			  else{
				   
			  	$request_id = $_GET['request_id']; 
		   	
			
			
			  }
		      $sql = "UPDATE requests SET reciver_seen='YES' WHERE request_id = '$request_id'";
		       		 $run_sql = mysqli_query($connection, $sql);	   
             
			 $get_products = "select * FROM requests  where request_id = '$request_id'";
			 
			 $run_products = mysqli_query($connection, $get_products);
			                
			 while ($row_products=mysqli_fetch_array($run_products)){
                 $receiver_is =  $row_products['receiver_is'];
				 $Journey_id =   $row_products['Journey_id'];
		//  $lift_id = $row_products['lift_id'];
		 // $vehicle =  $row_products['vehicle'];
		  $name = $row_products['sender'];
		 //$source = $row_products['source'];
		  //$destination = $row_products['destination'];
		 // $email = $row_products['email'];
		// $date = $row_products['date_of_journey'];
		// $Photo = $row_products['photo'];
		   //$contacts =  $row_products['contact'];
		  // $address =  $row_products['address'];
		  $count = 10;
			 }
$sql1 = "UPDATE notification SET seen='YES' WHERE 	(request_id = '$request_id') AND (receiver ='$user' AND sender = '$name ')";
		       		 $run_sql1 = mysqli_query($connection, $sql1);	
			
		        
			   $get_qry1 = "select * FROM user_info where name = '$name'";
			  
		  $run_qry1= mysqli_query($connection, $get_qry1);
		  	 while ($row_qry1=mysqli_fetch_array($run_qry1)){
			 
			   $email=  $row_qry1['email'];
			 $Photo =  $row_qry1['Photo'];
			  $address = $row_qry1['address'];
			 $contacts =  $row_qry1['contact'];
			 }           
			
			 
		 echo"
		
		 
		  <div id='details_image'>
		  
		  <img src='images/$Photo' width='200' height='200' /><br>
		 
		  </div>
		  
		 
		
		
	
		  ";
		    
			 
			
		  if($receiver_is == "driver"){
			  
			  
			 
			  
			   $get_qry = "select * FROM add_offer   where lift_id = '$Journey_id'";
			  
		  $run_qrys = mysqli_query($connection, $get_qry);
		                   
			 while ($run_qry=mysqli_fetch_array($run_qrys)){
		   
		    $source =  $run_qry['source'];
		 $lift_id = $run_qry['lift_id'];
		  $vehicle =  $run_qry['vehicle'];
		  
		 
		  $destination = $run_qry['destination'];
		  
		 $date = $run_qry['date'];
		  //$Photo = $row_products['photo'];
		   //$contacts =  $row_products['contact'];
		  // $address =  $row_products['address']
			
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
	    echo "<td>".$destination."</td>";
	   echo "</tr>";
	   
	 
	    
	    echo "<tr>";
		echo "<td>journey id</td>";
	   echo "<td>".$lift_id."</td>";
	   echo "</tr>";
	   
	    echo "<tr>";
		echo "<td>vehicle</td>";
	   echo "<td>".$vehicle."</td>";
	   echo "</tr>";
	    
	   
	    echo "<tr>";
		echo "<td>Date of journey</td>";
	   echo "<td>".$date."</td>";
	   echo "</tr>";
		   
		     
	    echo "<tr>";
		echo "<td>Email</td>";
	   echo "<td>".$email."</td>";
	   echo "</tr>";
	   
	
	        
	    echo "<tr>";
		echo "<td>Address</td>";
	   echo "<td>". $address."</td>";
	   echo "</tr>";
		echo "</table>";
		echo "</div>";
		
		
			 }
			 
			 $get_Query_hist = "insert into history(driver, passenger, Date, source, destination, vehicle) values ('$user','$name','$date ',' $source','$destination' , '$vehicle')";
   
  mysqli_query($connection ,$get_Query_hist);
	  
			 }
			 
			 
			  if($receiver_is == "passenger"){
			  
			  
			 
			  
			   $get_qry = "select * FROM want_lift   where lift_id = '$Journey_id'";
			  
		  $run_qrys = mysqli_query($connection, $get_qry);
		                   
			 while ($run_qry=mysqli_fetch_array($run_qrys)){
		   
		    $source =  $run_qry['source'];
		 $lift_id = $run_qry['lift_id'];
		  $vehicle =  $run_qry['vehicle'];
		  
		 
		  $destination = $run_qry['destination'];
		  
		 $date = $run_qry['date'];
		  //$Photo = $row_products['photo'];
		   //$contacts =  $row_products['contact'];
		  // $address =  $row_products['address']
			
			
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
	    echo "<td>".$destination."</td>";
	   echo "</tr>";
	   
	 
	    
	    echo "<tr>";
		echo "<td>journey id</td>";
	   echo "<td>".$lift_id."</td>";
	   echo "</tr>";
	   
	    echo "<tr>";
		echo "<td>vehicle</td>";
	   echo "<td>".$vehicle."</td>";
	   echo "</tr>";
	    
	   
	    echo "<tr>";
		echo "<td>Date of journey</td>";
	   echo "<td>".$date."</td>";
	   echo "</tr>";
		   
		     
	    echo "<tr>";
		echo "<td>Email</td>";
	   echo "<td>".$email."</td>";
	   echo "</tr>";
	   
	   
	        
	    echo "<tr>";
		echo "<td>Address</td>";
	   echo "<td>". $address."</td>";
	   echo "</tr>";
		echo "</table>";
		echo "</div>";
		
		
			 }
			 $get_Query_hist = "insert into history(driver, passenger, Date, source, destination, vehicle) values ('$name','$user','$date ',' $source','$destination' , '$vehicle')";
   
  mysqli_query($connection ,$get_Query_hist);
	  
			 
			 }
		
		         
			 
		
		 
		  
             
		
                ?>
              
              <?php
			  
			          echo"<div id='details_id' >
					  <h3><b>Identity proof<b><h3><br>
		  <img src='images/UID-Card1.jpg' width='250' height='250'/><br>
		  </div>";
			  
			  ?>
              
              
              <?php
  
  
				 $value_accept = " accept Request"; 
				 $value_reject = " reject request";
				 $decision ="Not decided";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 
	
	if(isset($_POST['accept'])){
	$status= "YES";
	
	$get_set = "UPDATE requests SET reciver_seen='YES' WHERE 	(Journey_id ='$Journey_id' AND 	receiver = '$user')   ";
     mysqli_query($connection ,$get_set);
	
	 $get_Query = "UPDATE requests SET (confirmation='YES' AND reciver_seen='YES') AND status='CONFIRMED' WHERE request_id = '$request_id' ";
   
           mysqli_query($connection ,$get_Query);
		   
		   
		   
		    $massage ="" .$user  . "  \n accepted your request to journey with you \n 
			        on  ".$date." from  ".$source." to  ".$destination." \n contact him ,his \n phone number is ".$contacts." ";
	   
	    $qry =" SELECT * FROM requests WHERE Journey_id='$lift_id' limit 1";
	 $run_id = mysqli_query($connection, $qry);
	 $row_product=mysqli_fetch_array($run_id);
	 $request_id =$row_product['request_id'];
	 
$get_Query = "insert into massages(receiver, sender, journey_id, request_id, massage) values ('$name','$user', '$lift_id',$request_id,'$massage')";
   
  mysqli_query($connection ,$get_Query);
     
	  
		 if($receiver_is == "driver"){
		 $get_Query = "UPDATE add_offer SET confirmation='YES' WHERE lift_id = '$Journey_id' ";
   
              mysqli_query($connection ,$get_Query);
                
      }
	  
	   else{
		 $get_Query = "UPDATE want_lift SET confirmation='YES' WHERE lift_id = '$Journey_id' ";
   
              mysqli_query($connection ,$get_Query);
                
      }
	  
				 $value_accept = "Request accepted"; 
				// $value_reject = "Request rejected";
			   $msg = "" .$user  . "  \n accepted your request to journey with you \n 
			        on  ".$date." from  ".$source." to  ".$destination." \n contact him ,his phone number is ".$contacts." ";
			   
			   $decision ="confirmed";

 // use wordwrap() if lines are longer than 70 characters
 $msg = wordwrap($msg,70);

 // send email
 mail("sarique.902@gmail.com","My subject",$msg);
	                
					
					}
					
					if(isset($_POST['reject'])){
	       $status= "YES";
	
	 $get_Query = "UPDATE requests SET (confirmation='NO' AND reciver_seen='YES') AND status ='REJECTED' WHERE request_id = '$request_id' ";
   
           mysqli_query($connection ,$get_Query);
		   
		    $massage ="" .$user  . "  \n rejected your request to journey with you \n 
			       on  ".$date." from  ".$source." to  ".$destination." \n so kindly send request to some one else ";
	   
	    $qry =" SELECT * FROM requests WHERE Journey_id='$lift_id' limit 1";
	 $run_id = mysqli_query($connection, $qry);
	 $row_product=mysqli_fetch_array($run_id);
	 $request_id =$row_product['request_id'];
	 
$get_Query = "insert into massages(receiver, sender, journey_id, request_id, massage) values ('$name','$user', '$lift_id',$request_id,'$massage')";
   
  mysqli_query($connection ,$get_Query);
     
		
   
             $value_reject = "Request rejected";
			   $msg = "" .$user  . "  \n rejected your request to journey with you \n 
			        on  ".$date." from  ".$source." to  ".$destination." \n so kindly send request to some one else ";
			    $decision ="Rejected";

 // use wordwrap() if lines are longer than 70 characters
 $msg = wordwrap($msg,70);

 // send email
 mail("sarique.902@gmail.com","My subject",$msg);
	                
					
					}
					
                   }     
				   
				    echo"<div id= style='float:right'>";
  echo"<form action='request_details.php?request_id=$request_id' method='post'  enctype='multipart/form-data' style='margin-left:400px'>      
                            <input class='submit' name='accept' type='submit' value='$value_accept'><br>
					<input class='submit' name='reject' type='submit' value=' $value_reject' style='color:white; background-color:red'>
							
							<br><br>
							<b>Decision<b><br>
							<input  value='$decision' style='color:black; background-color:white;text-align:center;'>
                           </form>";
						   echo"</div>";

				   
?>
                 </div>  <!--available lift ends here--> 



</div><!---->
                               



                           



   
    <div id="portion_main"><h2 style="color:#00F;float:none;padding:3px;margin-left:200px;font-style:oblique; margin-top:30px">Reviews of <?php echo "$name" ?></h2>
  
       <?php
	  
	  
	     $sql = "select * FROM review where for_whom = '$name'";
   $records = mysqli_query($connection,$sql);
		
   while($data = mysqli_fetch_assoc($records)){
	   echo"<div id='portion'> ";
	   
	   
	  
	   echo "<p style='color:green; font-size:20px'>".$data['writer']."</p>";
	    
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

</div>
<?php
footer();

?>
</body>
</html>