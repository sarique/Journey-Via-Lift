<?php
 include("funtions/common.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP insertion</title>
<link href="styles/find_lift.css" rel="stylesheet">
<link rel="stylesheet" href="styles/common.css" media="all" />

</head>
<body>
<div class="maindiv">
 <?php
	   
	   $user =  $_SESSION['username'];
            
	     
          
           
         


       
     ?>
     
     <?php
$connection = mysqli_connect('localhost', 'root', '','jvl'); // Establishing Connection with Server
 // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
 $get_products = "select * FROM user_info where name = '$user'";
			 
			 $run_products = mysqli_query($connection, $get_products);
			                
			 while ($row_products=mysqli_fetch_array($run_products)){
                  
		 // $lift_id = $row_products['lift_id'];
		  $name = $row_products['name'];
		 //$source = $row_products['source'];
		//  $destination = $row_products['destination'];
		  $email = $row_products['email'];
		// $date = $row_products['date'];
		  $Photo = $row_products['Photo'];
		   $contact =  $row_products['contact'];
		   $address =  $row_products['address'];
		   $age =  $row_products['age'];
			 }
$source = $_POST['source'];
$destination = $_POST['destination'];
$date = $_POST['date'];
//$email = $_POST['email'];
//$contact = $_POST['contact'];
//$age = $_POST['age'];
//$address = $_POST['address'];
$vehicle = $_POST['vehicle'];



//$vehicle_img1 = $_FILES['product_img1']['name'];

//$temp_name1 = $_FILES['product_img1']['tmp_name'];
if($source !=''&& $destination!='' && $date!='' && $vehicle!='' ){
//Insert Query of SQL
  $get_Query = "insert into want_lift(username, source, destination, date, email, contact, age, address, vehicle, image) values ('$name','$source','$destination', '$date', '$email', $contact, $age, '$address', '$vehicle', '$Photo')";
  // move_uploaded_file($temp_name1,"images/user_photo/$vehicle_img1");
   
mysqli_query($connection ,$get_Query);
echo"<script>alert('lift inserted seccesfully!')</script>";
}
else{
       echo"<script>alert('please fill all the fields')</script>";
}
}
mysqli_close($connection); // Closing Connection with Server
?>
     <?php
 head();
 
			  ?>
          

<div class="form_div">
<div id="title1">
<h2>Journey vai lift</h2>
</div>
<form action="find_lift.php" method="post"  enctype="multipart/form-data" >
<!-- Method can be set as POST for hiding values in URL-->
<h2>Find a lift</h2>

<label>Source:</label>

<?php
echo"<select class ='input'  name='source'>
            <option></option>";
	  $connection = mysqli_connect('localhost', 'root', '','jvl');
	 
	   $query = "SELECT * from locations";
   $res = mysqli_query($connection,$query);
     
      while($row=mysqli_fetch_array($res))
        {
		   
            echo "<option value='".$row[0]."'>".$row[0]."</option>";
           
             
			
		}
		
              echo"</select>";
			  ?>

<label>Destination:</label>

<?php
echo"<select class ='input'  name='destination'>
            <option></option>";
	  $connection = mysqli_connect('localhost', 'root', '','jvl');
	 
	   $query = "SELECT * from locations";
   $res = mysqli_query($connection,$query);
     
      while($row=mysqli_fetch_array($res))
        {
		   
            echo "<option value='".$row[0]."'>".$row[0]."</option>";
           
             
			
		}
		
              echo"</select>";
			  ?>

<label>Type of Vehicle you want:</label>
<select class="input" name="vehicle" >
<option></option>
  <option value="2-wheeler">2-wheeler</option>
  <option value="3-wheeler">3-wheeler</option>
  <option value="4-wheeler">4-wheeler</option>
  
</select>

<label>Date:</label>
<input class="input" name="date" type="date" value="">
 
 
 



<br>
<input class="submit1" name="submit" type="submit" value=" Find a lift">
</form>
</div>
</div>

<?php
footer();

?>
</body>
</html>

  

