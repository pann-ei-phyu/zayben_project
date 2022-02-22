<?php 
 include 'db_connect.php';

 

 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $phone = $_POST['phone'];
 $address = $_POST['address'];
 $role = "member";
 $image = $_FILES['image'];
 $source_dir = "images/user/";
 $file_path = $source_dir.$image['name'];
 move_uploaded_file($image['tmp_name'],$file_path);


 $sql = "INSERT INTO users(name,photo,email,password,phone,address,role) VALUES(:name,:photo,:email,:password,:phone,:address,:role)";

 $stmt = $pdo->prepare($sql);
 $stmt->bindParam(':name',$name);
 $stmt->bindParam(':photo',$file_path);
 $stmt->bindParam(':email',$email);
 $stmt->bindParam(':password',$password);
 $stmt->bindParam(':phone',$phone);
 $stmt->bindParam(':address',$address);
 $stmt->bindParam(':role',$role);

 $stmt->execute();

 $selectsql = "SELECT * FROM users WHERE email=:email";
$stmt = $pdo->prepare($selectsql);
$stmt->bindParam(":email",$email);
$stmt->execute();

session_start();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$_SESSION['loginuser'] = $row;
	header("location:index.php");
	


?>







 