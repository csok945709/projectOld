<?php   
    include '../config/dbconnect.php'; 
    include '../include/header.php'; 
    include '../include/navbar.php'; 

    // if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
    // {
    //     header("Location: loginview.php");
    // }
?>

 <div class="container" style="padding-top:70px;width:100%">
        <div class="row">
         <br />
         <br />
    <div class="col-md-3">      
    <div class="list-group">
     <h3>Course Category</h3>
                    <?php

                    $query = "SELECT DISTINCT courseCategory FROM courses WHERE courseStatus = '1' ORDER BY courseCategory ASC";
                    $result = $con->query($query);
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector courseCategory" value="<?php echo $row['courseCategory']; ?>" >
                         <?php echo $row['courseCategory']; ?></label>
                    </div>
                <?php } ?>
                </div>
                <br/>
    <div class="list-group">
     <h3>Course Language</h3>
     <?php
                    $query = "SELECT DISTINCT courseLanguage FROM courses WHERE courseStatus = '1' ORDER BY courseLanguage DESC";
                    $result = $con->query($query);
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector courseLanguage" value="<?php echo $row['courseLanguage']; ?>"  > <?php echo $row['courseLanguage']; ?></label>
                    </div>
                    <?php
                    }
                    ?> 
                </div>
    </div> 
            <div class="col-md-9">
            <h2 style="text-align:center">Online Courses</h2>
                <div class="row filter_data" style="padding-bottom:20%">
                </div>
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

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = '../component/fetchData.php';
        var courseCategory = get_filter('courseCategory');
        var courseLanguage = get_filter('courseLanguage');
        $.ajax({
            url:"../component/fetchData.php",
            method:"POST",
            data:{action:action,courseCategory:courseCategory, courseLanguage:courseLanguage},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });


});
</script>
