<?php
include("../config/dbconnect.php");
include_once("../include/header.php");
include_once("../include/adminNavbar.php");
?>

<div class="container-fluid" style="padding-top:50px;">
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

		<div class="container">
			<h1>Here is Admin page</h1>
		</div>
<div style="width:100%;text-align:center;position:relative;bottom:0px">
<?php include_once '../include/footer.php';?>
</div>


