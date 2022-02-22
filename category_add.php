<?php 
 include 'db_connect.php';
 //$id = $_POST['id'];
 $name = $_POST['category_name'];
 

 $sql = "INSERT INTO categories(name) VALUES(:name)";

 $stmt = $pdo->prepare($sql);
 $stmt->bindParam(':name',$name);
 

 $stmt->execute();

 if ($stmt->rowCount()) {
 	header("location:categorylists.php");
 }
 else
 {
 	echo "Error";
 }


?>