 <?php
include 'backendheader.php';
include 'db_connect.php';
?>

<!-- Page Heading -->
 <h1 class="ml-3"><i class="fas fa-hamburger 5x pr-3"></i>Category</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
<h3 class="h3 mb-2 ml-3 text-primary font-weight-bold">Add New Category</h3>
</div>
<div class="card-body">
<form action="category_add.php" method="post">
  <div class="form-group row">
    <div class="col-md-10">
      <input type="text" name="category_name" placeholder="Enter Category Name" class="form-control ml-3">
    </div>
    <div class="col-md-2">
      <input type="submit" name="save" class="btn btn-secondary" value="Save Changes">
    </div>
  </div>
</form>
</div>
</div>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-primary">Category List</h3>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tfoot>
          <!-- <tr>
            <th>No</th>
            <th>Name</th>
            <th>Action</th>
          </tr> -->
        </tfoot>
        <tbody>
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
          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $name ?></td>
            <td><a href="item_edit.php" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
              <a href="category_delete.php?id=<?php echo $id?>" class="btn btn-danger" onclick="return confirm('Are you sure want delete?')"><i class="fas fa-trash-alt"></i> Delete</a></td>
            
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