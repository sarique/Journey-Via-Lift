
<!DOCTYPE html>
<html>
<head>
<title>PHP insertion</title>
<link rel="shortcut icon" href="images/car-sharing2.jpg" />

<link href="styles/signup.css" rel="stylesheet">
</head>
<body>
 
<?php

         include("includes/connect.php");
		 include("funtions/commen1.php");
		  $usernameErr = $passwordErr = $Not_present = "";
         $username = $password = "";
         			 
			  if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["Username"])) {
               $usernameErr = "Username is required";
            }else {
               $username = test_input($_POST["Username"]);
            }
			 if (empty($_POST["password"])) {
               $passwordErr = "Password is required";
            }
            else {
               $password = test_input($_POST["password"]);
            }
		
		
		
		if( $usernameErr == "" && $passwordErr == "") {
      
	  	      //$No_Query = "select * from user_info where name='".$username."' and password='".$password."' ";
			  $No_Query = sprintf("SELECT * FROM user_info WHERE name='%s' AND password='%s'",
                 $connection->real_escape_string($username),
                    $connection->real_escape_string($password));
                         $q=mysqli_query($connection,$No_Query) or die(mysql_error());
						 $n=mysqli_fetch_row($q);
						 if($n == 0){
							 $Not_present = "Invalid password or username";
							 }
							 
							 else{
								  session_start();
	                            $user = $_POST['Username'];
	                              $_SESSION['username'] = $user;
								   header("Location: my_account.php");
                                           exit;
								 }
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

<div class="form_div" style="height:700px">






<form action="<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<!-- Method can be set as POST for hiding values in URL-->


<h1>Login</h1>

<span class = "error"><?php echo $Not_present;?></span><br>
<label>Username:</label><br>
<span class = "error">* <?php echo $usernameErr;?></span>
<input class="input" name="Username"  placeholder="username" type="text"   value="">


<label>Password:</label><br>
<span class = "error">* <?php echo $passwordErr;?></span>
<input class="input" name="password" placeholder="**********" type="password" value="">



<br>
<input class="submit" name="submit" type="submit" value="Login">
</form>
</div>
</div>
<?php
footer();
?>
</body>
</html>