<?php
require_once 'sesija.php';

$skrydzio_id = $_POST['skrydzio_id'];
$viesbucio_id = $_POST['viesbucio_id'];
$keleiviu_skaicius = $_POST['keleiviu_skaicius'];

$sql = "SELECT * FROM paslaugos";
$paslaugos = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>-- Dive In Exploring -- Papildomos paslaugos</title>
	
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
			-- Papildomos paslaugos --
			</h1>
		</div>
	</div>
</div>	
													<!-- Paslaugos -->
<div class="container border border-3 rounded mt-3 col-md-4 col-10">
		<h4 class="row fst-italic d-flex justify-content-center pt-3">Paslaugų sąrašas:</h4>
		<span class="row fst-italic d-flex justify-content-center pb-3" style="font-size:11px">*Jeigu paslaugos yra nereikalingos, tiesiog paspauskite mygtuką 'Pasirinkti'</span>
		<form action="pasirinkta_kelione.php" method="post">
			
			<?php	
				echo'
				<input type="hidden" name="skrydzio_id" value="'.$skrydzio_id.'">
				<input type="hidden" name="viesbucio_id" value="'.$viesbucio_id.'">
				<input type="hidden" name="keleiviu_skaicius" value="'.$keleiviu_skaicius.'">';
				if($paslaugos->num_rows > 0){
					while ($row = $paslaugos->fetch_assoc()) {
						echo'
					
						<div class="row">
							<div class="col d-inline float-start">
								<label class="form-check-label" for="flexCheckDefault ">'.$row['pavadinimas'].'</label>

							</div>
							<div class="col d-inline float-end" >
								<input class="form-check-input float-end ms-3" value="'.$row['paslaugosid'].'" name="paslaugos[]" type="checkbox" id="flexCheckDefault">
								<label class="form-check-label float-end" for="flexCheckDefault">Kaina: '.$row['kaina']*$keleiviu_skaicius.'€ / '.$keleiviu_skaicius.'asm.</label>
							</div>
						</div>
						';
					}
				}		

			?>	
			<div class="col-auto d-flex justify-content-center pt-3 pb-3">
				<button class="btn btn-secondary" type="submit">Pasirinkti</button>
			</div>
		
		</form>
		
		
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