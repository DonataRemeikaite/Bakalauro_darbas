<?php
require_once 'sesija.php';

$skrydzio_id = $_POST['skrydzio_id'];
$viesbucio_id = $_POST['viesbucio_id'];
$paslaugos_id = $_POST['paslaugos'];

$keleiviu_skaicius = $_POST['keleiviu_skaicius'];

$sql = "SELECT * FROM skrydziai WHERE skrydzioid = '$skrydzio_id '";
$rez = $conn->query($sql);
$skrydis = $rez->fetch_assoc();

$sql1 = "SELECT * FROM viesbuciai WHERE viesbucioid = '$viesbucio_id '";
$rez1 = $conn->query($sql1);
$viesbutis = $rez1->fetch_assoc();


if(!empty($_POST['paslaugos'])){

		$sql2 = "SELECT * FROM paslaugos WHERE ";
		$i = 0;
        foreach ($_POST['paslaugos'] as &$value) {
			$value = "'".$value."'";
			$sql2 = $sql2."paslaugosid = ".$value;
			if($i+1 != count($_POST['paslaugos'])){
				$sql2 = $sql2." OR ";
			}
			$i++;
        }
    $paslaugos = $conn->query($sql2);

    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>-- Dive In Exploring -- Pasirinkta kelionė</title>
	
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

															<!-- Pasirinkta kelione -->
<div class="container border border-3 rounded mt-3 mb-3">
	<h4 class="row d-flex justify-content-center fst-italic pt-3">Pasirinkta kelionė:</h4>
	<div class="row border rounded mt-3 mb-3 me-3 ms-3">
		<span class="fw-bold">Pasirinktas skrydis:</span>
		<?php
		echo'
		<div class="row ">
			<span class="col">'.$skrydis['kryptis_is'].' - '.$skrydis['kryptis_i'].'</span>
			<span class="col">'.$skrydis['isvykimo_data'].' - '.$skrydis['grizimo_data'].'</span>
			<span class="col text-end">Skrydžio kaina: '.$skrydis['galutine_kaina']*$keleiviu_skaicius.'€ /'.$keleiviu_skaicius.'asm.</span>
		</div>
		';
		$galutine_skrydzio_kaina = $skrydis['galutine_kaina']*$keleiviu_skaicius;
		?>
	</div>
	<div class="row border rounded mt-3 mb-3 me-3 ms-3">
		<span class="fw-bold">Pasirinktas viešbutis:</span>
		<?php
		echo'
		<div class="row ">
			<span class="col">'.$viesbutis['pavadinimas'].'</span>
			<span class="col">'.$viesbutis['zvaigzdutes'].'⭐</span>
			<span class="col">'.$viesbutis['maitinimas'].'</span>
			<span class="col text-end">Viesbučio kaina: '.$viesbutis['kaina']*$keleiviu_skaicius.'€ /'.$keleiviu_skaicius.'asm.</span>
		</div>
		';
		$galutine_viesbucio_kaina = $viesbutis['kaina']*$keleiviu_skaicius;
		?>
	</div>	
	<div class="row border rounded mt-3 mb-3 me-3 ms-3">
		<span class="fw-bold">Pasirinktos paslaugos:</span>
		<?php
		$bendra_paslaugu_kaina = 0;
		if($paslaugos->num_rows > 0){
			while ($row = $paslaugos->fetch_assoc()) {
				$bendra_paslaugu_kaina += $row['kaina']*$keleiviu_skaicius;
				
				echo'
				<div class="row ">
					<span class="col">'.$row['pavadinimas'].'</span>
					<span class="col text-end">Paslaugos kaina: '.$row['kaina']*$keleiviu_skaicius.'€ /'.$keleiviu_skaicius.'asm.</span>
					
				</div>
				';
			}
		}
		
		?>
	</div>
	<div class="row text-end mt-3 mb-3 me-3 ms-3">
		<?php
		echo'
		<div class="row ">
			<span class=" col fw-bold">Galutinė kaina: '.$galutine_skrydzio_kaina+$galutine_viesbucio_kaina+$bendra_paslaugu_kaina.'€ /'.$keleiviu_skaicius.'asm.</span>
			 
		</div>
		';
		?>
	</div>
</div>
															<!-- Keliones duomenys -->
<div class="container border border-3 rounded mt-3 mb-3">
	<h4 class="row d-flex justify-content-center fst-italic pt-3">Užsakymui reikalingi duomenys:</h4>
	<span class="row d-flex justify-content-center fst-italic">Užpildykite tuščius laukelius</span>
	<form action="apmokejimas.php" method="post">
		<?php
			
			if($keleiviu_skaicius >= 1){
                foreach ($_POST['paslaugos'] as &$value) {
					echo '<input type="hidden" name="paslaugos[]" value="'.$value.'">';

                }
				echo'
					<input type="hidden" name="skrydzio_id" value="'.$skrydzio_id.'">
					<input type="hidden" name="viesbucio_id" value="'.$viesbucio_id.'">
					<input type="hidden" name="keleiviu_skaicius" value="'.$keleiviu_skaicius.'">
					
					<span class=" col fw-bold">1 keliautojas</span>
					<div class="row g-2 pt-3 pb-3">
					  <div class="col-md">
						<div class="form-floating">
						  <input required type="text" class="form-control" id="floatingInputGrid" name="pagr_kel_vardas" placeholder="" value="'.$_SESSION['vardas'].'">
						  <label for="floatingInputGrid">Vardas</label>
						</div>
					  </div>
					  <div class="col-md">
						<div class="form-floating">
						  <input required type="text" class="form-control" id="floatingInputGrid" placeholder="" value="'.$_SESSION['pavarde'].'">
						  <label for="floatingInputGrid">Pavardė</label>
						</div>
					  </div>
					</div>
					
					<div class="row g-2 pt-3 pb-3">
					  <div class="col-md">
						<div class="form-floating">
						  <input required type="email" class="form-control" id="floatingInputGrid" placeholder="" value="'.$_SESSION['el.pastas'].'">
						  <label for="floatingInputGrid">Elektroninis paštas</label>
						</div>
					  </div>
					  <div class="col-md">
						<div class="form-floating">
						  <input required type="number" min="0" class="form-control" id="floatingInputGrid" placeholder="">
						  <label for="floatingInputGrid">Telefono numeris</label>
						</div>
					  </div>
					</div>
					
					<div class="row g-2 pt-3 pb-3">
					  <div class="col-md">
						<div class="form-floating">
							<input required type="date" class="form-control" id="floatingInputGrid" placeholder="" value="'.$_SESSION['gimimo_data'].'">
							<label for="floatingInputGrid">Gimimo data</label>
						</div>
					  </div>
					  <div class="col-md">
						<div class="form-floating">
						  <input required type="text" class="form-control" id="floatingInputGrid" placeholder="">
						  <label for="floatingInputGrid">Pilietybė</label>
						</div>
					  </div>
					</div>
					
					<div class="row g-2 pt-3 pb-3">
					  <div class="col-md">
						<div class="form-floating">
						  <input required type="number" min="0" class="form-control" id="floatingInputGrid" placeholder="">
						  <label for="floatingInputGrid">Paso numeris</label>
						</div>
					  </div>
					  <div class="col-md">
						<div class="form-floating">
						  <input required type="date" class="form-control" id="floatingInputGrid" placeholder="">
						  <label for="floatingInputGrid">Paso galiojimo data</label>
						</div>
					  </div>
					</div>
				';
				
				for ($x = 2; $x <= $keleiviu_skaicius; $x++) {
					
					echo'
					
					<span class=" col fw-bold">'.$x.' keliautojas</span>
						<div class="row g-2 pt-3 pb-3">
						  <div class="col-md">
							<div class="form-floating">
							  <input required type="text" class="form-control" name="vardas[]" id="floatingInputGrid" placeholder="">
							  <label for="floatingInputGrid">Vardas</label>
							</div>
						  </div>
						  <div class="col-md">
							<div class="form-floating">
							  <input required type="text" class="form-control" id="floatingInputGrid" placeholder="">
							  <label for="floatingInputGrid">Pavardė</label>
							</div>
						  </div>
						</div>
						
						<div class="row g-2 pt-3 pb-3">
						  <div class="col-md">
							<div class="form-floating">
							  <input required type="email" class="form-control" id="floatingInputGrid" placeholder="">
							  <label for="floatingInputGrid">Elektroninis paštas</label>
							</div>
						  </div>
						  <div class="col-md">
							<div class="form-floating">
							  <input required type="number" min="0" class="form-control" id="floatingInputGrid" placeholder="">
							  <label for="floatingInputGrid">Telefono numeris</label>
							</div>
						  </div>
						</div>
						
						<div class="row g-2 pt-3 pb-3">
						  <div class="col-md">
							<div class="form-floating">
								<input required type="date" class="form-control" id="floatingInputGrid" placeholder="">
								<label for="floatingInputGrid">Gimimo data</label>
							</div>
						  </div>
						  <div class="col-md">
							<div class="form-floating">
							  <input required type="text" class="form-control" id="floatingInputGrid" placeholder="">
							  <label for="floatingInputGrid">Pilietybė</label>
							</div>
						  </div>
						</div>
						
						<div class="row g-2 pt-3 pb-3">
						  <div class="col-md">
							<div class="form-floating">
							  <input required type="number" min="0" class="form-control" id="floatingInputGrid" placeholder="">
							  <label for="floatingInputGrid">Paso numeris</label>
							</div>
						  </div>
						  <div class="col-md">
							<div class="form-floating">
							  <input required type="date" class="form-control" id="floatingInputGrid" placeholder="">
							  <label for="floatingInputGrid">Paso galiojimo data</label>
							</div>
						  </div>
						</div>
						';
				}
			}

		?>

		
		<div class="col-auto d-flex justify-content-end pb-3">
			<button class="btn btn-secondary" type="submit">Pereiti į apmokėjimą</button>
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
