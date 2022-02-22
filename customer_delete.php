<?php
include 'db_connect.php';
$id = $_GET['id'];

$sql = 'DELETE FROM users WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
if ($stmt->rowCount()) {
 	header("location:customer_list.php");
 }
 else
 {
 	echo "Error";
 }




?>