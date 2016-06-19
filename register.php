<?php
$connection = mysqli_connect('localhost', 'root', '','jvl'); // Establishing Connection with Server
 // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$age = $_POST['age'];
$address = $_POST['address'];
if($name !=''||$email !=''){
//Insert Query of SQL
  $get_Query = "insert into user_info(name, email, contact, age, address) values ('$name', '$email', $contact, $age, '$address')";
mysqli_query($connection ,$get_Query);
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysqli_close($connection); // Closing Connection with Server
?>