<?php
require_once 'sesija.php';

$sql = "SELECT * FROM skrydziai";
                    
$skrydziai = $conn->query($sql);

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

	<div class="row mb-3">	
	
		<ul class="nav nav-tabs justify-content-center">
		  <li class="nav-item">
			<a class="nav-link active" aria-current="page">Skrydžiai</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="Admin_viesbuciai.php">Viešbučiai</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="Admin_paslaugos.php">Papildomos paslaugos</a>
		  </li>

		</ul>
	</div>	
		
	<span class="d-flex justify-content-center fw-bold">Skrydžių pasiūlymai</span>
	<div class="d-flex justify-content-center mb-3 mt-3">
		<form action='prideti_skrydi.php'>

			<button class="btn btn-secondary" type='submit'>Pridėti naują skrydį</button>
		</form>
	</div>
														<!-- Skrydziu lentele -->
	<div class="d-flex justify-content-center mb-3 mt-3">
		<?php

		if($skrydziai->num_rows > 0){
			echo '
			<table>
			<tr>
				<th>Kryptis iš</th>
				<th>Kryptis į</th>
				<th>Kompanija</th> 
				<th>Išvykimo data</th>
				<th>Grįžimo data</th>
				<th>Išvykimo kaina</th>
				<th>Grįžimo kaina</th>
				<th>Galutinė kaina</th>
				<th>Papildomai</th>
			</tr>
		  ';
			while ($row = $skrydziai->fetch_assoc()) {
		 
				echo "  <tr>
				
				<td>".$row['kryptis_is']."</td>
				<td>".$row['kryptis_i']."</td>
				<td>".$row['kompanija']."</td>
				<td>".$row['isvykimo_data']."</td>
				<td>".$row['grizimo_data']."</td>
				<td>".$row['isvykimo_kaina']."</td>
				<td>".$row['grizimo_kaina']."</td>
				<td>".$row['galutine_kaina']."</td>
				<td> 
					<form action='redaguoti_skrydi.php' method='post'> 
						<input hidden name='kryptis_is' value='".$row['kryptis_is']."'/>
						<input hidden name='kryptis_i' value='".$row['kryptis_i']."'/>
						<input hidden name='kompanija' value='".$row['kompanija']."'/>
						<input hidden name='isvykimo_data' value='".$row['isvykimo_data']."'/>
						<input hidden name='grizimo_data' value='".$row['grizimo_data']."'/>
						<input hidden name='isvykimo_kaina' value='".$row['isvykimo_kaina']."'/>
						<input hidden name='grizimo_kaina' value='".$row['grizimo_kaina']."'/>
						<input hidden name='galutine_kaina' value='".$row['galutine_kaina']."'/>

					
						<input hidden name='skrydzioid' value='".$row['skrydzioid']."'/> 
						<button class='btn btn-primary' type='submit'>Redaguoti </button> 
					</form>
					</br> 
					<form action='istrinti_skrydi.php'> 
						<input hidden name='skrydzioid' value='".$row['skrydzioid']."'/> 
						<button class='btn btn-danger' type='submit'>Ištrinti </button> 
					</form>
				</td>
		
			  </tr>";
			}
		 }
		 echo '</table>';
		?>	
	</div>
</div>
								<!-- Mygtukas i virsu -->
                       
	<button onclick="topFunction()" id="myBtn" title="Grįžti į pradžią">▲</button> 
	<script>
		mybutton = document.getElementById("myBtn");

		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		  } else {
			mybutton.style.display = "none";
		  }
		}

		function topFunction() {
		  document.body.scrollTop = 0; // For Safari
		  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		} 
	</script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>