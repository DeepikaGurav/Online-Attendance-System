<?php


$connect= new mysqli('localhost','root','','mini_pro') or die("Unable to connect");

echo "CONNECTED";

if(isset($_POST['Login']))				//Login for user
{
$user_id_form=$_POST['user_id'];
$password_form=$_POST['password'];
$set=1;
echo "CONNECTED";
$extract= mysqli_query($connect,"SELECT * FROM user")or die("sql error");
	$numrows=mysqli_num_rows($extract);
	while($row=mysqli_fetch_assoc($extract))
	{
		//$id=$row['ID'];
		$user_id=$row['user_id'];
		$password=$row['password'];
		if($user_id==$user_id_form && $password==$password_form)
		{
			$set=0;
			break;
		}
		else
		{
			$set=1;
		}
	}
	if($set==0)
	{
		$extract= mysqli_query($connect,"SELECT user_type FROM user WHERE user_id='$user_id' ")or die("sql error");
		$row=mysqli_fetch_assoc($extract);
		$user_type=$row['user_type'];
		if($user_type=='student')
		{
			header('Location: view_student.php');
			echo "Succesfull Login";
		}
		elseif($user_type=='parent')
		{
			header('Location:view_student.php');
			echo "Succesfull Login";
		}
		elseif($user_type=='teacher')
		{
			header('Location:attendance.php');
			echo "Succesfull Login";
		}
		else
		{ echo "";}	
	}
	else
	{
		echo "Plzz enter proper username and password";
	}
}
elseif(isset($_POST['register']))	//Registration of user
{
$user_id_form=$_POST['user_id'];
$first_name_form=$_POST['first_name'];
$last_name_form=$_POST['last_name'];
$user_type_form=$_POST['user_type'];
$password_form=$_POST['password1'];
$repassword_form=$_POST['password2'];
$set=0;

	if($password_form==$repassword_form)
	{
		$extract= mysqli_query($connect,"SELECT * FROM user")or die("sql error");

	$numrows=mysqli_num_rows($extract);

	while($row=mysqli_fetch_assoc($extract))
	{


		$user_id=$row['user_id'];
		$password=$row['password'];
		if($user_id==$user_id_form){	$set=1;break;}	
		else{$set=0;}	
			
		
	}
		if($set==1)
		{echo "User is alredy registerd with this user_id" ;}
		else{
$write=mysqli_query($connect,"INSERT INTO user VALUES('$user_id_form','$first_name_form','$last_name_form','$user_type_form','$password_form')") or die ("sql error");
		echo "Sign Up succesfully";
		header('Location: Login.php');  }


}
		
	else
	{
		echo "Both passwords are not matching";
	}
}



?>
