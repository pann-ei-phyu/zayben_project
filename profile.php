<?php 
require 'frontendheader.php';
require 'db_connect.php';
 ?>
<div class="container">
	<div class="row my-5">
		<div class="col-md-4">
			<img src="<?php echo $_SESSION['loginuser']['photo']; ?>" width="300px" height="300px" class="rounded-circle ">
		</div>
		<div class="col-md-8 py-5">
			<h3 class="mb-5"><?php echo $_SESSION['loginuser']['name'];?></h3>
			<p><?php echo $_SESSION['loginuser']['address'];?></p>
			<p><?php echo $_SESSION['loginuser']['phone'];?></p>
			<p><?php echo $_SESSION['loginuser']['email'];?></p> 
			<div class="row">
				<div class="col-md-4">
					<a href="edit_profile.php?id=<?php echo $_SESSION['loginuser']['id']; ?>" class="btn btn-primary">Profile Upload</a>
				</div>
				<div class="col-md-8">
					<a href="changepassword.php?id=<?php echo $_SESSION['loginuser']['id']; ?> " class="btn btn-info">Change Password</a>
				</div>
			</div>

		</div>
	</div>
	
</div>
 


 <?php 
require 'frontendfooter.php';
 ?>