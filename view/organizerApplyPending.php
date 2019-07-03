<?php
include_once("../include/header.php");
include("../component/checkLogin.php");
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

    <div class="content">
        <!-- Include Left Panel -->
        <?php include_once("../include/userLeftPanel/userCoursePanel.php"); ?>
        
        <!-- Right Panel -->
        <div class="col-md-8">
            <div class="panel panel-default col-lg-offset-1">
                <div class="panel-heading">
                    <h2 class="panel-title" style="font-size:20px;font-weight:600;text-align:center;">Request Status</h2>
                </div>
                <div class="panel-body">
                    <table id="courseRequest" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Experience</th>
                                <th>Phone Number</th>
                                <th>Category</th>
                                <th>Language</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
<?php $query=mysqli_query($con,"SELECT * FROM organizer WHERE userID ='".$_SESSION['userID']."' ");
while($row=mysqli_fetch_array($query))
{  ?>
                            <tr>
                                <td></td>
                               <td><?php echo $row['organizerName']; ?></td>
                               <td><?php echo substr($row['organizerExperience'],0, 20); ?></td>
                               <td><?php echo $row['organizerPhoneNum']; ?></td>
                               <td><?php echo $row['organizerCategory']; ?></td>
                               <td><?php echo $row['organizerLanguage']; ?></td>
                               <td><?php if ($row['organizerStatus'] === '0') {
                                        echo 'Pending';
                                    }else {
                                        echo 'Approve';
                                    }
                                ?></td>
                               <td>
                                    <button type="button"class="btn btn-primary" onclick="location.href = 'viewOrganizerDetail.php?organizerID=<?php echo $row['organizerID'] ?>';">View More</button> &nbsp; 
                                    <button type="button"class="btn btn-default">Edit</button> &nbsp; 
                                    <button type="button" class="btn btn-danger">Cancel Request</button>
                               </td>
                               
                            </tr>
<?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   



<div style="width:100%;text-align:center;position:absolute;bottom:0px">
    <?php  include_once '../include/footer.php';?>
</div>


<script>
  
$(document).ready(function() {
    var t = $('#courseRequest').DataTable( {
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
