<?php
include_once("../include/header.php");
include("../component/checkLogin.php");
if (empty($_SESSION['user'])) {
    header('location: ../view/loginView.php');
}
?>
<div class="bg-white border-bottom shadow-sm">
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
	<h5 class="my-0 font-weight-normal" style="font-weight:600 !important;"><a href="index.php" style="text-decoration: none;">IT Knowledege Sharing</a></h5>
		<ul class="nav navbar-nav" style="width:60%;display:inline-block;float:none;">
			<li style="display:inline"><a class="p-2 text-dark" href="#">Seek Consultant</a></li>
			<li style="display:inline"><a class="p-2 text-dark" href="#">Online Courses</a></li>
			<li style="display:inline"><a class="p-2 text-dark" href="#">Knowledge</a></li>
			<li style="display:inline"><a class="p-2 text-dark" href="#">IT Blog</a></li>
			<li style="display:inline"><a class="p-2 text-dark" href="#">Q & A Forum</a></li>
   		</ul>
		<ul class="nav navbar-nav navbar-right" style="margin:5px 5px;">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:20px;font-weight:600;color:gray;text-decoration:none">
    		<img src="images/admin.jpg" style="width:40px;height:auto" class="profile-image img-circle"> 
			<?php echo $_SESSION['user']; ?> <b class="caret"></b></a>
    	<ul class="dropdown-menu">
        <li>
			<a href="#"><i class="fa fa-cog"></i> Account</a>
		</li><br/>
        <li class="divider"></li>
        <li>
			<a href="logout.php?logout"><i class="fa fa-sign-out"></i> Sign-out</a>
		</li>
    </ul>
	</div>
</nav>
</div>
<div class="content" style="padding-top:50px;">
		<!-- notification message -->
		<?php if(isset($_SESSION['success'])) : ?>
			<div class="error success">
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
        <?php endif ?>
        
        <!-- logged in user information -->
		<div class="profile_info">
			<div>
			<?php if(isset($_SESSION['user'])) : ?>

				<small>

	<br>

				</small>
			<?php endif ?>
			</div>
		</div>

<?
include_once("../include/footer.php");
?>