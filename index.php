
<?php
  include 'db_connect.php';
  require("frontendheader.php");
  
?>

<div class="row">
  
     
      <div class="col-lg-3">

        <h1 class="my-4">Today Special</h1>
        <div class="list-group">
          <?php
          $sql = "SELECT name FROM categories";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchAll();
          $i = 1;
          foreach($rows as $category)
          {
            
            $name= $category['name'];

          ?>
          <a href="#" class="list-group-item"><?php echo $category['name']?></a>
          <?php } ?>
        </div>
     

      </div>
       
<!-- items -->
    <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block " src="images/fh3.jpg"  width="900px" height="350px" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block" src="images/fh4.jpg"  width="900px" height="350px" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block" src="images/fh5.jpg"  width="900px" height="350px" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
          <?php
          $sql = "SELECT * FROM items";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchAll();
          $i = 1;
          foreach($rows as $item)
          {
            $id = $item['id'];
            $name= $item['name'];
            $price= $item['price'];
            $photo= $item['photo'];
            $description= $item['description'];

          
          ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="<?php echo $photo ?>" alt="" width="200" height="200"></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?php echo $name ?></a>
                </h4>
                
                <p class="card-text"><?php echo $description ?></p>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-4">
                    <i class="fas fa-tags"></i><?php echo $price ?>
                  </div>
                  <div class="col-md-8">
                    <!-- <a href="add_to_cart.php?id=<?php $id?>" class="btn btn-secondary"><i class="fas fa-cart-plus"></i>Add to Cart</a> -->
                    <?php if (!isset($_SESSION['loginuser'])) { ?>

                        <button class="btn btn-secondary disabled"><i class="fas fa-cart-plus"></i>Add to Cart</button> 

                    <?php } else { ?>

                        <button class="btn btn-secondary atc" data-id="<?php echo $id ?>" data-photo="<?php echo $photo ?>" data-name="<?php echo $name ?>" data-price="<?php echo $price ?>"><i class="fas fa-cart-plus"></i>Add to Cart</button> 
                     <?php } ?> 
                    
                  </div>
                </div>

                <!-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small> -->
              </div>
            </div>
          </div>

          <?php } ?>

          
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->
</div>
    
<?php
require("frontendfooter.php");
?>