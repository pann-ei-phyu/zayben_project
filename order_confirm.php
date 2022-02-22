<?php 
	require 'db_connect.php';
	$id = $_GET['id'];
	$sql = "UPDATE orders SET status = REPLACE(status,'Order','Confirm') WHERE id= '$id'";
	$stmt = $pdo->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount()) {
 		header("location:order_list.php");
 	}
 	else
 	{
 		echo "Error";
 	}

 ?>