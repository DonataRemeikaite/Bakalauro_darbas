<?php
require_once 'sesija.php';

$kryptis_is = $_POST['kryptis_is'];
$kryptis_i = $_POST['kryptis_i'];
$kompanija = $_POST['kompanija'];
$isvykimo_data = $_POST['isvykimo_data'];
$grizimo_data = $_POST['grizimo_data'];
$isvykimo_kaina = $_POST['isvykimo_kaina'];
$grizimo_kaina = $_POST['grizimo_kaina'];
$galutine_kaina = $isvykimo_kaina + $grizimo_kaina;
$nuotraukos = $_POST['files'];

 $sql = "INSERT INTO skrydziai (kryptis_is, kryptis_i, kompanija, isvykimo_data, grizimo_data, isvykimo_kaina, grizimo_kaina, galutine_kaina)
VALUES ('$kryptis_is','$kryptis_i', '$kompanija', '$isvykimo_data','$grizimo_data','$isvykimo_kaina','$grizimo_kaina','$galutine_kaina')";


if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
}

//Nuotraukos
$targetDir = "./uploads/"; 
$target_filename = basename($_FILES["files"]["name"]);

$target_file = $targetDir.$target_filename ;

if(isset($_FILES['files'])){ 
    
    if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
        $sql = "UPDATE skrydziai SET nuotrauka_url = '$target_filename' WHERE skrydzioid = $last_id";
       
        $insert = $conn->query($sql); 
    } else {

    }
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
	<span class="d-flex justify-content-center fw-bold mb-3">Skrydžio pridėjimas</span>

	<form action="" method="POST" enctype="multipart/form-data">
		
		<input type="text" class="form-control mb-3" placeholder="Kryptis iš" name="kryptis_is"/>
		
		<input type="text" class="form-control mb-3" placeholder="Kryptis į" name="kryptis_i"/>
		
		<input type="text" class="form-control mb-3" placeholder="Kompanija" name="kompanija"/>
		
		<input type="datetime-local" class="form-control mb-3" placeholder="Išvykimo_data" name="isvykimo_data"/>
		
		<input type="datetime-local" class="form-control mb-3" placeholder="Grįžimo_data" name="grizimo_data"/>
		
		<input type="number" step="0.01" class="form-control mb-3" placeholder="Išvykimo kaina" min="0" name="isvykimo_kaina"/>

		<input type="number" step="0.01" class="form-control mb-3" placeholder="Grįžimo kaina" min="0" name="grizimo_kaina"/>
       
		<input type="file"  class="form-control mb-3" placeholder="Nuotraukos" id="files" name="files">
		
		<div class="col d-flex justify-content-end">
			<button class="btn btn-outline-secondary" type='submit'> Pridėti </button>
		</div>
	</form>
  </div>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>