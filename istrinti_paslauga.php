<?php
require_once 'sesija.php';

$paslaugos_id = $_GET['paslaugosid'];

$sql = "SELECT * FROM paslaugos WHERE paslaugosid = '".$paslaugos_id."'";
$ats = $conn->query($sql);
$rez = $ats->fetch_assoc();

if(($_SESSION['tipas']) == 'admin'){
	
	$sql2 = "DELETE FROM paslaugos WHERE paslaugosid = '".$paslaugos_id."'";
	$conn->query($sql2);
	header("location: Admin_paslaugos.php");
	}
else{
	header("location: index.php");
}
	
$conn->close();
?>