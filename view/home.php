<?php
include_once("../include/header.php");
include("../component/checkLogin.php");
if (empty($_SESSION['user'])) {
    header('location: ../view/loginView.php');
}
?>

<div id="navCss" class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal" style="font-weight:600 !important;"><a href="index.php" style="text-decoration: none;">IT Knowledege Sharing</a></h5>
  <nav class="my-2 my-md-0 mr-md-3" style="font-weight:600 !important;">
    <a class="p-2 text-dark" href="#">Seek Consultant</a>
    <a class="p-2 text-dark" href="#">Online Courses</a>
    <a class="p-2 text-dark" href="#">Knowledge</a>
    <a class="p-2 text-dark" href="#">IT Blog</a>
    <a class="p-2 text-dark" href="#">Q & A Forum</a>
  
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