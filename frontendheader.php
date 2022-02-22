
<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Shop Homepage - Start Bootstrap Template</title>
  <link href="backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="frontend/vendor/jquery/jquery.min.js"></script>
  <!-- Custom styles for this template -->
  <link href="frontend/css/shop-homepage.css" rel="stylesheet">
  
  <script type="text/javascript">
    $(document).ready(function () {

      getData();
      $('#tbody').on('click','.plus',function ()  {
        
        let loStr = localStorage.getItem('foodshop');
          let shopArr = JSON.parse(loStr);
          let id=$(this).data('id');
          let qty=$(this).data('qty');
          qty++;
          shopArr[id].qty = qty;

          localStorage.setItem('foodshop',JSON.stringify(shopArr));
          getData();
        })
      $('#tbody').on('click','.sub',function ()  {
        
        let loStr = localStorage.getItem('foodshop');
          let shopArr = JSON.parse(loStr);
          let id=$(this).data('id');
          let qty=$(this).data('qty');
          qty--;
          shopArr[id].qty = qty;

          localStorage.setItem('foodshop',JSON.stringify(shopArr));
          getData();

          if(qty==0) 
            {
            
            //alert(id);
            let loStr = localStorage.getItem('foodshop');
            if (loStr) {
            let shopArr = JSON.parse(loStr);
        
            shopArr.splice(id,1);

            localStorage.setItem('foodshop',JSON.stringify(shopArr));
            getData();

            }
          }

        })
        
      function getData() {  
        
        
        let loStr= localStorage.getItem('foodshop');
        if (loStr){
          let shopArr = JSON.parse(loStr);
          let tbody='';
          let total_price= 0;
          let j=1;
          let subtotal;
          let tax=0.05;
          let atax;
          let total_amount;
          let tqty=0;
          $.each(shopArr,function (i,v) {
            let id=v.id;
            let name=v.name;
            let price=v.price;
            let qty=v.qty;
            let photo=v.photo;
            
            subtotal=v.price * qty;
            tqty+=qty;
            tbody+= `<tr>
                <td>${j++}</td>
                <td><img src="${photo}" alt="" width="150" height="150"></td>
                <td>${name}</td>
                <td><button class="btn btn-success sub mx-2" data-id="${i}" data-qty="${qty}">-</button>${qty}<button class="btn btn-success plus mx-2" data-id="${i}" data-qty="${qty}">+</button></td>
                <td>${price}</td>
                <td><p id="total">${subtotal}</p></td>
                <td colspan="2"><button class="btn btn-danger rounded-circle btn-sm deletebtn" data-id="${i}">x</button></td>
                </tr>`;
            
            total_price+=subtotal;

            atax= tax * total_price;
            total_amount=atax+total_price;
            // console.log(qty);
            
          })

          
          
          $('#tbody').html(tbody);
          
          let tfoot= `<tr>
                <td colspan="4"></td>
                <td>SubTotal</td>
                <td>${total_price}</td>
                <td></td>
              </tr>
              <tr>
                <td colspan="4"></td>
                <td>Tax</td>
                <td>5%</td>
                <td></td>
              </tr>
              <tr>
                <td colspan="4"></td>
                <td class="text-danger font-weight-bold">Total Amount:</td>
                <td class="text-danger font-weight-bold">${total_amount}</td>
                <td></td>
              </tr>`;
          $('#tfoot').html(tfoot);
          $('.qty').html(tqty);

          $('#mytable').show();
        }else {
          $('#mytable').hide();
        }

      }

      
      
  $('.atc').click(function () {
    let qty=1;
    let id= $(this).data('id');
    let photo= $(this).data('photo');
    let name= $(this).data('name');
    let price= $(this).data('price');
    // let qty= $(this).data('qty');
    //let qty= $(this).data('qty');
    //alert(name + price);
      //alert(id);

        let foodShop={
          id:id,
          photo:photo,
          name:name,
          price:price,
          qty:qty
        };

      //alert(foodShop);



        let loStr = localStorage.getItem('foodshop');
        let shopArr;
            if (loStr==null) {
              shopArr = Array();
              
            }
            else 
            {
              shopArr = JSON.parse(loStr);
              let status=false;
              let subtotal;
              $.each(shopArr,function (i,v) {
              let Id=v.id;
              if (id==Id){
                 v.qty++;
                 status=true;
                 //console.log(shopArr);
                 
              }


            })
            if(status==false){
              shopArr.push(foodShop);
            }
              
          }     

        //console.log(student);
        localStorage.setItem('foodshop',JSON.stringify(shopArr));
        getData();
        
      })

      

      // $('#quantity').keyup(function () {
      //  changePrice();
      //  })
  // $('#check').click(function () { 
  //   let loStr = localStorage.getItem('foodshop');
  //   let shopArr = JSON.parse(loStr);

  //   localStorage.removeItem('foodshop',JSON.stringify(shopArr));
  // })    
      
    
        


  $('#tbody').on('click','.deletebtn',function () {

          let del = confirm ('Are You Sure Delete');
          if(del){
            let id= $(this).data('id');
            //alert(id);
            let loStr = localStorage.getItem('foodshop');
            if (loStr) {
            let shopArr = JSON.parse(loStr);
        
            shopArr.splice(id,1);

            localStorage.setItem('foodshop',JSON.stringify(shopArr));
            getData();


        }
            
      }
    })

  $('#check').on('click',function(){
    let note = $('#notes').val();
    console.log(note);
    let cart = localStorage.getItem('foodshop');
    var cartobj = JSON.parse(cart);
    //var cartarr = cartobj.mycart;
    //console.log(cart);
    
    $.post('storeorder.php',{cartobj: cartobj, note: note},function(response){

       localStorage.clear();
       window.location.href="ordersuccess.php";
    })

  })


}) 

  </script>
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>

          
          <?php if (!isset($_SESSION['loginuser'])) { ?> 
                    <li class="nav-item">
                     <a class="nav-link"> <i class="fas fa-cart-plus"><span class="badge badge-pill badge-light  qty" style="background:white; position:relative; top: -15px; left: -10px;"></span></i></a>
                  </li>
              
                    <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a> 
                    </li> 
                    <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                    </li> 
        
          <?php } else { ?>
                    <li class="nav-item">
                      <a class="nav-link" href="add_to_cart.php"><i class="fas fa-cart-plus"><span class="badge badge-pill badge-light  qty" style="background:white; position:relative; top: -15px; left: -10px;"></span></i></a>
                    </li>

                
                  <li class="nav-item">
                  <span class="nav-link"><?php echo $_SESSION['loginuser']['name'];
                       ?></span>
                   </li>
                  <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo $_SESSION['loginuser']['photo']; ?>" width="50px" height="50px" class="rounded-circle">
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="orderhistory.php">Order History</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
                
              <?php } ?>
          
          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    
      <!-- /.col-lg-3 -->

      

  
