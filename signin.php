<?php 
require 'db_connect.php';
$useremail = $_POST['email'];
$userpassword = $_POST['password'];
// echo $useremail;
// echo $userpassword;

$sql = "SELECT * FROM users WHERE email=:email AND password=:password";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":email",$useremail);
$stmt->bindParam(":password",$userpassword);
$stmt->execute();

session_start();
if($stmt->rowCount()<=0)

{
	if(!isset($_COOKIE['logInCount']))
	{
		$logInCount=1;
	}
	else
	{
		$logInCount= $_COOKIE['logInCount'];
		$logInCount++;
	}
	setcookie('logInCount',$logInCount,time()+100);
	if($logInCount>=3)
	{
		header("location: loginfail.php");
	}
	else
	{
	//invalid email and password
	$_SESSION['login_reject']="Email and Password is not invalid";
	header("location:login.php");
	}
	
}
else
{
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$_SESSION['loginuser'] = $row;
	if ($row['role'] == "admin") {
		header("location: item_list.php");
	}
	else
	{
		header("location:index.php");
	}
}




 ?>