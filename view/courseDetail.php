<?php   
    include '../config/dbconnect.php'; 
    include '../include/header.php'; 
    include '../include/navbar.php'; 

    // if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
    // {
    //     $_SESSION['loginMsg'] = 'Sorry, You should login first before register the course';
    //     header("Location: ../view/loginview.php");
    // }

    
?>
<div class="container" style="padding-top:10px;width:100%">
    <div class="row">       
    <?php  
                    if(isset($_GET["courseID"]))
                    {
                        $query=mysqli_query($con,"SELECT * FROM courses where courseID ='$_GET[courseID]'");
                        while($row=mysqli_fetch_array($query)){    
                ?>     
        <div class="col-md-3">      
            <div class="list-group">
                <h2 style="color:#337ab7">Course Detail</h2>
                <img src="../assets/images/courses/<?php echo $row['courseImg'] ?>" class="img-responsive" style="width:90%;height:200px"> 
                <p style="margin-left:5%;font-size:20px;color:#337ab7;"><strong><a href="#"><?php echo $row['courseName'] ?></a></strong></p>
                <a href="../view/courseCheckout.php?courseID=<?php echo $row['courseID'] ?>" class="btn btn-danger" style="width:90%">Register Now</a>
                <a href="../view/courseView.php" class="btn btn-warning" style="margin-top:5px;width:90%">Back to Main Page</a> 
            </div>
        </div>  
                 
        <div class="col-md-9">
            <h2 style="text-align:center;color:#337ab7 ">Course Description</h2>
            <div class="row filter_data form-group shadow-textarea" style="padding-bottom:10%">
                <textarea class="form-control z-depth-1" style="border: 1px solid #ba68c8;" cols="30" rows="20" readonly><?php echo $row['courseDescription'] ?></textarea>
            </div>
                <h2 style="text-align:center;color:#337ab7">Rating and Comment</h2>

            
        </div>
        <?php }}?>  
    </div>
    
</div>


<style>
#loading
{
 text-align:center; 
 background: url('loader.gif') no-repeat center; 
 height: 150px;
}
</style>

<div style="width:100%;text-align:center;position:relative;bottom:0px">
<?php include_once '../include/footer.php';?>
</div>