<?php
require_once 'sesija.php';

$id = $_POST['skrydzioid'];
$kryptis_is = $_POST['kryptis_is'];
$kryptis_i = $_POST['kryptis_i'];
$kompanija = $_POST['kompanija'];
$isvykimo_data = $_POST['isvykimo_data'];
$grizimo_data = $_POST['grizimo_data'];
$isvykimo_kaina = $_POST['isvykimo_kaina'];
$grizimo_kaina = $_POST['grizimo_kaina'];
$galutine_kaina = $_POST['galutine_kaina'];


$sql = "UPDATE skrydziai SET kryptis_is = '".$kryptis_is."', kryptis_i = '".$kryptis_i."', isvykimo_data = '".$isvykimo_data."', grizimo_data = '".$grizimo_data."', isvykimo_kaina = '".$isvykimo_kaina."', grizimo_kaina = '".$grizimo_kaina."', galutine_kaina = '".$galutine_kaina."'
WHERE skrydzioid = '".$id."'";

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

	<a class="text-decoration-none link-secondary mb-3" href="Admin_skrydziai.php">Atgal</a>
	<span class="d-flex justify-content-center fw-bold mb-3">Skrydžio redagavimas</span>

	<form action="" method="POST">
		<?php echo '<input hidden name="skrydzioid" value="'.$id.'"/>  '; ?>
				
		<?php echo '<input value="'.$kryptis_is.'" type="text" class="form-control mb-3" placeholder="Kryptis iš" name="kryptis_is"/>';  ?> 
		
		<?php echo '<input value="'.$kryptis_i.'" type="text" class="form-control mb-3" placeholder="Kryptis į" name="kryptis_i"/>'; ?>
		
		<?php echo '<input value="'.$kompanija.'" type="text" class="form-control mb-3" placeholder="Kompanija" name="kompanija"/>';  ?> 
		
		<?php echo '<input value="'.$isvykimo_data.'" type="datetime-local" class="form-control mb-3" placeholder="Išvykimo data" name="isvykimo_data"/>'; ?>
		
		<?php echo '<input value="'.$grizimo_data.'" type="datetime-local" class="form-control mb-3" placeholder="Grįžimo data" name="grizimo_data"/>'; ?>
		
		<?php echo '<input value="'.$isvykimo_kaina.'" type="number" min="0" step="0.01" class="form-control mb-3" placeholder="Išvykimo kaina" name="isvykimo_kaina"/>'; ?>
		
		<?php echo '<input value="'.$grizimo_kaina.'" type="number" min="0" step="0.01" class="form-control mb-3" placeholder="Grįžimo kaina" name="grizimo_kaina"/>'; ?>

		<?php echo '<input value="'.$galutine_kaina.'" type="number" min="0" step="0.01" class="form-control mb-3" placeholder="Galutinė kaina" name="galutine_kaina"/>'; ?>
		
		<div class="col d-flex justify-content-end">
			<button class="btn btn-outline-secondary" type='submit'> Išsaugoti </button>
		</div>
	</form>
  </div>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>