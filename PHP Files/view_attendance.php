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
               <li><a href="attendance.php">Add Attendance</a></li>
                <li><a href="contactus.html">Contact Us</a></li>
            </ul>    	
        </div> <!-- end of templatemo_menu -->

<div id="temmplatmeo_imagescoope">
<form action="view_attendance.php" method="POST">

<body>


<div class="section group">
	

	<div id='d1' name='d1' class="col span_1_of_2">
<br>
	<label><b>View Attendance  by  UserID:  </label><input type='text' id='user_id' name='user_id'/>

<input type='submit' id='button1' name='view1' value='View_attendance_by_USERID'><p><p><br><br></div>


<div id='d1' name='d1' class="col span_1_of_2">
	<label><b>View Attendance  by  Class Name:</label><input type='text' id='class_name' name='class_name'/>
<input type='submit' id='button2' name='view2' value='View_attendance_by_Class_name'><p><p><br><br></div>
<div id='d1' name='d1' class="col span_1_of_2">
	<label><b>View Attendance  by Subject Name:</label><input type='text' id='sub_name' name='sub_name'/>
<input type='submit' id='button3' name='view3' value='View_attendance_by_Subject_name'><p><p><br><br></div>
<div id='d1' name='d1' class="col span_1_of_2">
	<label><b>View Attendance  by  Lecture Time:</label><input type='text' id='lec_time' name='lec_time'/>
<input type='button' id='button4' name='view4' value='View_attendance_by_lec_time' onclick=><p><p><br><br><br><br>
	</div>

</div> <!--temmplatmeo_imagescoope -->

</form>


<?php

$connect= new mysqli('localhost','root','','mini_pro') or die("Unable to connect");



if(isset($_POST['view1']))				
{
$user_id_form=$_POST['user_id'];
$extract= mysqli_query($connect,"SELECT *  FROM attendance  WHERE user_id='$user_id_form' ")or die("sql error");
$row=mysqli_fetch_assoc($extract);

$user_id=$row['user_id'];
if($user_id==$user_id_form){$class_name=$row['class_name'];
$sub_name=$row['sub_name'];
$lec_time=$row['lec_time'];
echo"Student id is $user_id,Class Naame is $class_name,Subject Name is $sub_name , Lecture time is $lec_time";}

else {echo "User is not present";}


}
elseif(isset($_POST['view2']))				
{
$class_name_form=$_POST['class_name'];
$extract= mysqli_query($connect,"SELECT *  FROM attendance  WHERE class_name='$class_name_form' ")or die("sql error");
$row=mysqli_fetch_assoc($extract);
$user_id=$row['user_id'];
$class_name=$row['class_name'];
$sub_name=$row['sub_name'];
$lec_time=$row['lec_time'];
if($class_name==$class_name_form){

echo"Student id is $user_id,Class Naame is $class_name,Subject Name is $sub_name , Lecture time is $lec_time";}

else {echo "User is not present";}

}
elseif(isset($_POST['view3']))				
{
$sub_name_form=$_POST['sub_name'];
$extract= mysqli_query($connect,"SELECT *  FROM attendance  WHERE sub_name='$sub_name_form' ")or die("sql error");
$row=mysqli_fetch_assoc($extract);
$user_id=$row['user_id'];
$class_name=$row['class_name'];
$sub_name=$row['sub_name'];
if($sub_name==$sub_name_form){
$lec_time=$row['lec_time'];
echo"Student id is $user_id,Class Naame is $class_name,Subject Name is $sub_name , Lecture time is $lec_time";}
else{ echo "user is not present";}
}
elseif(isset($_POST['view4']))				
{
$lec_time_form=$_POST['lec_time'];
$extract= mysqli_query($connect,"SELECT *  FROM attendance  WHERE lec_time='$lec_time_form' ")or die("sql error");
$row=mysqli_fetch_assoc($extract);
$user_id=$row['user_id'];
$class_name=$row['class_name'];
$sub_name=$row['sub_name'];
$lec_time=$row['lec_time'];
if($lec_time==$lec_time_form){
echo"Student id is '$user_id',Class Naame is $class_name,Subject Name is $sub_name , Lecture time is $lec_time";}
else{ echo "user is not present";}
}
else { echo "Press button";}
	
?>

</body>
</html>
