<?php
include_once("../include/header.php");
include("../component/checkLogin.php");
include_once("../include/adminNavbar.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
{
	header("Location: index.php");
}


?> 


    <div class="content">
        <!-- Include Left Panel -->
        <?php include_once("../include/adminLeftPanel/adminCoursePanel.php"); ?>
        
        <!-- Right Panel -->
        <div class="col-md-6">
            <div class="panel panel-default col-lg-offset-1">
                <div class="panel-heading">
                    <h2 class="panel-title" style="font-size:20px;font-weight:600;text-align:center;">Organizer Request</h2>
                </div>
                <div class="panel-body">
                    <table id="courseRequest" class="display">
                        <thead>
                            <tr>
                                <th>Column 1</th>
                                <th>Column 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Row 1 Data 1</td>
                                <td>Row 1 Data 2</td>
                            </tr>
                            <tr>
                                <td>Row 2 Data 1</td>
                                <td>Row 2 Data 2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   



<div style="width:100%;text-align:center;position:absolute;bottom:0px">
<?php include_once '../include/footer.php';?>
</div>


<script>
    $(document).ready( function () {
        $('#courseRequest').DataTable();
    } );
</script>