<?php
require_once 'sesija.php';

$skrydzio_id = $_POST['skrydzio_id'];

$kryptis_i = $_POST['kryptis_i'];
$keleiviu_skaicius = $_POST['keleiviu_skaicius'];
$isvykimo_data = $_POST['isvykimo_data'];
$grizimo_data = $_POST['grizimo_data'];
$isvykimo_data = explode(" ",$isvykimo_data)[0];
$grizimo_data = explode(" ",$grizimo_data)[0];

    $sql = "SELECT * FROM viesbuciai WHERE kryptis_i = '$kryptis_i' AND atvykimo_data between '$isvykimo_data 00:00:00' and '$isvykimo_data 23:59:59' AND isvykimo_data between '$grizimo_data 00:00:00' and '$grizimo_data 23:59:59' "; //nuo kada iki kada
	
											//pagal filtro parametrus
    if(!empty($_POST['kaina_nuo']) && !empty($_POST['kaina_iki'])){
        $sql = $sql." AND (kaina between " .$_POST['kaina_nuo']." and " .$_POST['kaina_iki'].")";
    }

    if(!empty($_POST['kaina_nuo'])){
		$sql = $sql." AND (kaina between " .$_POST['kaina_nuo']." and 10000000)";
    }
	
    if(!empty($_POST['kaina_iki'])){
		$sql = $sql." AND (kaina between 0 and " .$_POST['kaina_iki'].")";
    }
	
	$zvaigzdute1 = false;
	$zvaigzdute2 = false;
	$zvaigzdute3 = false;
	$zvaigzdute4 = false;
	$zvaigzdute5 = false;
	
    if(!empty($_POST['zvaigzdutes'])){
        $sql = $sql." AND (zvaigzdutes = 6";
        foreach ($_POST['zvaigzdutes'] as &$value) {
			$sql = $sql." OR zvaigzdutes = ".$value;
			if($value == 1){
				$zvaigzdute1 = true;
			}
			elseif($value == 2){
				$zvaigzdute2 = true;
			}
			elseif($value == 3){
				$zvaigzdute3 = true;
			}
			elseif($value == 4){
				$zvaigzdute4 = true;
			}
			elseif($value == 5){
				$zvaigzdute5 = true;
			}
			
        }
        $sql = $sql.")";
    }
	
	
	$maitinimas1 = false;
	$maitinimas2 = false;
	$maitinimas3 = false;
	$maitinimas4 = false;
	
    if(!empty($_POST['maitinimas'])){

        $sql = $sql." AND (maitinimas = 'temp'";
        foreach ($_POST['maitinimas'] as &$value) {
			$val = "'".$value."'";
			$sql = $sql." OR maitinimas = ".$val;
			if($value == 'Be maitinimo'){
				$maitinimas1 = true;
			}
			elseif($value == 'Pusryčiai'){
				$maitinimas2 = true;
			}
			elseif($value == 'Pusryčiai ir vakarienė'){
				$maitinimas3 = true;
			}
			elseif($value == 'Viskas įskaičiuota'){
				$maitinimas4 = true;
			}
        }
        $sql = $sql.")";
    }


	$vieta1 = false;
	$vieta2 = false;
	
    if(!empty($_POST['vieta'])){
        $sql = $sql." AND (vieta = 'temp'";
        foreach ($_POST['vieta'] as &$value) {
            $val = "'".$value."'";
			$sql = $sql." OR vieta = ".$val;
			if($value == 'Ant jūros kranto'){
				$vieta1 = true;
			}
			elseif($value == 'Miesto centre'){
				$vieta2 = true;
			}
        }
        $sql = $sql.")";
    }
	
	
	$tema1 = false;
	$tema2 = false;
	$tema3 = false;
	
    if(!empty($_POST['tema'])){
        $sql = $sql." AND (tema = 'temp'";
        foreach ($_POST['tema'] as &$value) {
            $val = "'".$value."'";
			$sql = $sql." OR tema = ".$val;
			if($value == 'Šeimai'){
				$tema1 = true;
			}
			elseif($value == 'Poroms'){
				$tema2 = true;
			}
			elseif($value == 'Verslas'){
				$tema3 = true;
			}
        }
        $sql = $sql.")";
    }
	$sql = $sql." ORDER BY kaina ASC";
    
	$viesbuciai = $conn->query($sql);
   

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>-- Dive In Exploring -- Viešbučiai</title>
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="stilius.css" rel="stylesheet">
	
  </head>
  <body>
  
<div class="container mt-3" style="padding:0px">     <!-- Meniu juosta -->
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
	<div class="row ">
		<div class="col text-white fst-italic d-flex justify-content-center">
			<h1>
			-- Viešbutis --
			</h1>
		</div>
	</div>
		
	<div class="container bg-transparent mt-3">  <!-- Keliones paieska -->
		
		<div class="row">
			<div class="col text-white fst-italic d-flex justify-content-center mb-3 mt-3">
				<h5>Kelionės paieška</h5>
			</div>
		</div>
		<form  action="skrydzio_paieska.php" method="post">
            
			<div class="row justify-content-center">
					
				<div class="col-12 col-sm-12 col-md-12 col-lg-auto mb-3">
					<select name="kryptis_i" class="form-select">
						<?php
						 $sql = "SELECT DISTINCT kryptis_i FROM skrydziai";
						
						 $rez = $conn->query($sql);
					  
						 if($rez->num_rows > 0){
							while ($row = $rez->fetch_assoc()) {
								if($kryptis_i != $row['kryptis_i']){
									echo "<option value=".$row['kryptis_i'].">".$row['kryptis_i']."</option>";
								}
								else{
									echo "<option selected value=".$row['kryptis_i'].">".$row['kryptis_i']."</option>";

								}
							}
						}
						?>
					</select>
				</div>
					
				<div class="col-12 col-sm-12 col-md-12 col-lg-auto mb-3">
					<select name="keleiviu_skaicius" class="form-select">
						   <?php
							  
							  try {
								for ($x = 1; $x <= 10; $x++) {
									if($x != $keleiviu_skaicius){
										
										echo "<option value=".$x.">".$x."</option>";
									}
									else{
										echo "<option selected value=".$x.">".$x."</option>";

									}
								 }
							} catch (Exception $e) {
								echo 'Caught exception: ',  $e->getMessage(), "\n";
							}

							?>
					</select>
				</div>
					
				<div class="col-12 col-sm-12 col-md-12 col-lg-auto mb-3 d-flex justify-content-center">
					<button class="btn btn-primary" type="submit">Ieškoti</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="container">
									<!-- Filtras -->
	<div class="row mt-3">
	
		<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 border rounded mb-3 p-2" style="height:100%">
            <form action = "" method="POST">
                <?php
                    echo'
						
                        <input type="hidden" name="kryptis_i" value="'.$kryptis_i.'">
                        <input type="hidden" name="keleiviu_skaicius" value="'.$keleiviu_skaicius.'">
                        <input type="hidden" name="isvykimo_data" value="'.$isvykimo_data.'">
                        <input type="hidden" name="grizimo_data" value="'.$grizimo_data.'">
						';
                 ?>

				<h4 class="text-center">Filtras</h4>
				<div class="">
                    <label>Kaina:</label>

                    <div class="kainaFiltras mt-2"> 
                        <div>
                            <label>Nuo: </label>
                            <?php echo' <input value="'.$_POST['kaina_nuo'].'" name="kaina_nuo" type="number" min="0" max="10000"/> ';?>
                        </div>
                        <div>
                            <label>Iki: </label>
                            <?php echo' <input value="'.$_POST['kaina_iki'].'" name="kaina_iki" type="number" min="0" max="10000"/> ';?>
                        </div>
                    </div>
					
				</div>
				<div class="mt-3">
					<label>Viešbučio kategorija:</label>
					
					<?php
					if($zvaigzdute1 == 'true'){
						echo '
							<div class="col">
								<input class="form-check-input" type="checkbox" value="1" name="zvaigzdutes[]"  id="flexCheckDefault" checked>
								<label class="form-check-label" for="flexCheckDefault">
									⭐
								</label>
							</div>
					';}
					else{
						echo '
							<div class="col">
								<input class="form-check-input" type="checkbox" value="1" name="zvaigzdutes[]"  id="flexCheckDefault">
								<label class="form-check-label" for="flexCheckDefault">
									⭐
								</label>
							</div>
					';
					}
					?>

					<?php
					if($zvaigzdute2 == 'true'){
						echo '
							<div class="col">
								<input class="form-check-input" type="checkbox" value="2" name="zvaigzdutes[]"  id="flexCheckDefault" checked>
								<label class="form-check-label" for="flexCheckDefault">
									⭐⭐
								</label>
							</div>
					';}
					else{
						echo '
							<div class="col">
								<input class="form-check-input" type="checkbox" value="2" name="zvaigzdutes[]"  id="flexCheckDefault">
								<label class="form-check-label" for="flexCheckDefault">
									⭐⭐
								</label>
							</div>
					';
					}
					?>
					<?php
					if($zvaigzdute3 == 'true'){
						echo '
							<div class="col">
								<input class="form-check-input" type="checkbox" value="3" name="zvaigzdutes[]"  id="flexCheckDefault" checked>
								<label class="form-check-label" for="flexCheckDefault">
									⭐⭐⭐
								</label>
							</div>
					';}
					else{
						echo '
							<div class="col">
								<input class="form-check-input" type="checkbox" value="3" name="zvaigzdutes[]"  id="flexCheckDefault">
								<label class="form-check-label" for="flexCheckDefault">
									⭐⭐⭐
								</label>
							</div>
					';
					}
					?>
					<?php
					if($zvaigzdute4 == 'true'){
						echo '
							<div class="col">
								<input class="form-check-input" type="checkbox" value="4" name="zvaigzdutes[]"  id="flexCheckDefault" checked>
								<label class="form-check-label" for="flexCheckDefault">
									⭐⭐⭐⭐
								</label>
							</div>
					';}
					else{
						echo '
							<div class="col">
								<input class="form-check-input" type="checkbox" value="4" name="zvaigzdutes[]"  id="flexCheckDefault">
								<label class="form-check-label" for="flexCheckDefault">
									⭐⭐⭐⭐
								</label>
							</div>
					';
					}
					?>
					<?php
					if($zvaigzdute5 == 'true'){
						echo '
							<div class="col">
								<input class="form-check-input" type="checkbox" value="5" name="zvaigzdutes[]"  id="flexCheckDefault" checked>
								<label class="form-check-label" for="flexCheckDefault">
									⭐⭐⭐⭐⭐
								</label>
							</div>
					';}
					else{
						echo '
							<div class="col">
								<input class="form-check-input" type="checkbox" value="5" name="zvaigzdutes[]"  id="flexCheckDefault">
								<label class="form-check-label" for="flexCheckDefault">
									⭐⭐⭐⭐⭐
								</label>
							</div>
					';
					}
					?>

				</div>
				<div class="mt-3">
					<label>Maitinimas:</label>
					<?php
					if($maitinimas1 == 'true'){
						echo '
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Be maitinimo" name="maitinimas[]"  id="flexCheckDefault" checked>
							<label class="form-check-label" for="flexCheckDefault">
								Be maitinimo
							</label>
						</div>
						';
					}
					else{
						echo '
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Be maitinimo" name="maitinimas[]"  id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Be maitinimo
							</label>
						</div>
						';
					}
					?>
					<?php
					if($maitinimas2 == 'true'){
						echo '
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Pusryčiai" name="maitinimas[]" id="flexCheckDefault" checked>
							<label class="form-check-label" for="flexCheckDefault">
								Pusryčiai
							</label>
						</div>
					';}
					else{
						echo '
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Pusryčiai" name="maitinimas[]" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Pusryčiai
							</label>
						</div>
					';						
					}
					?>
					<?php
					if($maitinimas3 == 'true'){
						echo '
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Pusryčiai ir vakarienė" name="maitinimas[]" id="flexCheckDefault" checked>
							<label class="form-check-label" for="flexCheckDefault">
								Pusryčiai ir vakarienė
							</label>
						</div>
						';
					}
					else{
						echo '
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Pusryčiai ir vakarienė" name="maitinimas[]" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Pusryčiai ir vakarienė
							</label>
						</div>
						';
					}?>
					<?php
					if($maitinimas4 == 'true'){
						echo '
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Viskas įskaičiuota" name="maitinimas[]" id="flexCheckDefault" checked>
							<label class="form-check-label" for="flexCheckDefault">
								Viskas įskaičiuota
							</label>
						</div>
						';
					}
					else{
						echo '
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Viskas įskaičiuota" name="maitinimas[]" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Viskas įskaičiuota
							</label>
						</div>
						';
					}
					?>
				</div>
				
				<div class="mt-3">
					<label>Viešbučio vieta:</label>
					<?php
					if($vieta1 == 'true'){
						echo '
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Ant jūros kranto" name="vieta[]" id="flexCheckDefault" checked>
							<label class="form-check-label" for="flexCheckDefault">
								Ant jūros kranto
							</label>
						</div>
						';
					}
					else{
						echo'
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Ant jūros kranto" name="vieta[]" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Ant jūros kranto
							</label>
						</div>
						';
					}
					?>
					<?php
					if($vieta2 == 'true'){
						echo'
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Miesto centre" name="vieta[]" id="flexCheckDefault" checked>
							<label class="form-check-label" for="flexCheckDefault">
								Miesto centre
							</label>
						</div>
						';
					}
					else{
						echo'
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Miesto centre" name="vieta[]" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Miesto centre
							</label>
						</div>
						';
					}
					?>
				</div>
				
				<div class="mt-3">
					<label>Viešbučio tema:</label>
					<?php
					if($tema1 == 'true'){
						echo'
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Šeimai" name="tema[]" id="flexCheckDefault" checked>
							<label class="form-check-label" for="flexCheckDefault">
								Šeimai
							</label>
						</div>
						';
					}
					else{
						echo'
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Šeimai" name="tema[]" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Šeimai
							</label>
						</div>
						';
					}
					?>
					<?php
					if($tema2 == 'true'){	
						echo'
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Poroms" name="tema[]" id="flexCheckDefault" checked>
							<label class="form-check-label" for="flexCheckDefault">
								Poroms
							</label>
						</div>
						';
					}
					else{
						echo'
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Poroms" name="tema[]" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Poroms
							</label>
						</div>
						';
					}
					?>
					<?php
					if($tema3 == 'true'){	
						echo'
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Verslas" name="tema[]" id="flexCheckDefault" checked>
							<label class="form-check-label" for="flexCheckDefault">
								Verslas
							</label>
						</div>
						';
					}
					else{
						echo'
						<div class="col">
							<input class="form-check-input" type="checkbox" value="Verslas" name="tema[]" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Verslas
							</label>
						</div>
						';
					}
					?>
				</div>
				<div class="col-auto d-flex justify-content-center mt-3 pb-3">
					<button class="btn btn-primary" type="submit">Filtruoti</button>
				</div>
            </form>
		</div>

		
											<!-- Viesbuciu pasiulymai -->
       

        <div class = "col">
			<?php

			if($viesbuciai->num_rows > 0){
				while ($row = $viesbuciai->fetch_assoc()) {
					
					echo'
					<form  action="viesbucio_perziura.php" method="post">
						<input type="hidden" name="skrydzio_id" value="'.$skrydzio_id.'">
						<input type="hidden" name="viesbucio_id" value="'.$row['viesbucioid'].'">
						<input type="hidden" name="pavadinimas" value="'.$row['pavadinimas'].'">
						<input type="hidden" name="salis" value="'.$row['kryptis_i'].'">
						<input type="hidden" name="keleiviu_skaicius" value="'.$keleiviu_skaicius.'">
						<input type="hidden" name="atvykimo_data" value="'.$row['atvykimo_data'].'">
						<input type="hidden" name="isvykimo_data" value="'.$row['isvykimo_data'].'">
						<input type="hidden" name="zvaigzdutes" value="'.$row['zvaigzdutes'].'">
						<input type="hidden" name="maitinimas" value="'.$row['maitinimas'].'">
						<input type="hidden" name="kaina" value="'.$row['kaina'].'">
						<input type="hidden" name="aprasymas" value="'.$row['aprasymas'].'">
						
						<div class="row ps-0 pe-0 fixPadding" >
							<div class="container px-0">
								<div class="card mb-4">
								  <div class="row g-0">
								  ';
								  
									$sql1 = "SELECT * FROM nuotraukos WHERE viesbucio_id = ".$row['viesbucioid']." LIMIT 1";
									$nuotraukos = $conn->query($sql1);
									
									if ($nuotraukos->num_rows >= 1){
										while ($eil = $nuotraukos->fetch_assoc()) {
											
											echo'
											<div class="col-md-2">
												<img src="/uploads/'.$eil['nuotraukos_url'].'" style="height:100%; width:100%" class="img-fluid rounded-start" alt="...">
											</div>
											';
										}
									}
									
									echo'
									<div class="col-md-8">
									  <div class="card-body">
										<h5 class="card-title">'.$row['pavadinimas'].'</h5>
										<p class="card-text">'.$row['zvaigzdutes'].'</p>
										<p class="card-text">'.$row['maitinimas'].'</p>
									  </div>
									</div>				
									<div class="col-md-2">
									  <div class="card-body">
										<p class="card-text">Viesbučio galutinė kaina: '.$row['kaina']*$keleiviu_skaicius.' € / '.$keleiviu_skaicius.'asm. </p>
										<button type="submit" class="btn btn-secondary">Peržiūrėti</button>
									  </div>
									</div>
								  </div>
								</div>
							</div>

						</div>
					</form>
					';
				}
			}
			else {
				echo "<h5 class='text-center text-danger'>Pagal pasirinktus kriterijus viešbučių pasiūlymų nėra, prašome pasirinkti kitus filtro paieškos kriterijus</h5>";
			}
			
			?>
        </div>
	</div>																		
</div>	
	
								
									<!-- Mygtukas į viršų -->
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