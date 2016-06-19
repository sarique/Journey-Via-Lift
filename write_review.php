
<?php
include("includes/connect.php"); 
include("funtions/common.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="styles/write_review.css" rel="stylesheet">
<link rel="stylesheet" href="styles/common.css" media="all" />


<link rel="shortcut icon" href="images/car-sharing2.jpg" />
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>journey via lift</title>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  
</head>

<body>

 <?php
	   
     
	   $user =  $_SESSION['username'];
	     
	   
	   
	   ?>
       <div class="maindiv">
        <?php
	   
               head();
	    
          
           
         


       
     ?>
<form method="post" action="write_review.php">
  <table width="800" align="center" border="1">

  <tr align="center">
  
  <td colspan="2"><h1>Write a review<h1></td>
  
  
  </tr>
  

    
    
  
    
     <tr>
         <td align="right"><b>for whom</b></td>
      <td>
         <select name="for_whom">
           
           <option>Select a co-traveller</option>
                <?php
		 $gets_cats = "select * from  user_info";
		 $run_cats = mysqli_query($connection,$gets_cats);
		 
		      while($row_cats=mysqli_fetch_array($run_cats)){
          
		  $cat_contact = $row_cats['contact'];
		  $cat_name = $row_cats['name'];
		  
		  
		 echo "<option value='$cat_name'>$cat_name</option>";
		
		
		
		
		         }
         ?>  
     
          </select>
      
      </td>

    </tr>
       <tr>
        <td align="right"><b>Vehicle type</b></td>
      <td>
         <select name="Vehicle">
           
           <option value="2-wheeler">2-wheeler</option>
           <option value="3-wheeler">3-wheeler</option>
           <option value="4-wheeler">4-wheeler</option>
           
              
       </select>
      </td>

    </tr>

     
     <tr>
                     <td align="right"><b>vehicle modal</b></td>
      <td><input type="text" name="vehicle_model" /></td>

    </tr>
    
    
    
    
    
     
    
    
     <tr>
                     <td align="right"><b>Date of journey</b></td>
      <td><input type="date" name="Date_of_journey" /></td>

    </tr>
     <tr>
                     <td align="right"><b>source</b></td>
            <td><select class ="input"  name="source">
      <?php
	    
          $query = "SELECT * from locations";
           
$res = mysqli_query($connection,$query);



       
      while($row=mysqli_fetch_array($res))
        {
		   
            echo "<option value='".$row[0]."'>".$row[0]."</option>";
           
             
			
		}
		?>
              </select></td>

            </tr>
            
             <tr>
                     <td align="right"><b>destination</b></td>
            <td><select class ="input"  name="destination">
      <?php
	    
          $query = "SELECT * from locations";
           
$res = mysqli_query($connection,$query);



       
      while($row=mysqli_fetch_array($res))
        {
		   
            echo "<option value='".$row[0]."'>".$row[0]."</option>";
           
             
			
		}
		?>
              </select></td>

            </tr>
    
     <tr>
                   <td align="right"><b>about vehicle</b></td>
                   <td><textarea name="vehicle_desc" cols="20" rows="10"></textarea></td>

    </tr>
     <tr>
                   <td align="right"><b>about co-traveller</b></td>
                   <td><textarea name="co-traveller_desc" cols="20" rows="10"></textarea></td>

         </tr>
    
     <tr>
        <td align="right"><b>Rating for vechile(out of 5)</b></td>
      <td>
         <select name="rating-vechile">
           
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
              
       </select>
      </td>

    </tr>
      
      
      <tr>
        <td align="right"><b>Rating for co-traveller(out of 5)</b></td>
      <td>
         <select name="rating-co-traveller">
           
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
              
       </select>
      </td>

    </tr>
       <tr>
                        <td align="right"><b>will you recommend him?</b></b></td>
      <td><select name="recommend">
           
           <option value="YES">YES</option>
           <option value="NO">NO</option>
           
              
       </select></td>

    </tr>
    
    
     <tr align="center">
                   
      <td colspan="2"><input type="submit" name="insert" value="done" /></td>

    </tr>
</form>
</div>
</body>
</html>

<?php
       
     
   if(isset($_POST['insert'])){
   
   
   $for_whom = $_POST['for_whom'];
   $Vehicle = $_POST['Vehicle'];
   $vehicle_modal = $_POST['vehicle_model'];
   $Date_of_journey = $_POST['Date_of_journey'];
   $source = $_POST['source'];
    $destination = $_POST['destination'];
   
   $vehicle_desc = $_POST['vehicle_desc'];
   $co_traveller_desc = $_POST['co-traveller_desc'];
   $rating_vechile = $_POST['rating-vechile'];
   $rating_co_traveller = $_POST['rating-co-traveller'];
   $recommend = $_POST['recommend'];
   
   
   

	
	 
if($for_whom=='' OR  $Vehicle=='' OR $vehicle_modal=='' OR $Date_of_journey=='' OR $source=='' OR 
$destination==''   OR  $vehicle_desc==''   OR  $co_traveller_desc==''   OR $rating_vechile==''   OR $rating_co_traveller==''  OR $recommend=='' ){
	 echo "<script>alert('please fill all the fields!')</script>";
	 exit();
	 }
	else
	{
	  
	  
$insert_product = "insert into review(writer,for_whom,vehicle_type,vehicle_modal,Date_of_journey,source,destination,about_vehicle,about_co_traveller,rating_for_vehicle,rating_for_co_traveller,recommend) values ('$user','$for_whom','$Vehicle','$vehicle_modal', $Date_of_journey, '$source', '$destination', '$vehicle_desc', '$co_traveller_desc', $rating_vechile, $rating_co_traveller, '$recommend' )";
	 
	 $run_product = mysqli_query($connection, $insert_product);	
	if($run_product)
	{
		 echo"<script>alert('Review inserted seccesfully!')</script>";
	}
	else{
		    echo"<script>alert('Review  not inserted seccesfully!')</script>";
		}
	
	}
	
   }
  
  ?>












