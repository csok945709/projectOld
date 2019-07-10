<?php
include("../config/dbconnect.php");
include_once("../include/header.php");
include("../component/checkLogin.php");
include_once("../include/userNavbar.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
{
	header("Location: index.php");
}


if(isset($_POST['update'])){

    $courseName=$_POST['courseName'];
    $coursePrice=$_POST['coursePrice'];
    $courseVenue=$_POST['courseVenue'];
    $courseDate=$_POST['courseDate'];
    $courseTime=$_POST['courseTime'];
    $courseCategory=$_POST['courseCategory'];
    $courseLanguage=$_POST['courseLanguage'];
    $courseDescription=$_POST['courseDescription'];
    $userID=$_SESSION['userID'];

    $query = ("UPDATE courses set courseName='$courseName',courseDescription='$courseDescription',coursePrice='$coursePrice',courseVenue='$courseVenue',
    courseDate='$courseDate',courseTime='$courseTime',courseImg='$courseImg',courseCategory='$courseCategory' where courseID='$userID'") or die("Error in update Query. The error was : " . mysql_error());

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
                <form action="#" method="POST">
                <div class="panel-body">
                <?php  
                    if(isset($_GET["userID"]))
                    {
                        $query=mysqli_query($con,"SELECT * FROM courses where createdBy ='$_GET[userID]'");
                        while($row=mysqli_fetch_array($query)){    
                ?>
                <div width="200px">
                    <div  style="float:right;margin-right:30%;margin-bottom:20px">
                    <img src="../assets/images/courses/<?php echo $row['courseImg'] ?>" style="width:182px;height:200px;" class="img-responsive">
                    <label>Edit Course Image</label>
                    <input type="file" name="courseImg">
                    </div>
                    <label>Name:</label>
                    <input type="text" class="form-control" style="width:45%;"  name="courseName" value="<?php echo $row ['courseName'];?>">
                    <label>Course Price:</label>
                    <input type="text" class="form-control" style="width:45%;"  name="coursePrice" value="<?php echo $row ['coursePrice'];?>">
                    <label>Course Venue: </label>
                    <input type="text" class="form-control" style="width:45%;"  name="courseVenue" value="<?php echo $row ['courseVenue'];?>">
                    <label>Course Start Date:</label>
                    <input type="text" class="form-control" style="width:45%;"  name="courseDate" value=" <?php echo $row ['courseDate'];?>">
                    <label>Course Start Time: </label>
                    <input type="text" class="form-control" style="width:45%;"  name="courseTime" value="<?php echo $row ['courseTime'];?>">
                    <label>Course Category: </label>
                    <input type="text" class="form-control" style="width:45%;"  name="courseCategory" value="<?php echo $row ['courseCategory'];?>">
                    <label>Course Language: </label>
                    <input type="text" class="form-control" style="width:45%;"  name="courseLanguage" value="<?php echo $row ['courseLanguage'];?>">
                   
                    <label>Course Description</label>
                    <textarea cols="30" style="width:70%;" class="form-control z-depth-1" rows="10" name="courseDescription" ><?php echo $row ['courseDescription'];?></textarea>

                    <label>Course Status: <?php if ($row ['courseStatus'] == 1) {
                                            echo 'Active';
                                        }else {
                                            echo 'Unactive';
                                        }?>
                    </label>
                    <input type="hidden" value="<?php echo $_SESSION ['userID'];?>">
                <div style="margin-top:10px">
                    <input type="submit" class="btn btn-primary" name="update">
                    <a class="btn btn-warning" href="../view/viewMyCourse.php">Return Main Page</a>
                </div>
                </div>
                <?php }}
                    ?>
                </div>
                </form>
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
