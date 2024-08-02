<?php
session_start();
include "koneksix.php";
$username = $_POST["username"];
$password = $_POST["password"];

	$sql = "select * from register where email='".$username."' and password='".$password."' limit 1";
	$hasil = mysqli_query ($con,$sql);
	$jumlah = mysqli_num_rows($hasil);


	if ($jumlah>0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["username"]=$row["nama"];
	
		header("Location:adminx/");
	}else {
		header("location:index.php");
	}
?>