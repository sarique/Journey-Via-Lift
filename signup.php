<?php
include("funtions/commen1.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP insertion</title>
<link href="styles/signup.css" rel="stylesheet">

</head>
<body>
 <?php
         // define variables and set to empty values
         $nameErr = $emailErr = $contactErr = $ageErr = $addressErr = $passwordErr = $imageErr = "";
         $name = $email = $contact0 = $age = $address = $allready = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            if (empty($_POST["contact"])) {
               $contactErr = "Contact is required";
            }
            else {
               $contact = test_input($_POST["contact"]);
            }
			 
			 
			 if (empty($_POST["password"])) {
               $passwordErr = "Password is required";
            }
            else {
               $password = test_input($_POST["password"]);
            }
            
            if (empty($_POST["age"])) {
               $ageErr = "age is required";
            }else {
               $age = test_input($_POST["age"]);
            }
            
            if (empty($_POST["address"])) {
               $addressErr = "Address is required";
            }else {
               $address = test_input($_POST["address"]);
            }
         
         
         
		 if($nameErr == "" && $emailErr == "" && $contactErr == "" && $ageErr == "" && $addressErr == "" && $passwordErr == ""){
			 $connection = mysqli_connect('localhost', 'root', '','jvl'); // Establishing Connection with Server
 // Selecting Database from Server
 // Fetching variables of the form which travels in URL
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$age = $_POST['age'];
$address = $_POST['address'];
$password = $_POST['password'];

$user_img1 = $_FILES['vehicle_img1']['name'];
$temp_name1 = $_FILES['vehicle_img1']['tmp_name'];

$user_id = $_FILES['user_id']['name'];
$temp_id = $_FILES['user_id']['tmp_name'];


$No_Query = "select * from user_info where name='".$name."' or email='".$email."' ";
 $q=mysqli_query($connection,$No_Query) or die(mysql_error());
  $n=mysqli_fetch_row($q);
if($n == 0){
//Insert Query of SQL
  $get_Query = "insert into user_info(name, email, contact, age, address,password,Photo,user_id) values ('$name', '$email', $contact, $age, '$address', '$password', '$user_img1', '$user_id')";
  move_uploaded_file($temp_name1,"images/user_photo/$user_img1");
   move_uploaded_file($temp_id,"images/user_photo/$user_id");
mysqli_query($connection ,$get_Query);
$allready = "Data Inserted successfully...!!";
  
  
}
else{
$allready = "this user is already registered";
}

mysqli_close($connection); // Closing Connection with Server
			 
			 }
			 
			 
			 
		 }
		 function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>

<div class="maindiv">
<!--HTML Form -->
 <?php
 navbar();
 ?>
<div class="form_div">


<form method="post" action= "<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<!-- Method can be set as POST for hiding values in URL-->
<p><span class = "error">*required field.</span></p><br>
<h2>Sign up</h2>
 
 <span><?php echo $allready;?></span><br>
<label>Name:</label> <br>
<span class = "error">* <?php echo $nameErr;?></span>
<input class="input" name="name"  placeholder="username" type="text" value="">
 
<label>Email:</label><br>
<span class = "error">* <?php echo $emailErr;?></span>
<input class="input" name="email" type="email"  placeholder="email" value="">
<label>Password:</label><br>
<span class = "error">* <?php echo $passwordErr;?></span>
<input class="input" name="password" type="password" placeholder="*********"  value="">

<label>Contact:</label><br>
<span class = "error">* <?php echo  $contactErr;?></span>
<input class="input" name="contact" type="text" value="">
<label>Age:</label><br>
 <span class = "error">* <?php echo $ageErr;?></span>
<input class="input" name="age" type="text" value="">

<label>Your Image </label>
 
 <input class="input" type="file" name="vehicle_img1" />
 
 <label>Your ID </label>
 
 <input class="input" type="file" name="user_id" />
<label>Address:</label><br>
<span class = "error">* <?php echo $addressErr;?></span>
<textarea cols="25" name="address" rows="5"></textarea>
<br>
<input class="submit" name="submit" type="submit" value="Register">
</form>
</div>
</div>
<?php
footer();
?>
</body>
</html>