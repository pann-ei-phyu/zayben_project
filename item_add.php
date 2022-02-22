<?php 
 include 'db_connect.php';

 $name = $_POST['name'];
 $price = $_POST['price'];
 $categoryid = $_POST['categoryid'];
 $description = $_POST['description'];
 $image = $_FILES['image'];
 $source_dir = "images/item/";
 $file_path = $source_dir.$image['name'];
 move_uploaded_file($image['tmp_name'],$file_path);

 $sql = "INSERT INTO items(name,price,photo,description,category_id) VALUES(:name,:price,:photo,:description,:category_id)";

 $stmt = $pdo->prepare($sql);
 $stmt->bindParam(':name',$name);
 $stmt->bindParam(':price',$price);
 $stmt->bindParam(':description',$description);
 $stmt->bindParam(':photo',$file_path);
 $stmt->bindParam(':category_id',$categoryid);

 $stmt->execute();

 if ($stmt->rowCount()) {
 	header("location:item_list.php");
 }
 else
 {
 	echo "Error";
 }


?>