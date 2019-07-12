<?php
include("../config/dbconnect.php");
include_once("../include/header.php");
include_once("../include/userNavbar.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
{
	header("Location: index.php");
}


if (!empty($_SESSION['msg'])) {
    echo '<div class="container" style="width:100%;margin-left:31%;"><p class="alert alert-success"><strong>The organizer'.$_SESSION['msg'].'</strong></p></div>';
    unset($_SESSION['msg']);
}
?> 

    <div class="container-fluid">
        <!-- Include Left Panel -->
        <?php include_once("../include/userLeftPanel/userCoursePanel.php"); ?>
        
        <!-- Right Panel -->
        <div class="col-md-8">
            <div class="panel panel-default col-lg-offset-1">
                <div class="panel-heading">
                    <h2 class="panel-title" style="font-size:20px;font-weight:600;text-align:center;">My Course</h2>
                </div>
                <div class="panel-body">
                    <table id="viewMyCourse" class="display">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Course Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
<?php $query=mysqli_query($con,"SELECT * FROM courses WHERE  createdBy = ".$_SESSION['userID']." & courseStatus = '1'") or die("Error: ".mysqli_error($con));
while($row=mysqli_fetch_array($query))
{  ?>
                            <tr>
                               <td></td>
                               <td><?php echo $row['courseName']; ?></td>
                               <td><?php echo substr($row['courseDescription'],0, 20); ?> ...</td>
                               <td><?php echo $row['coursePrice']; ?></td>
                               <td><?php echo $row['courseVenue']; ?></td>
                               <td><?php echo $row['courseDate']; ?></td>
                               <td><button type="button"class="btn btn-primary" onclick="location.href = 'viewMyCourseDetail.php?userID=<?php echo $_SESSION['userID'] ?>';">View More</button> &nbsp; 
                               <a class="btn btn-warning" href="../view/editMyCourse.php?update&userID=<?php echo $_SESSION['userID'] ?>">Edit</a> &nbsp; 
                                    <button type="button" class="btn btn-danger">Delete</button></td>
                               
                            </tr>
<?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



<div style="width:100%;text-align:center;position:relative;bottom:0px">
    <?php  include_once '../include/footer.php';?>
</div>


<script>
    $(document).ready(function() {
    var t = $('#viewMyCourse').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>
