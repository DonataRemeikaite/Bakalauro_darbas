<?php
require_once 'sesija.php';

$viesbucio_id = $_GET['viesbucioid'];

$sql = "SELECT * FROM viesbuciai WHERE viesbucioid = '".$viesbucio_id."'";
$ats = $conn->query($sql);
$rez = $ats->fetch_assoc();

if(($_SESSION['tipas']) == 'admin'){
	
	$sql2 = "DELETE FROM viesbuciai WHERE viesbucioid = '".$viesbucio_id."'";
	$conn->query($sql2);
	header("location: Admin_viesbuciai.php");
	}
else{
	header("location: index.php");
}
	
$conn->close();
?>