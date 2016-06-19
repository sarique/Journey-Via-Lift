

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
<!-->
var image1=new Image()
image1.src="images/download1.jpg"
var image2=new Image()
image2.src="images/download2.jpg"
var image3=new Image()
image3.src="images/download3.jpg"
//-->
</script>
</head>
<body>
<img src="images/download1.jpg" name="slide" width="400" height="400">
<script type="text/javascript">
<!--
var step=1
function slideit(){
document.images.slide.src=eval("image"+step+".src")
if(step<3)
step++
else
step=1
setTimeout("slideit()",2500)
}
slideit()
//-->
</script>
</body>
</html> 

