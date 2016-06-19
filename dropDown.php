<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>drop down </title>
<link href="styles/dropDown.css" rel="stylesheet">
</head>

<body>


<ul id="nav">
<li><a href="#">Link1</a></li>
<li><a href="#">Link2</a></li>
<li><a href="#">Link3</a></li>
<li id="notification_li">
<a href="#" id="notificationLink">Notifications</a>
// Notification Popup Code...


<div id="notificationContainer">
<div id="notificationTitle">Notifications</div>
<div id="notificationsBody" class="notifications"></div>
<div id="notificationFooter"><a href="#">See All</a></div>
</div>

</li>

<li><a href="#">Link4</a></li>
</ul>
<script type="text/javascript" src="js/jquery.min.1.9.js"></script>
<script type="text/javascript" >
$(document).ready(function()
{
$("#notificationLink").click(function()
{
$("#notificationContainer").fadeToggle(300);
$("#notification_count").fadeOut("slow");
return false;
});

//Document Click hiding the popup 
$(document).click(function()
{
$("#notificationContainer").hide();
});

//Popup on click
$("#notificationContainer").click(function()
{
return false;
});

});
</script>
</body>
</html>