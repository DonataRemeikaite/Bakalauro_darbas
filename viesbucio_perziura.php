<?php
require_once 'sesija.php';

$skrydzio_id = $_POST['skrydzio_id'];
$viesbucio_id = $_POST['viesbucio_id'];

$pavadinimas = $_POST['pavadinimas'];
$salis = $_POST['salis'];
$keleiviu_skaicius = $_POST['keleiviu_skaicius'];
$atvykimo_data = $_POST['atvykimo_data'];
$isvykimo_data = $_POST['isvykimo_data'];
$atvykimo_data = explode(" ",$atvykimo_data)[0];
$isvykimo_data = explode(" ",$isvykimo_data)[0];
$zvaigzdutes = $_POST['zvaigzdutes'];
$maitinimas = $_POST['maitinimas'];
$kaina = $_POST['kaina'];
$aprasymas = $_POST['aprasymas'];
			
$sql1 = "SELECT * FROM nuotraukos WHERE viesbucio_id = '$viesbucio_id '";
$nuotraukos = $conn->query($sql1);


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>-- Dive In Exploring -- Viešbučio Peržiūra</title>
	
	
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

<div class="container mt-3"> <!-- Viešbutis -->
	<div class="row">
		<div class="col">
			<div class="container">

			<?php
			echo'
				<div class="row">
					<div class="col-auto fst-italic">
						<h3>'.$pavadinimas.'</h3>
					</div>
					<div class="col-auto fst-italic">
						<h3>'.$zvaigzdutes.'⭐</h3>
					</div>
					<div class="col-auto fst-italic align-self-center">
						<span>'.$salis.'</span>
					</div>
					<div class="col-auto fst-italic align-self-center">
						<span>Trukmė: '.$atvykimo_data.' iki '.$isvykimo_data.'</span>
					</div>
				</div>
			';
			?>
			</div>
		</div>
		<div class="col-auto">
			<div class="container">
				<?php
				echo'
				<form action="papildomos_paslaugos.php" method="post">
					<input type="hidden" name="skrydzio_id" value="'.$skrydzio_id.'">
					<input type="hidden" name="viesbucio_id" value="'.$viesbucio_id.'">
					<input type="hidden" name="keleiviu_skaicius" value="'.$keleiviu_skaicius.'">
					<div class="row">
						<div class="col-auto align-self-center">
							<span>Viešbučio galutinė kaina: '.$kaina*$keleiviu_skaicius.'€ / '.$keleiviu_skaicius.'asm.</span>
						</div>
						<div class="col-auto d-flex justify-content-end">
							<button class="btn btn-secondary"type="submit">Pasirinkti</button>
						</div>
					</div>
				</form>
				';
				?>
			</div>
		</div>
	</div>
</div>

<div class="container mt-3"> <!-- Nuotrauku slinkiklis -->
		<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-inner">
		<?php
            if ($nuotraukos->num_rows ==1){
				while ($row = $nuotraukos->fetch_assoc()) {
                
					echo '<div class="carousel-item active">';
					echo '<img src="/uploads/'.$row['nuotraukos_url'].'" class="d-block w-100" alt="..."> </div>';
				}
			}
            if ($nuotraukos->num_rows >= 2){
                for($i = 0; $i<$nuotraukos->num_rows; $i++){
                    if($i == 0){
                        $row = $nuotraukos->fetch_assoc();
                        echo '<div class="carousel-item active">';
                        echo '<img src="/uploads/'.$row['nuotraukos_url'].'" class="d-block w-100" alt="..."> </div>';
                    }
                    else{
                        $row = $nuotraukos->fetch_assoc();
                        echo '<div class="carousel-item">';
                        echo '<img src="/uploads/'.$row['nuotraukos_url'].'" class="d-block w-100" alt="..."> </div>';
                    }
                }
            }
        ?>
	
	  </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
	  </button>
	</div>
</div>

<div class="container mt-3 mb-3">    <!-- Viesbucio aprasymas -->
	
	<div class="row">
		<div class="col"><hr></div>
			<h4 class="col-auto fw-bold fst-italic align-self-center">Aprašymas</h4>
		<div class="col"><hr></div>
	</div>
	<?php
		echo'
			<span class="fw-light">'.$aprasymas.'</span>
		';
	?>
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