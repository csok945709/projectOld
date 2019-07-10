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
        <div class="col-md-8">
            <div class="panel panel-default col-lg-offset-1">
                <div class="panel-heading">
                    <h2 class="panel-title" style="font-size:20px;font-weight:600;text-align:center;">My Course Detail</h2>
                </div>
                <div class="panel-body">
                <?php  
                    if(isset($_GET["userID"]))
                    {
                        $query=mysqli_query($con,"SELECT * FROM courses where createdBy ='$_GET[userID]'");
                        while($row=mysqli_fetch_array($query)){    
                ?>
                <div width="200px">
                    <div>
                    <img src="../assets/images/courses/<?php echo $row['courseImg'] ?>" class="img-responsive" style="float:right;margin-right:30%;width:182px;height:200px;margin-bottom:20px">
                    </div>
                    <h4>Name: <?php echo $row ['courseName'];?></h4>
                    <h4>Course Price: <?php echo $row ['coursePrice'];?></h4>
                    <h4>Course Venue: <?php echo $row ['courseVenue'];?></h4>
                    <h4>Course Start Date: <?php echo $row ['courseDate'];?></h4>
                    <h4>Course Start Time: <?php echo $row ['courseTime'];?></h4>
                    <h4>Course Category: <?php echo $row ['courseCategory'];?></h4>
                    <h4>Course Language: <?php echo $row ['courseLanguage'];?></h4>
                    <h4>Course Status: <?php if ($row ['courseStatus'] == 1) {
                                            echo 'Active';
                                        }else {
                                            echo 'Unactive';
                                        }?>
                    </h4>
                    <textarea cols="30" style="width:70%;" class="form-control z-depth-1" rows="10" readonly><?php echo $row ['courseDescription'];?></textarea>
                <div style="margin-top:10px">
                    <a class="btn btn-primary" href="../view/editMyCourse.php?update&userID=<?php echo $_SESSION['userID'] ?>">Edit</a>
                    <button class="btn btn-danger">Delete</button>
                    <a class="btn btn-warning" href="../view/viewOrganizerRequest.php">Return Main Page</a>
                </div>
                </div>
                <?php }}
                    ?>
                </div>
            </div>
        </div>
    </div>
   



<div style="width:100%;text-align:center;position:relative;bottom:0px">
    <?php  include_once '../include/footer.php';?>
</div>


<script>
    $(document).ready( function () {
        $('#courseRequest').DataTable();
    } );
</script>
