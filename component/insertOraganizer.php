<?php 
include("../config/dbconnect.php");
include_once("../include/header.php");

if($_GET["organizerStatus"] === "Approve")
{
    $organizerID  = $_GET["organizerID"];
    $query = "UPDATE organizer SET organizerStatus = '1' WHERE organizerID = $organizerID";
    $sql = mysqli_query($con, $query);

    $_SESSION['msg']="Approve Success";
    header("Location: ../view/viewOrganizerRequest.php");

}


?>
