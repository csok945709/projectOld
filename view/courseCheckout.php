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
                        $_SESSION['courseID'] = $row ['courseID'];  
                        $_SESSION['courseName'] = $row ['courseName'];
                        $_SESSION['coursePrice'] = $row ['coursePrice'];
            ?>     
        <div class="col-md-3">      
            <div class="list-group">
                <h2 style="color:#337ab7;">Course Detail</h2>
                <img src="../assets/images/courses/<?php echo $row['courseImg'] ?>" class="img-responsive" style="width:90%;height:200px"> 
                <p style="margin-left:5%;font-size:20px;color:#337ab7;"><strong><?php echo $row['courseName'] ?></strong></p>
                <!-- PayPall Button -->
                <div style="text-align:center;" id="paypal-button"></div>
                    <a href="../view/courseView.php" class="btn btn-info" style="width:90%;margin-top:5px;">Back to Main Page</a> 
            </div>
        </div>
        <div class="col-md-9">
            <h2 style="text-align:center;color:#337ab7">Course Description</h2>
            <div class="row filter_data form-group shadow-textarea" style="padding-bottom:5%">
                <textarea class="form-control z-depth-1" style="border: 1px solid #ba68c8;" cols="30" rows="19" readonly><?php echo $row['courseDescription'] ?></textarea>
            </div>

            <h2 style="text-align:center;color:#337ab7">Rating and Comment</h2>
        </div>
            <?php }}?>  
    </div>
</div>

<div style="width:100%;text-align:center;position:relative;bottom:0px">
<?php include_once '../include/footer.php';?>
</div>


    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        
                    paypal.Button.render({
                        
                        

                        env: 'sandbox', // Or 'sandbox'
    
                        client: {
                            // sandbox id
                            sandbox:    'ARcXEh3LWKrX5qlM_u927SKlEIhV3lArG1gL_mMnxAGqGI8VtLWCBZRo1VJOulf94bRlbp1QNyympJzP'
                        },
    
                        commit: true, // Show a 'Pay Now' button
    
                        payment: function(data, actions) {
                            return actions.payment.create({
                                payment: {
                                    transactions: [
                                        {
                                            // data that you want to be noted
                                            amount: { total: '<?php echo $_SESSION['coursePrice']; ?>', currency: 'MYR' },
                                            invoice_number: '<?php echo $_SESSION['courseName']; ?>'
                                        }
                                    ]
                                }
                            });
                        },
    
                        onAuthorize: function(data, actions) {
                            return actions.payment.execute().then(function(payment) {
                                window.alert('Payment Complete!');
                                
                                // The payment is complete!
                                // You can now show a confirmation message to the customer
                            });
                        }
    
                    }, '#paypal-button');
                </script>