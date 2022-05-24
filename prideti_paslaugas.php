<?php
require_once 'sesija.php';

$pavadinimas = $_POST['pavadinimas'];
$kaina = $_POST['kaina'];

$sql = "INSERT INTO paslaugos (pavadinimas, kaina) VALUES ('$pavadinimas','$kaina')";

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

	<a class="text-decoration-none link-secondary mb-3" href="Admin_paslaugos.php">Atgal</a>
	<span class="d-flex justify-content-center fw-bold mb-3">Paslaugų pridėjimas</span>

	<form action="" method="POST">
	
		<input type="text" class="form-control mb-3" placeholder="Pavadinimas" name="pavadinimas"/>
		
		<input type="number" step="0.01" class="form-control mb-3" placeholder="Kaina" min="0" name="kaina"/>
		
		<div class="col d-flex justify-content-end">
			<button class="btn btn-outline-secondary" type='submit'> Pridėti </button>
		</div>
	</form>
  </div>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>