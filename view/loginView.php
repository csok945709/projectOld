<?php 
include_once("../config/dbconnect.php");
include_once("../include/header.php");
include_once("../include/navbar.php");
include("../component/checkLogin.php");


if (!empty($_SESSION['loginMsg'])) {
   echo '<div class="container" style="width:100%;margin-top:5%;text-align:center;font-size:18px"><p class="alert alert-danger"><strong>'.$_SESSION['loginMsg'].'</strong></p></div>';
   unset($_SESSION['loginMsg']);
}
?>


<style type="text/css">
    .send-button{
background: #54C7C3;
width:100%;
font-weight: 600;
color:#fff;
padding: 8px 25px;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
.g-button{
color: #fff !important;
border: 1px solid #EA4335;
background: #ea4335 !important;
width:100%;
font-weight: 600;
color:#fff;
padding: 8px 25px;
}
.my-input{
box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
cursor: text;
padding: 8px 10px;
transition: border .1s linear;
}
.header-title{
margin: 5rem 0;
}
h1{
font-size: 31px;
line-height: 40px;
font-weight: 600;
color:#4c5357;
}
h2{
color: #5e8396;
font-size: 21px;
line-height: 32px;
font-weight: 400;
}
.login-or {
position: relative;
color: #aaa;
margin-top: 10px;
margin-bottom: 10px;
padding-top: 10px;
padding-bottom: 10px;
}
.span-or {
display: block;
position: absolute;
left: 50%;
top: -2px;
margin-left: -25px;
background-color: #fff;
width: 50px;
text-align: center;
}
.hr-or {
height: 1px;
margin-top: 0px !important;
margin-bottom: 0px !important;
}
@media screen and (max-width:480px){
h1{
font-size: 26px;
}
h2{
font-size: 20px;
}
}    
</style>


<div class="container" style="margin-top:60px">
      <div class="text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
               Login
            </h1>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="loginView.php" method="post" name="login">
               <?php echo display_error();?><br/>
                  <div class="form-group">
                     <input type="text" name="username"  class="form-control my-input" id="name" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                     <input type="password" min="0" name="password" id="password"  class="form-control my-input" placeholder="Password" required>
                  </div>
                  <div>
                  <p class="small mt-3"><input type="checkbox"> Remember me 
                  </p>
                  </div>
                  <div class="text-center ">
                     <button type="submit" name="login" class=" btn btn-block send-button tx-tfm">Login In</button>
                  </div>
                  <div class="col-md-12 ">
                     <div class="login-or">
                        <hr class="hr-or">
                        <span class="span-or">or</span>
                     </div>
                  </div>
                  <div style="text-align:center">
                    <p>Dont't have an account! <a href="registerView.php">Sign Up Here</a></p>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
<div style="width:100%;text-align:center;position:relative;bottom:0px">
<?php include_once '../include/footer.php';?>
</div>