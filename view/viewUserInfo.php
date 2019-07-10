<?php
include("../config/dbconnect.php");
include_once("../include/header.php");
include("../component/checkLogin.php");
include_once("../include/adminNavbar.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
{
	header("Location: index.php");
}

?> 

    <div class="container-fluid">
        <!-- Include Left Panel -->
        <?php include_once("../include/adminLeftPanel/adminUserPanel.php"); ?>
        
        
    </div>
   



<div style="width:100%;text-align:center;position:relative;bottom:0px">
    <?php  include_once '../include/footer.php';?>
</div>

