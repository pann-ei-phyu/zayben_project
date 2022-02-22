<?php
include 'db_connect.php';
require("backendheader.php");
?>
<!-- Page Heading -->
<h1 class="ml-3"><i class="fas fa-users 5x pr-3"></i>Customers</h1>

<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-10">
    		<h6 class="m-0 font-weight-bold text-primary">customer Lists</h6>
    	</div>
    	<div class=" col-md-2">
    	 <a href="register.php" class="btn btn-secondary"><i class="fas fa-plus"></i>Add New</a>
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
            <th>Photo</th>
            <th>Email</th>
            <th>Password</th>
            <!--  -->
            <th>Phone</th>
            <th>Address</th>
            <th>Role</th>
            <th></th>
          </tr>
        </thead>
        <tfoot>
          
        </tfoot>
        <tbody>
          <?php
          $sql = "SELECT * FROM users";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchAll();
          $i = 1;
          foreach($rows as $user)
          {
            $id = $user['id'];
            $name= $user['name'];
            $email= $user['email'];
            $password= $user['password'];
            $phone= $user['phone'];
            $address= $user['address'];
            $photo= $user['photo'];
            $role= $user['role'];

          
          ?>
          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $name ?></td>
            <td><img src="<?php echo $photo ?>" width="90px" height="80px"></td>
            <td><?php echo $email ?></td>
            <td><?php echo $password ?></td>
            <td><?php echo $phone ?></td>
            <td><?php echo $address ?></td>
            <td><?php echo $role ?></td>

            <!--
             
            -->
            <td><a href="customer_detail.php?id=<?php echo $id?>" class="btn btn-primary"><i class="fas fa-eye"></i> Detail</a>

               <!-- <a href="item_edit.php?id=<?php echo $id?>" class="btn btn-warning btnedit"><i class="fas fa-edit"></i> Edit</a> -->
                
              	<a href="customer_delete.php?id=<?php echo $id?>" class="btn btn-danger" onclick="return confirm('Are you sure want delete?')"><i class="fas fa-trash-alt"></i> Delete</a>
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