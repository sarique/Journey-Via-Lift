
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
			   
	   $lift_id =  $_SESSION['user_id'];
			  
			  }
			  
			  else{
				   
				   
		   	$user = $_GET['user'];
		
			 
			  }
		
		      
		       			   
             $get_products = "select * FROM user_info where name = '$user'";
			 
			 $run_products = mysqli_query($connection, $get_products);
			                
			 while ($row_products=mysqli_fetch_array($run_products)){
                  
		//  $lift_id = $row_products['lift_id'];
		  $name = $row_products['name'];
		// $source = $row_products['source'];
		//  $destination = $row_products['destination'];
		  $email = $row_products['email'];
		// $date = $row_products['date'];
		  $Photo = $row_products['Photo'];
		   $contacts =  $row_products['contact'];
		    $age = $row_products['age'];
			$address = $row_products['address'];
			//$vehicle = $row_products['vehicle'];
			$count = 10;
  		     
		 echo"
		
		  <div id='details_image' style='margin-left:100px;'>
		  
		  <img src='images/$Photo' width='200' height='200' /><br>
		   <a href='my_account.php' style='float:left;'>Go back</a>
		  </div>
		   
		  
		  
		  
		   ";
		   echo "<div id='details_other'>";
		   echo "<table>";
		    echo "<tr>";
			echo "<td>Name</td>";
	   echo "<td>".$name."</td>";
	   echo "</tr>";
	   
	   
	   
	   
	   
	   	   
	     echo "<tr>";
		echo "<td>Email</td>";
	   echo "<td>".$email."</td>";
	   echo "</tr>";
	   
	     echo "<tr>";
		echo "<td>Age</td>";
	   echo "<td>".$age."</td>";
	   echo "</tr>";
	   
	    echo "<tr>";
		 echo "<td>Address</td>";
	   echo "<td>".$address."</td>";
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
             
           
                
                    



</div><!--content_wrapper ends here-->









   
    <div id="portion_main"><h2 style="color:#00F;float:none;padding:3px;margin-left:200px;font-style:oblique;">Reviews of <?php echo "$name" ?></h2>
  
       <?php
	  
	  
	     $sql = "select * FROM review where for_whom = '$name'";
   $records = mysqli_query($connection,$sql);
		
   while($data = mysqli_fetch_assoc($records)){
	   echo"<div id='portion'> ";
	   
	   
	  
	   
	    echo $data['writer'];
	   echo"<br>";
	     echo"<br>";
	    echo "about vehicle";
	   echo"<br>";
	   echo $data['about_co_traveller'];
	   
	    echo"<br>";
	     echo"<br>";
	    echo "about him";
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

<div id="footer1"><br /><br />
     <b style="color:inherit"><a href="index.php">About us </a>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<a href="index.php"> Travels guides</a>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <a href="index.php"> Trust</a></b>  
     <br /><br /><br></br><br /><br />
    <h3 style="color:#FFF; padding-top:30px; text-align:center; ">&copy; 2016 - By www.JourneyVaiLift.com
    </h3>
    </div>
</body>
</html>