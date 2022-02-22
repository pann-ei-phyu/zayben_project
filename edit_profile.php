<?php 
require('frontendheader.php');
include 'db_connect.php';


$id = $_SESSION['loginuser']['id'];


?>

<div class="container my-5" id="edit_form">
	<h1 class="text-center mb-4">Edit Profile</h1>
	<form action="update_profile.php" method="post" enctype="multipart/form-data">

		<input type="hidden" name="id" value="<?php echo $_SESSION['loginuser']['id'] ?>">

		<input type="hidden" name="oldphoto" value="<?php echo $_SESSION['loginuser']['photo']?>">
		<div class="form-group row py-3">
			<label for="profile" class="col-sm-2 col-form-label">Profile</label>
			<div class="col-sm-10">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old photo</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false">New photo</a>
				  </li>
				</ul>
				<div class="tab-content my-3" id="myTabContent">
					  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><!-- <input type="file" name="photo" > --><img src="<?php echo $_SESSION['loginuser']['photo'] ?>" width="250px" height="200px"></div>

					  <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab"><input type="file" name="newphoto"></div>
				</div>
			</div>
		</div>
		<div class="form-group row py-3">
			<label for="name" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
				<input type="text" name="name" id="inputName" class="form-control" placeholder="Enter Item Name" value="<?php echo $_SESSION['loginuser']['name'] ?>" required>
			</div>
		</div>
		<div class="form-group row py-3">
			<label for="price" class="col-sm-2 col-form-label">Address</label>
			<div class="col-sm-10">
				<input type="text" name="address" id="address" class="form-control" placeholder="Enter Item Price" value="<?php echo $_SESSION['loginuser']['address'] ?>" required>
			</div>
		</div>
		<div class="form-group row py-3">
			<label for="price" class="col-sm-2 col-form-label">Phone</label>
			<div class="col-sm-10">
				<input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Item Price" value="<?php echo $_SESSION['loginuser']['phone'] ?>" required>
			</div>
		</div>
		<div class="form-group row py-3">
			<label for="price" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input type="text" name="email" id="email" class="form-control" placeholder="Enter Item Price" value="<?php echo $_SESSION['loginuser']['email'] ?>" required>
			</div>
		</div>
		
		
		<div class="row py-3">
			<div class="offset-md-10 col-md-2">
				<input type="submit" class="btn btn-primary" value="Update Changes">
			</div>


		</div>
		
	</form>
</div>

<?php 
require('frontendfooter.php'); 
?>