<?php
include("../config/dbconnect.php");
include_once("../include/header.php");
include("../component/checkLogin.php");
include_once("../include/userNavbar.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
{
	header("Location: index.php");
}
?> 


    <div class="container-fluid">
        <!-- Include Left Panel -->
        <?php include_once("../include/userLeftPanel/userCoursePanel.php"); ?>
        
        <!-- Right Panel -->
        <div class="col-md-6">
            <div class="panel panel-default col-lg-offset-1">
                <div class="panel-heading">
                    <h2 class="panel-title" style="font-size:20px;font-weight:600;text-align:center;">Create course Here</h2>
                </div>
                    <div class="panel-body">
                       Here Is Course Main Manage Page
                </div>
            </div>
        </div>
    </div>
   



<div style="width:100%;text-align:center;position:absolute;bottom:0px">
<?php include_once '../include/footer.php';?>
</div>


