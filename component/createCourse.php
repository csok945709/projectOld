<?php 
include_once("../include/header.php");

//create reward
if (isset($_POST['createBtn'])) {
   
	$courseName  = $_POST["courseName"];
    $courseDescription = $_POST["courseDescription"];
    $coursePrice = $_POST["coursePrice"];
    $courseVenue = $_POST["courseVenue"];
    $courseDate = $_POST["courseDate"];
    $courseTime = $_POST["courseTime"];
    $courseImg  = $_POST["courseImg"];
    $courseCategory = $_POST["courseCategory"];
    $courseLanguage = $_POST["courseLanguage"];
    $courseStatus = $_POST["courseStatus"];
    $createdBy = $_POST['createdBy'];

    $query = "INSERT INTO courses (courseName,courseDescription,coursePrice,courseVenue,courseDate,courseTime,courseImg,courseCategory,courseLanguage,courseStatus,createdBy) VALUES
    ('$courseName','$courseDescription','$coursePrice','$courseVenue','$courseDate','$courseTime','$courseImg','$courseCategory','$courseLanguage','$courseStatus','$createdBy')";
    
    $sql = mysqli_query($con, $query);

   
}


?>