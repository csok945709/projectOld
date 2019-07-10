<?php
include("../config/dbconnect.php");
include_once("../include/header.php");
include_once("../include/userNavbar.php");


$query_status =mysqli_query($con,"SELECT * FROM organizer") ;
while($orgData=mysqli_fetch_array($query_status)){



if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
{
    header("Location: loginview.php");
    
}else{
    
	if($orgData['userID'] !== $_SESSION['userID'] ){
        header("Location: ../view/organizerApplyForm.php");
    }else{
        $query_status =mysqli_query($con,"SELECT * FROM organizer WHERE userID ='".$_SESSION['userID']."' ") ;
        while($row=mysqli_fetch_array($query_status)){
        if ($row['organizerStatus'] === '0'){
            header("Location: ../view/organizerApplyForm.php");
        }else{
           
        }}
    }}
}

if (!empty($_SESSION['msg'])) {
    echo '<div class="container" style="width:46%;float:right;margin-right:25%;"><p class="alert alert-success"><strong>The Course '.$_SESSION['msg'].'</strong></p></div>';
    unset($_SESSION['msg']);
}

?> 


<div class="container-fluid">
		<!-- Include Left Panel -->
        <?php include_once("../include/userLeftPanel/userCoursePanel.php"); ?>
        
        <!-- Main Content-->
        <div class="col-md-6">
            <div class="panel panel-default col-lg-offset-1">
                <div class="panel-heading">
                    <h2 class="panel-title" style="font-size:20px;font-weight:600;text-align:center;">Create course Here</h2>
                </div>
                    <div class="panel-body">	
                        <form class="form-horizontal" action="../component/createCourse.php" method="POST" name="createBtn">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseName">Course Name:</label>
                            <div class="col-sm-8">
                                <input type="text" name="courseName" class="form-control" placeholder="Enter Course Name" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseDescription">Course Description:</label>
                            <div class="col-sm-8">
                                <textarea name="courseDescription" rows="10" cols="30" class="form-control" placeholder="Enter Course Description" autofocus="" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="coursePrice">Course Price:</label>
                            <div class="col-sm-8">
                                <input type="text" name="coursePrice" class="form-control" placeholder="Enter Course Price" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseVenue">Course Venue:</label>
                            <div class="col-sm-8">
                                <input type="text" name="courseVenue" class="form-control" placeholder="Enter Course Venue" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseDate">Course Date:</label>
                            <div class="col-sm-8">
                                <input type="date" name="courseDate" class="form-control" placeholder="Enter Course Date" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseTime">Course Time:</label>
                            <div class="col-sm-8">
                                <input type="time" name="courseTime" class="form-control" placeholder="Enter Course Time" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseImg">Course Image:</label>
                            <div class="col-sm-8">
                                <input type="file" name="courseImg" class="form-control" placeholder="Upload Course Image" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseCategory">Course Category:</label>
                            <div class="col-sm-8">
                            <!-- <input type="text" name="courseCategory" class="form-control" placeholder="Enter Course Category" autofocus="" required=""> -->
                                <select name="courseCategory" class="form-control">
                                    <option value="">Select one Category</option>
                                    <option value="Development">Development</option>
                                    <option value="Network & Security">Network & Security</option>  
                                    <option value="Operating Systems">Operating Systems</option>
                                    <option value="Hardware">Hardware</option>
                                    <option value="IT Certification">IT Certification</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseLanguage">Course Language:</label>
                            <div class="col-sm-8">
                            <!-- <input type="text" name="courseLanguage" class="form-control" placeholder="Enter Course Language" autofocus="" required=""> -->
                            <select name="courseLanguage" class="form-control" required>
                                    <option value="">Select one Language</option>
                                    <option value="English">English</option>
                                    <option value="Mandarin">Mandarin</option>  
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                            <!-- Insert status in db     -->
                            <input type="hidden" name="courseStatus" value="1">
                            <input type="hidden" name="createdBy" value="<?php echo $_SESSION['userID'] ?>">

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10" style="margin:15px 170px;">
                                <button type="submit" class="btn btn-default" name="createBtn">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<div style="width:100%;text-align:center;position:relative;bottom:0px">
<?php include_once '../include/footer.php';?>
</div>


