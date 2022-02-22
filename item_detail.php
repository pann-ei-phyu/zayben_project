<?php 
require('backendheader.php');
include 'db_connect.php';

//get the id from address bar
$id = $_GET['id'];
//draw out the query form the db


$sql = "SELECT items.*, categories.name as cname FROM items INNER JOIN categories ON categories.id=items.category_id WHERE items.id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<h1 class="text-center mb-4">Item Detail</h1> 
<div class="container my-5" id="edit_form">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-10">
					<h3 class="text-danger"><?php echo $row['name'] ?></h3>
				</div>
				<div class="col-md-2 pl-5">
					<a href="item_list.php" class="btn btn-secondary"><i class="fas fa-angle-double-left"></i>Go Back</a>
				</div>
			</div>
			
		</div>
		<div class="card-body">
			<div class="row">
		<div class="col-md-6">
			<img src="<?php echo $row['photo'] ?>" width="500" height="300">
		</div>
		<div class="col-md-6">
			<p>
				<?php echo $row['cname'] ?>
				
			</p>
			<p>
				<?php echo $row['price'] ?>
			</p>
		</div>
		
	</div>
		</div>
	</div>
	
	
	
</div>

<?php 
require('backendfooter.php'); 
?>