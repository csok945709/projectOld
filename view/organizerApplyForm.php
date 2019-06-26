<?php
include_once("../include/header.php");
include("../component/checkLogin.php");
include_once("../include/userNavbar.php");
// include_once("../component/organizerApply.php");

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
                        <form class="form-horizontal" action="../component/organizerApply.php" method="POST" name="organizerApplySubmit">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="organizerName">Organizer Name:</label>
                            <div class="col-sm-8">
                                <input type="text" name="organizerName" class="form-control" placeholder="Enter Organizer Name" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="organizerExperience">Organizer Experience Description:</label>
                            <div class="col-sm-8">
                                <textarea name="organizerExperience" rows="10" cols="30" class="form-control" placeholder="Enter Your Exeperience" autofocus="" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="organizerPhoneNum">Organizer Phone Number:</label>
                            <div class="col-sm-8">
                                <input type="text" name="organizerPhoneNum" class="form-control" placeholder="Enter Phone Number" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="organizerImg">Organizer Image:</label>
                            <div class="col-sm-8">
                                <input type="file" name="organizerImg" class="form-control" placeholder="Upload Organizer Image" autofocus="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="organizerCategory">Organizer Category:</label>
                            <div class="col-sm-8">
                                <select name="organizerCategory" class="form-control">
                                    <option value="">Select Category</option>
                                    <option value="Development">Development</option>
                                    <option value="Speech">Speech</option>  
                                    <option value="Sharing">Sharing</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="organizerLanguage">Organizer Language:</label>
                            <div class="col-sm-8">
                            <select name="organizerLanguage" class="form-control" required>
                                    <option value="">Select Language</option>
                                    <option value="English">English</option>
                                    <option value="Mandarin">Mandarin</option>  
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                            <!-- Insert status in db     -->
                            <input type="hidden" name="organizerStatus" value="0">
                            <input type="hidden" name="userID" value="<?php echo $_SESSION['userID'] ?>">

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10" style="margin:15px 170px;">
                                <button type="submit" class="btn btn-default" name="organizerApplySubmit">Submit</button>
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


