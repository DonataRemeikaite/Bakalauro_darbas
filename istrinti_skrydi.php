<?php
require_once 'sesija.php';

$skrydzio_id = $_GET['skrydzioid'];

$sql = "SELECT * FROM skrydziai WHERE skrydzioid = '".$skrydzio_id."'";
$ats = $conn->query($sql);
$rez = $ats->fetch_assoc();

if(($_SESSION['tipas']) == 'admin'){
	
	$sql2 = "DELETE FROM skrydziai WHERE skrydzioid = '".$skrydzio_id."'";
	$conn->query($sql2);
	header("location: Admin_skrydziai.php");
	}
else{
	header("location: index.php");
}
	
$conn->close();
?>