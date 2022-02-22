<?php
  include 'db_connect.php';
  require("frontendheader.php");
?>
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-12">
				<h1 class="my-5 text-center">Your Shopping Cart</h1>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p><marquee behavior="alternate">Thank you for your shopping with us.</marquee></p>
				
			</div>
		</div>
		<div class="row my-8">
			<div class="col-md-9">
				
			</div>	
			<div class="col-md-3">
				<a href="index.php" class="btn btn-outline-success"><i class="fas fa-cart-plus"></i>Continue Shopping</a>
			</div>
		</div>
			<hr>
		<div class="row">

			<div class="col-md-12">
				<table class="table" id="mytable">
					<thead id="thead">
						<th>No</th>
						<th></th>
						<th>Menu</th>
						<th>Qty</th>
						<th>Total Price</th>
						<th>Total</th>
						<th></th>
					</thead>

					<tbody id="tbody">

					</tbody>
					<tfoot id="tfoot">
					
						
					
					</tfoot>
				</table>
				<div class="row">
							<div class="col-md-8 my-4">
								<textarea class="form-control" id="notes" placeholder="comment"></textarea>
							</div>
							<div class="col-md-4">
								<button class="btn btn-success my-5 orderbtn" id="check"><i class="fas fa-cash-register "></i> check out</button>
							</div>
						</div>
				<hr>
				
				
			</div>
		</div>
	</div>
	
<?php
require("frontendfooter.php");
?>
