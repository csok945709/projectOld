<?php
include("../config/dbconnect.php");
include_once("../include/header.php");
include("../component/checkLogin.php");
include_once("../include/adminNavbar.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
{
	header("Location: index.php");
}
?> 


    <div class="content">
        <!-- Include Left Panel -->
        <?php include_once("../include/adminLeftPanel/adminUserPanel.php"); ?>
        
        <!-- Right Panel -->
        <!-- Right Panel -->
        <div class="col-md-8">
            <div class="panel panel-default col-lg-offset-1">
                <div class="panel-heading">
                    <h2 class="panel-title" style="font-size:20px;font-weight:600;text-align:center;">User Information</h2>
                </div>
                <div class="panel-body">
                    <table id="userInfo" class="display">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
<?php $query=mysqli_query($con,"SELECT * FROM users WHERE userType = '1' ");
while($row=mysqli_fetch_array($query))
{  ?>
                            <tr>
                               <td></td>
                               <td><?php echo $row['userName']; ?></td>
                               <td><?php echo substr($row['userEmail'],0, 20); ?></td>
                               <td><?php if ($row['userStatus'] == 1) {
                                   echo 'Active';
                                    }else {
                                        echo 'Inactive';
                                    } ?></td>
                               <td><button type="button"class="btn btn-primary">View More</button> &nbsp; 
                                    <button type="button" class="btn btn-danger">Ban User</button></td>
                               
                            </tr>
<?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   



<div style="width:100%;text-align:center;position:absolute;bottom:0px">
<?php include_once '../include/footer.php';?>
</div>



<script>
    $(document).ready(function() {
    var t = $('#userInfo').DataTable( {
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
