<?php 
include_once("../include/header.php");

//create reward
if (isset($_POST['organizerApplySubmit'])) {
   
	$organizerName  = $_POST["organizerName"];
    $organizerExperience = $_POST["organizerExperience"];
    $organizerPhoneNum = $_POST["organizerPhoneNum"];
    $organizerImg = $_POST["organizerImg"];
    $organizerCategory = $_POST["organizerCategory"];
    $organizerLanguage = $_POST["organizerLanguage"];
    $organizerStatus  = $_POST["organizerStatus"];
    $userID = $_POST["userID"];

    $query = "INSERT INTO organizer (userID, organizerName,organizerExperience,organizerPhoneNum,organizerImg,organizerCategory,organizerLanguage,organizerStatus) VALUES
    ('$userID','$organizerName','$organizerExperience','$organizerPhoneNum','$organizerImg','$organizerCategory','$organizerLanguage','$organizerStatus')";
    
    $sql = mysqli_query($con, $query);
}



?>