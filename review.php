<?php
include("includes/connect.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body bgcolor="#666666">
<form method="post" action="insert_product.php" enctype="multipart/form-data">
  <table width="700" align="center" border="1" bgcolor="#9900CC">

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
		  
		  
		 echo "<option value='$cat_contact'>$cat_name</option>";
		
		
		
		
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
      <td><input type="text" name="vehicle modal" /></td>

    </tr>
    
    
    
    
    
     
    
    
     <tr>
                     <td align="right"><b>Date of journey</b></td>
      <td><input type="date" name="Date of journey" /></td>

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
                   <td><textarea name="vehicle_desc" cols="20" rows="6"></textarea></td>

    </tr>
     <tr>
                   <td align="right"><b>about co-traveller</b></td>
                   <td><textarea name="co-traveller_desc" cols="20" rows="6"></textarea></td>

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
      <td><select name="rating-co-traveller">
           
           <option value="YES">YES</option>
           <option value="NO">NO</option>
           
              
       </select></td>

    </tr>
    
    
     <tr align="center">
                   
      <td colspan="2"><input type="submit" name="insert" value="done" /></td>

    </tr>
</form>
</body>
</html>

<?php


   if(isset($_POST['insert_product'])){
   // text data varibles
   $product_title = $_POST['product_title'];
   $product_cat = $_POST['product_cat'];
   $product_brand = $_POST['product_brand'];
   $product_price = $_POST['product_price'];
   $product_desc = $_POST['product_desc'];
   $status = 'on';
   $product_keywords = $_POST['product_keywords'];
   
   
    //image data variable
	$product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
	$product_img3 = $_FILES['product_img3']['name'];
	
	// image temp name
	
	$temp_name1 = $_FILES['product_img1']['tmp_name'];
	$temp_name2 = $_FILES['product_img2']['tmp_name'];
	$temp_name3 = $_FILES['product_img3']['tmp_name'];
	
	 
if($product_title=='' OR $product_cat=='' OR $product_brand=='' OR $product_price=='' OR $product_desc=='' OR 
$product_keywords==''   OR $product_img1==''){
	 echo "<script>alert('please fill all the fields!')</script>";
	 exit();
	 }
	else
	{
	  //uploading images to its folder
	  move_uploaded_file($temp_name1,"product_images/$product_img1");
	    move_uploaded_file($temp_name2,"product_images/$product_img2");
		  move_uploaded_file($temp_name3,"product_images/$product_img3");
	  
	$insert_product = "insert into products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,
	 product_price,product_desc,status) values ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price',
	 '$product_desc','$status')";
	 
	 $run_product = mysqli_query($con, $insert_product);	
	if($run_product)
	{
		 echo"<script>alert('Product inserted seccesfully!')</script>";
	}
	}
	
   }
  
  ?>












