<?php
include 'db_connect.php';
require("backendheader.php");
?>
<!-- Page Heading -->
<h1 class="ml-3"><i class="fas fa-utensils 5x pr-3"></i>Item</h1>

<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-10">
    		<h6 class="m-0 font-weight-bold text-primary">Item List</h6>
    	</div>
    	<div class=" col-md-2">
    	 <a href="item_new.php" class="btn btn-secondary"><i class="fas fa-plus"></i>Add New</a>
    	</div>
    </div>
	</div>
 
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Photo</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          
        </tfoot>
        <tbody>
          <?php
          $sql = "SELECT items.*, categories.name as cname FROM items INNER JOIN categories ON categories.id=items.category_id";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchAll();
          $i = 1;
          foreach($rows as $item)
          {
            $id = $item['id'];
            $name= $item['name'];
            $cname= $item['cname'];
            $price= $item['price'];
            $photo= $item['photo'];
            $description= $item['description'];

          
          ?>
          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $name ?></td>
            <td><?php echo $cname ?></td>
            <td><?php echo $price ?></td>
            <td><img src="<?php echo $photo ?>" width="90px" height="80px"></td>
            <td><?php echo $description ?></td>
            <td><a href="item_detail.php?id=<?php echo $id?>" class="btn btn-primary"><i class="fas fa-eye"></i> Detail</a>

               <a href="item_edit.php?id=<?php echo $id?>" class="btn btn-warning btnedit"><i class="fas fa-edit"></i> Edit</a>

              	<a href="item_delete.php?id=<?php echo $id?>" class="btn btn-danger" onclick="return confirm('Are you sure want delete?')"><i class="fas fa-trash-alt"></i> Delete</a>
          		</td>
              
            
          </tr>
          <?php } ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
require("backendfooter.php");
?>