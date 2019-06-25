<?php
include_once("../include/header.php");

//variable declaration
$username = "";
$email = "";
$errors = array();

//call the register() function if register_btn is clicked
if(isset($_POST['register_btn']))
{
	register();
}

//REGISTER USER
function register()
{
	//call these variables with the global keyword to make them avaiable in function
	global $con, $errors, $username, $email;

	//receive all input values from the form. call the e() function
	//defined below to escape form values
	$username = e($_POST['username']);
	$email = e($_POST['email']);
	$password_1 = e($_POST['password_1']);
	$password_2 = e($_POST['password_2']);

	//form validation: ensure that the form is correctly filled
	if(empty($username))
	{
		array_push($errors, "Username is required");
	}
	if(empty($email))
	{
		array_push($errors,"Email is required");
	}
	if(empty($password_1))
	{
		array_push($errors,"Password is required");
	}
	if($password_1 != $password_2)
	{
		array_push($errors,"The two passwords do not match");
	}

	//register user if there are no errors in the form
	if(count($errors) == 0)
	{
		$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users(userName, userPassword, userEmail, userType, userPermission, userStatus) VALUES ('$username', '$password', '$email', '1', '0', '1')";
			mysqli_query($con, $query);
			//get id of the created user
			$query_reg_user = "SELECT * FROM users WHERE userName = '$username' AND userType='1'";
			$result = mysqli_query($con, $query_reg_user);
			$row = mysqli_fetch_array($result);
			$_SESSION['user'] = $row['userName'];
			$_SESSION['userID'] = $row['userID'];
			$_SESSION['userPermission'] = $row['userPermission'];
			$_SESSION['success'] = "You are now logged in";
			header('location:../view/home.php');
	}else{
			echo 'Error';
	}
}

if (isset($_POST['login'])) {
	$username = e($_POST['username']);
	$password = e($_POST['password']);
		//form validation: ensure that the form is correctly filled
		if(empty($username))
		{
			array_push($errors, "Username is required");
		}
		if(empty($password))
		{
			array_push($errors,"Password is required");
		}
		//login user if there are no errors in the form
		if(count($errors) == 0)
		{
			$password = md5($password);
			$query_user = "SELECT * FROM users WHERE userName = '$username' AND userPassword='$password' AND userType='1'";
			$resultUser = mysqli_query($con, $query_user);
			$row = mysqli_fetch_array($resultUser);

			$query_admin = "SELECT * FROM users WHERE userName = '$username' AND userPassword='$password' AND userType='2'";
			$resultAdmin = mysqli_query($con, $query_admin);
			$row1 = mysqli_fetch_array($resultAdmin);

				if(mysqli_num_rows($resultUser) > 0) {
					//user login
					$_SESSION['user'] = $row['userName'];
					$_SESSION['userID'] = $row['userID'];
					$_SESSION['userPermission'] = $row['userPermission'];
					$_SESSION['success'] ="User You are logged in";
					header('location:../view/home.php'); 
				}elseif (mysqli_num_rows($resultAdmin) > 0) {
					//Admin login
					$_SESSION['admin'] = $row1['userName'];
					$_SESSION['userID'] = $row1['userID'];
					$_SESSION['userPermission'] = $row1['userPermission'];
					$_SESSION['success'] ="Admin You are logged in";
					header('location:../view/adminView.php'); 
				}else{
					array_push($errors, "Wrong username/Password combination");	
				}
		}
	}

//return user array from their id
function getUserById($id)
{
	global $con,$user;
	$query = "SELECT * FROM users WHERE id=".$id;
	$result = mysqli_query($con, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

//escape string
function e($val)
{
	global $con;
	return mysqli_real_escape_string($con, trim($val));
}

function display_error()
{
	global $errors;

	if(count($errors) > 0)
	{
		echo '<div class="error">';
		foreach($errors as $error)
		{
			echo $error .'<br>';
		}
		echo '</div>';
	}
}