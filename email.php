<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>



<?php
 $msg = "First line of text\nSecond line of text";

 // use wordwrap() if lines are longer than 70 characters
 $msg = wordwrap($msg,70);

 // send email
 mail("sarique.902@gmail.com","My subject",$msg);
 ?> 
</body>
</html>