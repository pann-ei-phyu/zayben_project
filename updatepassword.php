<?php 
//require 'frontendheader.php';
require 'db_connect.php';
session_start();

$id = $_SESSION['loginuser']['id'];

//$id = $_POST['id'];

$currentpassword = $_POST['currentpassword'];
$changepassword = $_POST['changepassword'];
$retypepassword =$_POST['retypepassword'];

$selectsql = "SELECT password FROM users WHERE id=:id";

$stmt = $pdo->prepare($selectsql);
$stmt->bindParam(":id",$id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($currentpassword == $row['password'] AND $changepassword == $retypepassword)
{
	$updatesql = "UPDATE users SET password=:password WHERE id=:id";

	$stmt=$pdo->prepare($updatesql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':password',$changepassword);
	$stmt->execute();

	 if($stmt->rowCount())
	 {
		header("location: profile.php");
	 }
	 else
	 {
	 	echo "error";
	 }
}
else
{
	$_SESSION['login_reject']=" Password is not match";
	header("location: changepassword.php");
}



 ?>