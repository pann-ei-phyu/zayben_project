<?php 
include 'db_connect.php';
session_start();



$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$oldphoto = $_POST['oldphoto'];
$newphoto = $_FILES['newphoto'];
$role = "member";

if($newphoto['name']){
	$file_path = 'images/user/'.$newphoto['name'];
	move_uploaded_file($newphoto['tmp_name'], $file_path);
}
else
{
	$file_path = $oldphoto;
}

$sql = "UPDATE users SET name=:name,photo=:photo,email=:email,phone=:phone,address=:address WHERE id=:id";

$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':photo',$file_path);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':address',$address);

$stmt->execute();

if($stmt->rowCount())
{
	header("location:profile.php");
}


?>