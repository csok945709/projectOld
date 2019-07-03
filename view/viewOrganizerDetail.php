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
        <div class="col-md-8">
            <div class="panel panel-default col-lg-offset-1">
                <div class="panel-heading">
                    <h2 class="panel-title" style="font-size:20px;font-weight:600;text-align:center;">Organizer Request Detail</h2>
                </div>
                <div class="panel-body">
                <?php  
                    if(isset($_GET["organizerID"]))
                    {
                        $query=mysqli_query($con,"SELECT * FROM organizer where organizerID ='$_GET[organizerID]'");
                        while($row=mysqli_fetch_array($query)){    
                ?>
                <div width="200px">
                    <div>
                    <img src="../assets/images/courses/<?php echo $row['organizerImg'] ?>" class="img-responsive" style="float:right;margin-right:30%;width:182px;height:200px;margin-bottom:20px">
                    </div>
                    <h4>Name: <?php echo $row ['organizerName'];?></h4>
                    <h4>Phone Number: <?php echo $row ['organizerPhoneNum'];?></h4>
                    <h4>Course Category: <?php echo $row ['organizerCategory'];?></h4>
                    <h4>Course Language: <?php echo $row ['organizerLanguage'];?></h4>
                    <textarea cols="30" style="width:70%;" class="form-control z-depth-1" rows="10" readonly><?php echo $row ['organizerExperience'];?></textarea>
                <div style="margin-top:10px">
                    <a class="btn btn-primary" href="../component/insertOraganizer.php?organizerStatus=Approve&organizerID=<?php echo $row ['organizerID'];?>" onclick="return confirm('Are you sure?')">Approve</a>
                    <button class="btn btn-danger">Reject</button>
                    <a class="btn btn-warning" href="../view/viewOrganizerRequest.php">Return Request Page</a>
                </div>
                </div>
                <?php }}
                    ?>
                </div>
            </div>
        </div>
    </div>
   



<div style="width:100%;text-align:center;position:absolute;bottom:0px">
    <?php  include_once '../include/footer.php';?>
</div>


<script>
    $(document).ready( function () {
        $('#courseRequest').DataTable();
    } );
</script>
