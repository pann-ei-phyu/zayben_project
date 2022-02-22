<?php 
require 'frontendheader.php';
require 'db_connect.php';

 ?>

<h1 class="my-5 text-center">Change Password</h1>
 <div class="cotainer">
 	<div class="row">
 		<div class="offset-md-3 col-md-6">
		 	<?php if(isset($_SESSION['login_reject']))
		                  { 
		                  ?>
		      <div class="alert alert-danger alert-dismissible fade show"   role="alert">
		          <strong><?php echo $_SESSION['login_reject']; ?></strong> 
		          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		          </button>
		      </div>
		      <?php unset($_SESSION['login_reject']);} ?>
		  </div>
		</div>
 	<form action="updatepassword.php" method="post">
	 	<div class="row my-5">
	 		<div class="offset-md-3 col-md-6">
	 			<input type="text" name="currentpassword" class="form-control" placeholder="password">
	 		</div>
	 	</div>
	 	<div class="row my-5" >
	 		<div class="offset-md-3 col-md-6">
	 			<input type="text" name="changepassword" class="form-control" placeholder="change-password">
	 		</div>
	 	</div>
	 	<div class="row my-5" >
	 		<div class="offset-md-3 col-md-6">
	 			<input type="text" name="retypepassword" class="form-control" placeholder="retype-password">
	 		</div>
	 	</div>
	 	<div class="row my-5" >
	 		<div class="offset-md-3 col-md-6">
	 			<input type="submit" class="btn btn-primary" name="change" value="Change">
	 		</div>
	 	</div>
	 </form>
 </div>



<?php
require 'frontendfooter.php';

 ?>