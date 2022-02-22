<?php 
include 'db_connect.php';


$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$categoryid = $_POST['categoryid'];
$description = $_POST['description'];
$oldphoto = $_POST['oldphoto'];
$newphoto = $_FILES['newphoto'];

if($newphoto['name']){
	$file_path = 'images/item/'.$newphoto['name'];
	move_uploaded_file($newphoto['tmp_name'], $file_path);
}
else
{
	$file_path = $oldphoto;
}

$sql = "UPDATE items SET name=:name,price=:price,photo=:photo,description=:description,category_id=:categoryid WHERE id=:id";

$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':price',$price);
$stmt->bindParam(':photo',$file_path);
$stmt->bindParam(':description',$description);
$stmt->bindParam(':categoryid',$categoryid);
$stmt->execute();

if($stmt->rowCount())
{
	header("location:item_list.php");
}
else
{
	echo "error";
}

?>