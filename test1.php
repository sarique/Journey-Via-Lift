<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Journey via lift</title>
<link rel="stylesheet" href="styles/styles.css" media="all" />
<link href="styles/insert1.css" rel="stylesheet">
</head>

<body>
<div class="main_wrapper">
 <div id="navbar">
    <ul id="menu">
    <li><a href="index.php" style="float:left">How lift sharing help your business??</a></li>
    <img src="images/jvl4.jpg" style="float:left" width='200' height='110' >
        <li><a href="index.php">Home</a></li>
       
       <li><a href="login.php">Log In</a></li>
       
       <li><a href="signup.php">Sign Up</a></li>
       <li><a href="contact.php">Contact Us</a></li>
    </ul>
     
   
   
    </div>
 
<?php

         include("includes/connect.php");
		 
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
      
	  	       $No_Query = "select * from user_info where name='".$username."' and password='".$password."' ";
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
<div class="form_div">
<div class="title">
<h2>Journey vai lift </h2>
</div>





<form action="<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<!-- Method can be set as POST for hiding values in URL-->


<h1>Login</h1>

<span class = "error"><?php echo $Not_present;?></span><br>
<label>Username:</label><br>
<span class = "error">* <?php echo $usernameErr;?></span>
<input class="input" name="Username" type="text" value="">


<label>Password:</label><br>
<span class = "error">* <?php echo $passwordErr;?></span>
<input class="input" name="password" type="password" value="">
<h3 align="right"><a href="forget_password.php">Forget password?</a></h3>


<br>
<input class="submit" name="submit" type="submit" value="Sign in">
</form>
</div>

 
  
  
 

</div>








</body>
</html>