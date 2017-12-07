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
                <li><a href="view_attendance.php">View Attendance</a></li>
                <li><a href="contactus.html">Contact Us</a></li>
            </ul>    	
        </div> <!-- end of templatemo_menu -->

<div id="temmplatmeo_imagescoope">
<form action="attendance.php" method="POST">

<body>
<div class="section group">
	

	
<form action='add_attendance.php'  method='POST'>
<div id='d1' name='d1' class="col span_1_of_2">
<label><b> UserID:</label><input type='text' id='user_id' name='user_id'/><p><p><br><br></div>
<div id='d1' name='d1' class="col span_1_of_2">
<label><b>Class Name:</label><input type='text' id='class_name' name='class_name'/><p><p><br><br></div>
<div id='d1' name='d1' class="col span_1_of_2">
<label><b>Subject Name:</label><input type='text' id='sub_name' name='sub_name'/><p><p><br><br></div>
<div id='d1' name='d1' class="col span_1_of_2">

<label><b>Lecture Time:</label><input type='text' id='lec_time' name='lec_time'/><p><p><br><br></div>
<div id='d1' name='d1' class="col span_1_of_2">

<input type='Submit' id='button2' name='add' value='Add_attendance'></div>
<div id='d1' name='d1' class="col span_1_of_2">
<input type='Submit' id='button3' name='edit' value='Edit_attendance'></div>
<div id='d1' name='d1' class="col span_1_of_2">
<a href="delete_attendance.php">Delete Attendnce</a></div>
<div id='d1' name='d1' class="col span_1_of_2">
<a href="view_attendance.php">View Attendance</a></div></form>


<?php


$connect= new mysqli('localhost','root','','mini_pro') or die("Unable to connect");


if(isset($_POST['add']))				
{
$user_id_form=$_POST['user_id'];
$class_name_form=$_POST['class_name'];
$sub_name_form=$_POST['sub_name'];
$lec_time_form=$_POST['lec_time'];

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
	if($set==1){echo"Attendance is already  added";}
	else
	{
		$extract= mysqli_query($connect,"SELECT user_id FROM user WHERE user_type='student' ")or die("sql error");
		$numrows=mysqli_num_rows($extract);
		while($row=mysqli_fetch_assoc($extract))
		{

			$user_id=$row['user_id'];
		
			if($user_id==$user_id_form)
			{
				$set=1;break;
			}
			else{$set=0;}
		}
		if($set==1){
			$write=mysqli_query($connect,"INSERT INTO attendance VALUES('$user_id_form','$class_name_form','$sub_name_form','$lec_time_form')") or die ("sql error");
			echo"Attendance added successfully";}
		else{echo "user must b student only";}
	}




}
elseif(isset($_POST['edit']))				
{
$user_id_form=$_POST['user_id'];
$class_name_form=$_POST['class_name'];
$sub_name_form=$_POST['sub_name'];
$lec_time_form=$_POST['lec_time'];

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
		$write=mysqli_query($connect ,"UPDATE attendance SET class_name='$class_name_form', sub_name='$sub_name_form' ,lec_time='$lec_time_form'WHERE user_id='$user_id_form ' ") or die("COULD NOT CHANGE");
		echo "Data suceesfully updated";
	}

	elseif($set==0)
	{
		echo "Attendance of this Student is not added uptil now , add it first then again try to edit data";
	}
	else{ echo "";}




}
else{ echo "";}


?>



</body>
</html>
