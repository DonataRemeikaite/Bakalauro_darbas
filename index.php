<?php
require_once 'sesija.php';
 
$sql = "SELECT * FROM skrydziai GROUP BY kryptis_i ORDER BY skrydzioid DESC LIMIT 3 ";

$skrydziai = $conn->query($sql);


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>-- Dive In Exploring --</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="stilius.css" rel="stylesheet">

  </head>
  <body>

<div class="container mt-3">     <!-- Meniu juosta -->
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-4 fst-italic text-center text-sm-center text-md-center text-lg-start">
			<a href="https://if180029.mokslas.vdu.lt" class="text-decoration-none text-dark"><h3>-- Dive In Exploring --</h3></a>
		</div>
		
		<div class="col-12 col-sm-12 col-md-12 col-lg-8 d-flex justify-content-end">
			<div class="row d-flex justify-content-end" style="width:100%">
				<div class="col-12 col-sm-12 col-md-12 col-lg-auto mb-3 align-self-center d-flex justify-content-center">
					<a class="" href="mailto:info@diveinexploring.lt">info@diveinexploring.lt</a>
				</div>
				
				<div class="col-12 col-sm-12 col-md-12 col-lg-auto mb-3 d-flex justify-content-center">
				  <?php
				  if(!isset($_SESSION['vartid'])){
					  echo "<a class='btn btn-outline-primary' href='prisijungimas.php'>Prisijungti</a>";}
					else{
					  echo "<a href='nario_paskyra.php' class='text-decoration-none link-secondary'>Narys</a>";}
				  ?>
				</div>
				
			</div>
		</div>
	</div>
</div>

<div class="container-fluid fonas mt-2 pb-5 pt-5"> <!-- Logotipas -->
	<div class="row pt-3 pb-3">
		<div class="col text-white fst-italic d-flex justify-content-center">
			<h1>
			-- Dive In Exploring --
			</h1>
		</div>
	</div>
        
	<div class="container bg-transparent mt-3 pb-4 pt-4">  <!-- Keliones paieska -->
		<div class="row">
			<div class="col text-white fst-italic d-flex justify-content-center mb-3 mt-3">
				<h5>Kelionės paieška</h5>
			</div>
		</div>
        <form  action="skrydzio_paieska.php" method="post">

			<div class="row justify-content-center">

			  
				<div class="col-12 col-sm-12 col-md-12 col-lg-auto mb-3">
					<select required name="kryptis_i" class="form-select" aria-label="Default select example">
						
						<option  value="" disabled selected hidden>Kryptis į</option>
				  
						<?php
						 
						 $sql = "SELECT DISTINCT kryptis_i FROM skrydziai";
						
						 $rez = $conn->query($sql);
					  
						 if($rez->num_rows > 0){
							while ($row = $rez->fetch_assoc()) {
						 
								echo "<option value=".$row['kryptis_i'].">".$row['kryptis_i']."</option>";
							}
						}
						?>   
				   
					</select>
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-auto mb-3">
					<select required name="keleiviu_skaicius"  class="form-select" aria-label="Default select example">
						
						<option value="" disabled selected hidden>Keleivių skaičius</option>

						   <?php
							  
							  try {
								for ($x = 1; $x <= 10; $x++) {
									echo "<option value=".$x.">".$x."</option>";

								 }
							} catch (Exception $e) {
								echo 'Caught exception: ',  $e->getMessage(), "\n";
							}

							?>

			
					</select>
				</div>
				
				<div class="col-12 col-sm-12 col-md-12 col-lg-auto mb-3 d-flex justify-content-center">
					<button  class="btn btn-primary" type="submit" >Ieškoti</button>
				</div>
		   
			</div>
		</form>
	</div>
</div>


<div class="container mt-3">   <!-- Naujausios kryptys -->
	<div class="row">
		<div class="col fst-italic">
			<h5>Naujausios kryptys ✈️</h5>
		</div>
	</div>
	
	<div class="row mb-3">

        <?php
         if($skrydziai->num_rows > 0){
            while ($row = $skrydziai->fetch_assoc()) {
              
                echo '
				<div class="kryptis d-flex justify-content-center centrasParent col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
					<img src="/uploads/'.$row["nuotrauka_url"].'" class="img-fluid" alt="...">
					<form action = "skrydzio_paieska.php" method="POST">
						<input hidden value= "'.$row["kryptis_i"].'" name="kryptis_i"/>
						<input hidden value="1" name="keleiviu_skaicius"/>
						<a class="btn btn-secondary centruoti" href="skrydzio_paieska.php">'.$row["kryptis_i"].'</a>
					</form>
				</div>';
            }
        }
        
        ?>

	</div>

</div>
								<!-- Mygtukas i virsu -->
                       
	<button onclick="topFunction()" id="myBtn" title="Grįžti į pradžią">▲</button> 
	<script>
		
		mybutton = document.getElementById("myBtn");

		// Mygtuko atsiradimas vartotojui pascrolinus puslapyje 20px
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		  } else {
			mybutton.style.display = "none";
		  }
		}

		// Vartotojui paspaudus ant mygtuka, atslenkamas puslapio viršus
		function topFunction() {
		  document.body.scrollTop = 0; // For Safari
		  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		} 
	</script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
