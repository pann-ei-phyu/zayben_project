<?php
	 
	require 'db_connect.php';
	session_start();
	date_default_timezone_set('Asia/Rangoon');
	

	$cartarr = $_POST['cartobj'];
	$note = $_POST['note'];

	$voucherno= strtotime(date("h:i:s"));
	$orderdate= date('Y-m-d');
	$userid=$_SESSION['loginuser']['id'];
	$status ="Order";
	$total = 0;
	//var_dump($userid);

	foreach($cartarr as $key=>$value)
	{
		$id = $value['id'];
		$qty = $value['qty'];
		$price = $value['price'];
		$subtotal = $qty * $price;
		$total+=$subtotal;

		$orderdetail_sql = "INSERT INTO orderdetails (voucherno,item_id,qty) VALUES(:voucherno,:id,:qty)";
		$orderdetail_stmt=$pdo->prepare($orderdetail_sql);
		$orderdetail_stmt->bindParam(':voucherno',$voucherno);
		$orderdetail_stmt->bindParam(':id',$id);
		$orderdetail_stmt->bindParam(':qty',$qty);
		$orderdetail_stmt->execute();

	}

	$order_sql = "INSERT INTO orders (orderdate,voucherno,total,note,user_id,status) VALUES(:orderdate,:voucherno,:total,:note,:user_id,:status)";
		$order_stmt=$pdo->prepare($order_sql);
		$order_stmt->bindParam(':orderdate',$orderdate);
		$order_stmt->bindParam(':voucherno',$voucherno);
		$order_stmt->bindParam(':total',$total);
		$order_stmt->bindParam(':note',$note);
		$order_stmt->bindParam(':user_id',$userid);
		$order_stmt->bindParam(':status',$status);
		$order_stmt->execute();

		//var_dump($order_sql);


 ?>