<?php
require_once 'sesija.php';

$sql = "SELECT * FROM paslaugos";
                    
$paslaugos = $conn->query($sql);


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
			<a class="nav-link " href="Admin_skrydziai.php" >Skrydžiai</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="Admin_viesbuciai.php" >Viešbučiai</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link active" aria-current="page">Papildomos paslaugos</a>
		  </li>

		</ul>
	</div>	
		
	<span class="d-flex justify-content-center fw-bold">Papildomos paslaugos</span>
		<div class="d-flex justify-content-center mb-3 mt-3">
		
		<form action='prideti_paslaugas.php'>
			<button class="btn btn-secondary" type='submit'>Pridėti naują paslaugą</button>
		</form>
		
	</div>
															<!-- Paslaugu lentele -->
	<div class="d-flex justify-content-center mb-3 mt-3">
		<?php

		if($paslaugos->num_rows > 0){
			echo '
			<table>
			<tr>
				<th>Pavadinimas</th>
				<th>Kaina</th>
				<th>Papildomai</th>
			</tr>
		  ';
			while ($row = $paslaugos->fetch_assoc()) {
		 
				echo "  <tr>
				
				<td>".$row['pavadinimas']."</td>
				<td>".$row['kaina']."</td>
				<td> 
					<form action='redaguoti_paslaugas.php' method='post'>
						<input hidden name='pavadinimas' value='".$row['pavadinimas']."'/>		
						<input hidden name='kaina' value='".$row['kaina']."'/>
						
						<input hidden name='paslaugosid' value='".$row['paslaugosid']."'/> 
						<button class='btn btn-primary' type='submit'>Redaguoti </button> 
					</form>
					
					</br> 
					";
                    ?>

					<form action='istrinti_paslauga.php' onsubmit="return confirm('Are you sure you want to submit this form?')"> 
                    <?php echo "
						<input hidden name='paslaugosid' value='".$row['paslaugosid']."'/> 
						<button class='btn btn-danger' type='submit'>Ištrinti </button> 
                        ";?>

					</form>
                    <?php
                    echo "
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