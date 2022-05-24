<?php
require_once 'sesija.php';

$id = $_POST['viesbucioid'];
$pavadinimas = $_POST['pavadinimas'];
$kryptis_is = $_POST['kryptis_is'];
$kryptis_i = $_POST['kryptis_i'];
$atvykimo_data_nepakeista = $_POST['atvykimo_data'];
$isvykimo_data_nepakeista = $_POST['isvykimo_data'];
$atvykimo_data = explode(" ",$atvykimo_data_nepakeista)[0];
$isvykimo_data = explode(" ",$isvykimo_data_nepakeista)[0];
$zvaigzdutes = $_POST['zvaigzdutes'];
$maitinimas = $_POST['maitinimas'];
$vieta = $_POST['vieta'];
$tema = $_POST['tema'];
$kaina = $_POST['kaina'];
$aprasymas = $_POST['aprasymas'];

$sql = "UPDATE viesbuciai SET pavadinimas = '".$pavadinimas."', kryptis_is = '".$kryptis_is."', kryptis_i = '".$kryptis_i."', atvykimo_data = '".$atvykimo_data."', isvykimo_data = '".$isvykimo_data."', zvaigzdutes = '".$zvaigzdutes."' ,maitinimas = '".$maitinimas."',vieta ='".$vieta."',tema ='".$tema."',kaina ='".$kaina."' ,aprasymas = '".$aprasymas."'
WHERE viesbucioid = '".$id."'";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;

}



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>-- Dive In Exploring -- Administratorius</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="stilius.css" rel="stylesheet">
	
  </head>
  <body>
  
  <div class="container border rounded mt-3">

	<a class="text-decoration-none link-secondary mb-3" href="Admin_viesbuciai.php">Atgal</a>
	<span class="d-flex justify-content-center fw-bold mb-3">Viešbučio redagavimas</span>

	<form action="" method="POST">
		<?php echo '<input hidden name="viesbucioid" value="'.$id.'"/>  '; ?>
		
		<?php echo '<input value="'.$pavadinimas.'" type="text" class="form-control mb-3" placeholder="Pavadinimas" name="pavadinimas"/>';  ?> 
		
		<?php echo '<input value="'.$kryptis_is.'" type="text" class="form-control mb-3" placeholder="Kryptis iš" name="kryptis_is"/>';  ?> 
		
		<?php echo '<input value="'.$kryptis_i.'" type="text" class="form-control mb-3" placeholder="Kryptis į" name="kryptis_i"/>'; ?>
		
		<?php echo '<input value="'.$atvykimo_data.'" type="date" class="form-control mb-3" placeholder="Atvykimo_data" name="atvykimo_data"/>'; ?>
		
		<?php echo '<input value="'.$isvykimo_data.'" type="date" class="form-control mb-3" placeholder="Išvykimo_data" name="isvykimo_data"/>'; ?>
		
		<?php echo '<input value="'.$zvaigzdutes.'" type="number" class="form-control mb-3" placeholder="Žvaigždutės" min="1" max="5" name="zvaigzdutes"/>'; ?>
		
		<?php echo '<input value="'.$maitinimas.'" type="text" class="form-control mb-3" placeholder="Maitinimas" name="maitinimas"/>'; ?>
		
		<?php echo '<input value="'.$vieta.'" type="text" class="form-control mb-3" placeholder="Viešbučio vieta" name="vieta"/>'; ?>
		
		<?php echo '<input value="'.$tema.'" type="text" class="form-control mb-3" placeholder="Viešbučio tema" name="tema"/>'; ?>
		
		<?php echo '<input value="'.$kaina.'" type="number" class="form-control mb-3" placeholder="Kaina" min="0" step="0.01" name="kaina"/>'; ?>
		
		<?php echo '<textarea type="text" wrap="hard" cols="20" rows="5" class="form-control mb-3 ivedimoDydis" placeholder="Aprašymas" name="aprasymas"> '.$aprasymas.'</textarea>'; ?>

		<div class="col d-flex justify-content-end">
			<button class="btn btn-outline-secondary" type='submit'> Išsaugoti </button>
		</div>
	</form>
  </div>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>