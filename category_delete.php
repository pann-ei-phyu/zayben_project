<?php
include 'db_connect.php';
$id = $_GET['id'];

$sql = 'DELETE FROM categories WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
if ($stmt->rowCount()) {
 	header("location:categorylists.php");
 }
 else
 {
 	echo "Error";
 }




?>