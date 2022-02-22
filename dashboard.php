<?php 
require 'backendheader.php';
require 'db_connect.php';
$todaydate= date("Y-m-d");
 ?>

 <div class="container-fluid">

          <!-- Page Heading -->
          <h2 class="ml-3"><i class="fas fa-fw fa-tachometer-alt 5x pr-3" ></i>Dashboard</h2>

          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-tachometer-alt 5x pr-3" ></i>Dashboard</h1>
          </div> -->
          <?php 
            $sql1="SELECT count(*) FROM orders WHERE orders.orderdate= '$todaydate'";
            $stmt = $pdo->prepare($sql1);
            $stmt->execute();
            $countrows = $stmt->fetchColumn();
         ?>

          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">TODAY ORDER</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countrows ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-concierge-bell fa-2x text-gray-300">
                      </i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php 
            $sql2="SELECT count(*) FROM users INNER JOIN orders ON orders.user_id=users.id WHERE orders.orderdate= '$todaydate'";
            $user = $pdo->prepare($sql2);
            $user->execute();
            $customerrows = $user->fetchColumn();
            ?>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-success text-uppercase mb-1">CUSTOMER LIST</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $customerrows ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php 
            $sql3="SELECT count(*) FROM orders";
            $order = $pdo->prepare($sql3);
            $order->execute();
            $itemrows = $order->fetchColumn();
            ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-info text-uppercase mb-1">ITEM LIST</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $itemrows ?></div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-utensils fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php 
            $sql4="SELECT count(*) FROM categories";
            $category = $pdo->prepare($sql4);
            $category->execute();
            $categoryrows = $category->fetchColumn();
            ?>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-warning text-uppercase mb-1">CATEGORY LIST</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $categoryrows ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hamburger fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

           

        </div>
        <div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-10">
    		<h4 class="m-0 font-weight-bold text-danger">Today Order Lists</h4>
    	</div>
    </div>
	</div>
 
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Voucher No</th>
            <th>Date</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          
        </tfoot>
        <tbody>
          <?php
          //$todays_date=date("d/m/Y", strtotime("today"));
          $sql = "SELECT * FROM orders WHERE orderdate= DATE(NOW()) ";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchAll();
          $i = 1;
          foreach($rows as $order)
          {
            $id = $order['id'];
            $voucherno= $order['voucherno'];
            $orderdate= $order['orderdate'];
            $total= $order['total'];
            //$note= $order['note'];
            $status= $order['status'];

          
          ?>
          <tr>
            <td><?php echo $i++ ?></td>
            <td><a href="order_detail.php?id=<?php echo $id?>"><?php echo $voucherno ?></a></td>
            <td><?php echo $orderdate ?></td>
            <td><?php echo $total ?></td>
            <!-- <td><img src="<?php echo $photo ?>" width="90px" height="80px"></td> -->
            <td class="text-danger"><?php echo $status ?></td>
            <td><a href="confirm.php?id=<?php echo $id?>" class="btn btn-success"><i class="fas fa-check-double"></i> Confirm</a>

               <a href="delivery.php?id=<?php echo $id?>" class="btn btn-info btnedit"><i class="fas fa-truck"></i> Delivery</a>

              	
          		</td>
              
            
          </tr>
          <?php } ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
        <!-- /.container-fluid -->
        <?php 
require 'backendfooter.php';
 ?>