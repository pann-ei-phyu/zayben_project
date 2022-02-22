<?php 
include 'db_connect.php';
require('backendheader.php');
?>
<div class="card">
<div class="container my-5" id="login_form">
	<h1 class="text-center mb-4">Add New Item</h1>
	<form action="item_add.php" method="post" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="profile" class="col-sm-2 col-form-label">Item Profile</label>
			<div class="col-sm-10">
				<input type="file" name="image" id="profile" class="form-control-file" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Item Name</label>
			<div class="col-sm-10">
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Item Name" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="price" class="col-sm-2 col-form-label">Price</label>
			<div class="col-sm-10">
				<input type="text" name="price" id="price" class="form-control" placeholder="Enter Item Price" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="category" class="col-sm-2 col-form-label">Category</label>
			
			<div class="col-sm-10">
				<select class="custom-select form-control" name="categoryid">
					<?php 
					$sql = "SELECT * FROM categories";
					$stmt = $pdo->prepare($sql);
			        $stmt->execute();
			        $rows = $stmt->fetchAll();
			        $i = 1;
			        foreach($rows as $category)
			        {
			           $id = $category['id'];
			           $name= $category['name'];
          
					?>
			  		<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
			  		<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="address" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-10">
				<textarea id="description" class="form-control" name="description" placeholder="Description"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="offset-md-10 col-md-2">
				<button type="submit" class="btn btn-primary">
				Save Changes</button>
			</div>


		</div>
		
	</form>
</div>
</div>

<?php 
require('backendfooter.php'); 
?>