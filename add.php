<?php
$connection = mysqli_connect('localhost', 'root', '','jvl'); // Establishing Connection with Server
 // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$name = $_POST['name'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$date = $_POST['date'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$age = $_POST['age'];
$address = $_POST['address'];
$vehicle = $_POST['vehicle'];
if($name !=''||$email !=''){
//Insert Query of SQL
  $get_Query = "insert into add_offer(name, source, destination, date, email, contact, age, address, vehicle) values ('$name','$source','$destination', '$date', '$email', $contact, $age, '$address', '$vehicle')";
mysqli_query($connection ,$get_Query);
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysqli_close($connection); // Closing Connection with Server
?>