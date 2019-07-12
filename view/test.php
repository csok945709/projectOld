<?php   
    include '../config/dbconnect.php'; 
    include '../include/header.php'; 

    // if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
    // {
    //     $_SESSION['loginMsg'] = 'Sorry, You should login first before register the course';
    //     header("Location: ../view/loginview.php");
    // }

    
?>

<div id="paypal-button">
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
                    paypal.Button.render({
    
                        env: 'sandbox', // Or 'sandbox'
    
                        client: {
                            // sandbox id
                            sandbox:    'AZ_2DK0P5kCtIu24a2jZuDDVRKLs2WndyuCCrbV-ql6X8pi_X-YSws74ggcic5MqvInSXr9s4Xy0vGxl'
                        },
    
                        commit: true, // Show a 'Pay Now' button
    
                        payment: function(data, actions) {
                            return actions.payment.create({
                                payment: {
                                    transactions: [
                                        {
                                            // data that you want to be noted
                                            amount: { total: '<?php echo $_SESSION['total']; ?>', currency: 'MYR' },
                                            invoice_number: '<?php echo $_SESSION['invoice']; ?>'
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




<!-- My paypal (old) -->

<span id="cwppButton"></span>
<script src='https://www.paypalobjects.com/js/external/connect/api.js'></script>
<script>
paypal.use( ['login'], function (login) {
  login.render ({
    "appid":"ARcXEh3LWKrX5qlM_u927SKlEIhV3lArG1gL_mMnxAGqGI8VtLWCBZRo1VJOulf94bRlbp1QNyympJzP",
    "scopes":"openid",
    "containerid":"cwppButton",
    "responseType":"code",
    "locale":"en-us",
    "buttonShape":"rectangle",
    "buttonSize":"lg",
    "fullPage":"true",
    "returnurl":"http://localhost/project/view/coursePaymentSuccess.php"
  });
});
</script>'