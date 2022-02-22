<?php 
require('backendheader.php');
include 'db_connect.php';

//get the id from address bar
$id = $_GET['id'];
//draw out the query form the db


$sql = "SELECT * FROM items WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container my-5" id="edit_form">
	<h1 class="text-center mb-4">Edit Existing Item</h1>
	<form action="item_update.php" method="post" enctype="multipart/form-data">

		<input type="hidden" name="id" value="<?php echo $row['id'] ?>">

		<input type="hidden" name="oldphoto" value="<?php echo $row['photo']?>">
		<div class="form-group row">
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
					  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><!-- <input type="file" name="photo" > --><img src="<?php echo $row['photo'] ?>" width="200px" height="120px"></div>

					  <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab"><input type="file" name="newphoto">new</div>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Item Name</label>
			<div class="col-sm-10">
				<input type="text" name="name" id="inputName" class="form-control" placeholder="Enter Item Name" value="<?php echo $row['name'] ?>" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="price" class="col-sm-2 col-form-label">Price</label>
			<div class="col-sm-10">
				<input type="text" name="price" id="price" class="form-control" placeholder="Enter Item Price" value="<?php echo $row['price'] ?>" required>
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
			  		<option value="<?php echo $id; ?>"
			  			<?php if($row['category_id']== $id) echo "selected" ?>>
			  			<?php echo $name; ?></option>
			  		<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="address" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-10">
				<textarea id="inputDescription" class="form-control" name="description" placeholder="Description"><?php echo $row['description'] ?></textarea>
			</div>
		</div>
		
		<div class="row">
			<div class="offset-md-10 col-md-2">
				<input type="submit" class="btn btn-success" value="Update Changes">
			</div>


		</div>
		
	</form>
</div>

<?php 
require('backendfooter.php'); 
?>