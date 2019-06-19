<?
include_once("../include/header.php");
if (empty($_SESSION['admin'])) {
    header('location: ../view/loginView.php');
}
?> 
<div class="bg-white shadow-sm">
<nav class="nav navbar">
	<div class="container-fluid">
	<h5 class="my-0 mr-md-auto" style="font-weight:600">
		<a href="index.php" style="font-size:20;text-decoration: none;">IT Knowledege Sharing</a>
	</h5>
		<ul class="nav navbar-nav" style="width:60%;display:inline-block;font-size:16;font-weight:600; !important;">
			<li style="display:inline;margin-right:5px;"><a class="p-2 text-dark" href="">Manage Consultant</a></li>
			<li style="display:inline;margin-right:5px;"><a class="p-2 text-dark" href="../view/courseView.php">Manage Courses</a></li>
			<li style="display:inline;margin-right:5px;"><a class="p-2 text-dark" href="#">Manage Knowledge</a></li>
			<li style="display:inline;margin-right:5px;"><a class="p-2 text-dark" href="#">Manage IT Blog</a></li>
			<li style="display:inline;margin-right:5px;"><a class="p-2 text-dark" href="#">Manage Q & A Forum</a></li>
   		</ul>
		<ul class="nav navbar-nav navbar-right" style="margin:5px 5px;" >
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-weight:600;color:gray;text-decoration:none;position:relative;">
    		<img src="../assets/images/admin.jpg" style="width:40px;height:auto" class="profile-image img-circle"> 
			<?php echo $_SESSION['admin']; ?></a>
    	<ul class="dropdown-menu" style="position:absolute;margin-right:5px;">
        	<li>
				<a href="#"><i class="fa fa-cog"></i> Account</a>
			</li>
        	<li class="divider"></li>
        	<li>
				<a href="../component/logout.php?logout"><i class="fa fa-sign-out"></i> Sign-out</a>
			</li>	
    	</ul>
	</div>
</nav>
</div>