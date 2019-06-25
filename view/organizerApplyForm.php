<?php
include_once("../include/header.php");
include("../component/checkLogin.php");
include_once("../include/userNavbar.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
{
	header("Location: loginview.php");
}else {
	if ($_SESSION['userPermission'] === '1'){
		header("Location: createCourseView.php");
	}
}
?> 

<div class="content">
		<!-- Include Left Panel -->
        <?php include_once("../include/userLeftPanel/userCoursePanel.php"); ?>
        
        <!-- Main Content-->
        <div class="col-md-6">
        <div class="alert alert-danger col-lg-offset-1" >
            <strong>Sorry You don have permission to create course!</strong> Let's apply organizer request form first.
        </div>
            <div class="panel panel-default col-lg-offset-1">
                <div class="panel-heading">
                    <h2 class="panel-title" style="font-size:20px;font-weight:600;text-align:center;">Request as Organizer</h2>
                </div>
                    <div class="panel-body">	
                        <form class="form-horizontal" action="../component/createCourse.php" method="POST" name="createBtn">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseName">Organizer Name:</label>
                            <div class="col-sm-8">
                                <input type="text" name="courseName" class="form-control" placeholder="Enter Course Name" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseDescription">Organizer Description:</label>
                            <div class="col-sm-8">
                                <textarea name="courseDescription" rows="10" cols="30" class="form-control" placeholder="Enter Course Description" autofocus="" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="coursePrice">Organizer Price:</label>
                            <div class="col-sm-8">
                                <input type="text" name="coursePrice" class="form-control" placeholder="Enter Course Price" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseVenue">Organizer Venue:</label>
                            <div class="col-sm-8">
                                <input type="text" name="courseVenue" class="form-control" placeholder="Enter Course Venue" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseDate">Organizer Date:</label>
                            <div class="col-sm-8">
                                <input type="date" name="courseDate" class="form-control" placeholder="Enter Course Date" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseTime">Organizer Time:</label>
                            <div class="col-sm-8">
                                <input type="time" name="courseTime" class="form-control" placeholder="Enter Course Time" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseImg">Organizer Image:</label>
                            <div class="col-sm-8">
                                <input type="file" name="courseImg" class="form-control" placeholder="Upload Course Image" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseCategory">Organizer Category:</label>
                            <div class="col-sm-8">
                            <input type="text" name="courseCategory" class="form-control" placeholder="Enter Course Category" autofocus="" required="">
                                <!-- <select name="courseCategory" class="form-control">
                                    <option value="">Select one Category</option>
                                    <option value="Development">Development</option>
                                    <option value="Speech">Speech</option>  
                                    <option value="Sharing">Sharing</option>
                                </select> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="courseLanguage">Organizer Language:</label>
                            <div class="col-sm-8">
                            <input type="text" name="courseLanguage" class="form-control" placeholder="Enter Course Language" autofocus="" required="">
                            <!-- <select name="courseLanguage" class="form-control" required>
                                    <option value="">Select one Language</option>
                                    <option value="English">English</option>
                                    <option value="Mandarin">Mandarin</option>  
                                    <option value="Others">Others</option>
                                </select> -->
                            </div>
                        </div>
                            <!-- Insert status in db     -->
                            <input type="hidden" name="courseStatus" value="1">
                            <input type="hidden" name="createdBy" value="<?php echo $_SESSION['userID'] ?>">

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10" style="margin:15px 170px;">
                                <button type="submit" class="btn btn-default" name="">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<div style="width:100%;text-align:center;position:absolute;bottom:0px">
<?php include_once '../include/footer.php';?>
</div>


