<?php 
include_once("../include/header.php");
include_once("../include/navbar.php");
include("../component/checkLogin.php");
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
}    </style>


<div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
               Check out — it’s free!
            </h1>
            <h2 class="wv-heading--subtitle">
               Welcome to everyone who loves in IT. Come and join our big family ...
            </h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="registerView.php" method="POST" name="register_btn">
               <?php echo display_error(); ?>
                  <div class="form-group">
                     <input type="text" name="username"  class="form-control my-input" id="name" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                     <input type="email" name="email"  class="form-control my-input" id="email" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                     <input type="password" name="password_1" id="password_1"  class="form-control my-input" placeholder="Password" required> 
                  </div>
                  <div class="form-group">
                     <input type="password" name="password_2" id="password_2"  class="form-control my-input" placeholder="Re-Enter Password" required>
                  </div>
                  <div>
                  <p class="small mt-3"><input type="checkbox" required> I accept the <a href="#" class="ps-hero__content__link">Terms of Use</a> & <a href="#">Privacy Policy</a>.
                  </p>
                  </div>
                  <div class="text-center ">
                     <button type="submit" name="register_btn" class="btn btn-block send-button tx-tfm">Create Your Free Account</button>
                  </div>
                  <div class="col-md-12 ">
                     <div class="login-or">
                        <hr class="hr-or">
                        <span class="span-or">or</span>
                     </div>
                  </div>
                  <div class="form-group">
                     <a class="btn btn-block g-button" href="#">
                     <i class="fa fa-google"></i> Sign up with Google
                     </a>
                  </div>
                  <div style="text-align:center">
                    <p>Already have an account? <a href="#">Login Here</a></p>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <?php 
include_once("../include/footer.php");
?>