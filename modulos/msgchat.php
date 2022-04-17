<?php
$name=$_SESSION['user'];
$message = isset($_GET["message"]) ? $_GET["message"] : "";
file_put_contents("text.txt", $message);
$tt = "SELECT * FROM `user01`";
$query = mysqli_query($conn,$tt);
	if($query)
	{
		header('Location: home.php');
	}
?>