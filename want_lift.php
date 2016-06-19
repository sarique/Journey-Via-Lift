<?php
$connection = mysqli_connect('localhost', 'root', '','jvl'); // Establishing Connection with Server
 // Selecting Database from Server
 
 session_start();
 $username = $_SESSION['username'];
   $get_user = "select * from user_info where name = '$username'";
			 
			 $run_user = mysqli_query($connection, $get_user);
			 $row_data = mysqli_fetch_array($run_user);
			 
			 
  
if(isset($_GET['search'])){ // Fetching variables of the form which travels in URL
$photo =  $row_data['Photo'];
$name = $row_data['name'];
$email = $row_data['email'];
$contact = $row_data['contact'];
$age = $row_data['age'];
$address = $row_data['address'];
$source = $_GET['source'];
$destination = $_GET['destination'];
$date = $_GET['date'];
if($name !=''||$email !=''){
//Insert Query of SQL
  $get_Query = "insert into want_lift(username, email, contact, age, address, source, destination, image, date) values ('$name', '$email', $contact, $age, '$address', '$source', '$destination', '$photo', '$date')";
mysqli_query($connection ,$get_Query);
echo "<br/><br/><span>Data Inserted successfully in want lift</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}

if(isset($_GET['offer_lift'])){ // Fetching variables of the form which travels in URL
$photo =  $row_data['Photo'];
$name = $row_data['name'];
$email = $row_data['email'];
$contact = $row_data['contact'];
$age = $row_data['age'];
$address = $row_data['address'];
$source = $_GET['source'];
$destination = $_GET['destination'];
$date = $_GET['date'];
if($name !=''||$email !=''){
//Insert Query of SQL
  $get_Query = "insert into add_offer(name, email, contact, age, address, source, destination, Photo, date) values ('$name', '$email', $contact, $age, '$address', '$source', '$destination', '$photo', '$date')";
mysqli_query($connection ,$get_Query);
echo "<br/><br/><span>Data Inserted successfully in add_offer!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
 
mysqli_close($connection); // Closing Connection with Server
?>