<?php   
    include '../config/dbconnect.php'; 
    include '../include/header.php'; 
    include '../include/navbar.php'; 

    if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
    {
        $_SESSION['loginMsg'] = 'Sorry, You should login first before register the course';
        header("Location: ../view/loginview.php");
    }

    if(!isset($_SESSION['courseID']))
    {   
        $_SESSION['loginMsg'] = 'Sorry, You payment fail';
        header("Location: ../view/courseDetail.php");
    }


?>
<div class="container" style="padding-top:10px;width:100%">
    <div class="row">       
    
         
            HI here is success page     
        <div class="col-md-9">
            <h2 style="text-align:center;color:#337ab7">Course Description</h2>
            <div class="row filter_data form-group shadow-textarea" style="padding-bottom:5%">
            </div>

            <h2 style="text-align:center;color:#337ab7">Rating and Comment</h2>
        </div>
       
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

