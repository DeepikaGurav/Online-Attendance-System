<html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Attendance Page</title>

<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="fluid1.css">
<link href="jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
</head>
 <div id="temmplatmeo_header">
   		<h1><center>Online Attendance System</center></h1><br>
		<h2><center><font face="papyrus"><b>Wel to our System</b></font></center></h2>
<div id="templatemo_menu">
            <ul>
                <li><a href="index.html" class="current">Home</a></li>
                <li><a href="about.html">About</a></li>
              
                <li><a href="contactus.html">Contact Us</a></li>
            </ul>    	
        </div> <!-- end of templatemo_menu -->

<div id="temmplatmeo_imagescoope">
<form action="delete_attendance.php" method="POST">

<body>
<div class="section group">
<form action='delete_attendance1.php'  method='POST'>
<div id='d1' name='d1' class="col span_1_of_2">
<label><b>Delete by  UserID:</label><input type='text' id='user_id' name='user_id'/><p><p><br><br></div>
<div id='d1' name='d1' class="col span_1_of_2">

<input type='Submit' id='button2' name='delete' value='Delete_attendance'><p><p><br><br></div>
</form>

<?php


$connect= new mysqli('localhost','root','','mini_pro') or die("Unable to connect");



if(isset($_POST['delete']))				
{
$user_id_form=$_POST['user_id'];

$set=0;

$extract= mysqli_query($connect,"SELECT *  FROM attendance  ")or die("sql error");
	$numrows=mysqli_num_rows($extract);
	while($row=mysqli_fetch_assoc($extract))
	{

		$user_id=$row['user_id'];
		
		
		if($user_id==$user_id_form )
		{
			$set=1;break;
		}
		else{$set=0;}
	}
	if($set==1)
	{
		$write=mysqli_query($connect ,"DELETE FROM attendance WHERE user_id='$user_id_form' ") or die("COULD NOT CHANGE");
		echo "Data suceesfully deleted";
	}

	else
	{
		echo "No data Attendance found for this userid";
	}




}



?>


</body>
</html>
