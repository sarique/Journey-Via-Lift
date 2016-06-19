
<!DOCTYPE html>
<html>
<head>
<title>PHP insertion</title>
<link href="styles/insert2.css" rel="stylesheet">
<link rel="stylesheet" href="styles/common.css" media="all" />
</head>
<body>
<?php
           include("funtions/common.php");
         include("includes/connect.php");
		 
		  $usernameErr = $EmailErr = $massageErr = $Not_present = "";
         $username = $EmailErr = "";
         			 
			  if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["Username"])) {
               $usernameErr = "Username is required";
            }else {
               $username = test_input($_POST["Username"]);
            }
			 if (empty($_POST["massage"])) {
               $massageErr = "massage is required";
            }else {
               $massage = test_input($_POST["massage"]);
            }
			 if (empty($_POST["email"])) {
              $EmailEr  = "Password is required";
            }
            else {
               $email = test_input($_POST["email"]);
            }
		
		
		
		if( $usernameErr == "" && ($EmailErr == "" && $massageErr == "")) {
      
	  	       
			    $No_Query = "insert into feedbacks(name,massage,email) values ('$username', '$massage', '$email')";
                         mysqli_query($connection,$No_Query) or die(mysql_error());
						 
						 
                          $Not_present = "Thanks for your feedback";							 
			
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
	   
              
	    head();
          
           
         


       
     ?>
        
   
   
    





<h3 style="color:green;float:left">Send your feedback </h3><br>






<form action="<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="form2">
<!-- Method can be set as POST for hiding values in URL-->




<span class = "error"><?php echo $Not_present;?></span><br>
<label>Username:</label>

<span class = "error">* <?php echo $usernameErr;?></span>
<br>
<input class="input" name="Username" type="text" value="">
<br>

<label>Email:</label>
<span class = "error">* <?php echo $EmailErr;?></span>
<br>
<input class="input" name="email" type="email" value="">
<br>
<label>Messege Body</label>
<span class = "error">* <?php echo $EmailErr;?></span>
<br>
<textarea class="box" name="massage"></textarea>
<br>
<input class="submit" name="submit" type="submit" value="Send">
</form>
</div>

</body>
</html>