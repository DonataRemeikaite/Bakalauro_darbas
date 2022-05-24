<?php
require_once 'sesija.php';


$kryptis_i = $_POST['kryptis_i'];
$keleiviu_skaicius = $_POST['keleiviu_skaicius'];
$isvykimo_data = $_POST['isvykimo_data'];
$grizimo_data = $_POST['grizimo_data'];  


    $sql = "SELECT * FROM skrydziai WHERE kryptis_i = '$kryptis_i' ORDER BY isvykimo_data ASC"; //parinkti visus tomis kryptimis
	$skrydziai = $conn->query($sql);
	$skrydziu_kopija = $conn->query($sql);
    

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>-- Dive In Exploring -- Skrydis</title>
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="stilius.css" rel="stylesheet">
    <script>

window.onload = function() {		// Diagramos sukūrimo kodo fragmentas pasiskolintas iš: https://canvasjs.com/jquery-charts/json-data-api-ajax-chart/

var dataPoints = [];
CanvasJS.addColorSet("spalva",
                [
                "#6c757d ",
                ]);
var options =  {
	animationEnabled: true,
    colorSet: "spalva",
	axisX: {
		valueFormatString: "DD MM YYYY",
	},
	axisY: {
		title: "Kaina",
		titleFontSize: 12
	},
	data: [{
		type: "column", 
		yValueFormatString: "#,###.##€",
		dataPoints: dataPoints
	}]
};

function addData(data) {
	for (var i = 0; i < data.length; i++) {
		dataPoints.push({
			x: new Date(data[i].date),
			y: data[i].units
		});
	}
	$("#chartContainer").CanvasJSChart(options);

}
var data = []
<?php


if($skrydziu_kopija->num_rows > 0){
    while ($row = $skrydziu_kopija->fetch_assoc()) {
        $date = new DateTime($row['isvykimo_data']);
        $timestamp = $date->getTimestamp();
        
        echo "data.push(
            {'date': ".$timestamp."000, 'units': ".$row['galutine_kaina']."});";
    }
}

?>
console.log(data);

addData(data)

}
</script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
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
			-- Skrydis --
			</h1>
		</div>
	</div>
	
	<div class="container bg-transparent mt-3">  <!-- Keliones paieska -->
		
		<div class="row">
			<div class="col text-white fst-italic d-flex justify-content-center mb-3 mt-3">
				<h5>Kelionės paieška</h5>
			</div>
		</div>
		
		<form  action="" method="post">
		
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
									<!-- Diagrama -->

<div class="container bg-secondary mt-3 pb-3">
	<span class="d-flex justify-content-center">Skrydžio kainų palyginimo diagrama</span>
    <div id="chartContainer" style="height: 200px; width: 100%;"></div>
</div>

									<!-- Skrydzio pasiulymas -->
<?php 
 
	if($skrydziai->num_rows > 0){
		while ($row = $skrydziai->fetch_assoc()) {
	
			echo '
			<form action="viesbucio_paieska.php" method="POST">
			
				<div class="container d-flex px-0 justify-content-center mt-3">
						<input type="hidden" name="skrydzio_id" value="'.$row['skrydzioid'].'">
						<input type="hidden" name="kryptis_i" value="'.$row['kryptis_i'].'">
						<input type="hidden" name="keleiviu_skaicius" value="'.$keleiviu_skaicius.'">
						<input type="hidden" name="isvykimo_data" value="'.$row['isvykimo_data'].'">
						<input type="hidden" name="grizimo_data" value="'.$row['grizimo_data'].'">

						<div class="card mb-3 col-12 p-0">
						  <div class="row g-0">
							<div class="col-md-2">
							  <img src="/uploads/'.$row["nuotrauka_url"].'" class="img-fluid rounded-start" alt="...">
							</div>
							<div class="col-md-4">
							  <div class="card-body">
								<h5 class="card-title">Kryptis: '.$row['kryptis_is'].'  - '.$row['kryptis_i'].'</h5>
								<p class="card-text">'.$row['kompanija'].'</p>
								<p class="card-text">'.$row['isvykimo_data'].'</p>
							  </div>
							</div>
							<div class="col-md-4">
							  <div class="card-body">
							  <h5 class="card-title">Kryptis: '.$row['kryptis_i'].' - '.$row['kryptis_is'].'</h5>
								<p class="card-text">'.$row['kompanija'].'</p>
								<p class="card-text">'.$row['grizimo_data'].'</p>
							  </div>
							</div>
							<div class="col-md-2">
							  <div class="card-body fixPaddings">
								<p class="card-text">Skrydžio galutinė kaina: '.number_format(($row['galutine_kaina'] * $keleiviu_skaicius), 2, ',', ' ').' € / '.$keleiviu_skaicius.'asm. </p>
								<button class="btn btn-secondary" type="submit">Pasirinkti</button>
							  </div>
							</div>
						  </div>
						</div>
						
					
				</div>
			</form>
			';
		}
	}
	else{
		echo'
		<div class="row mt-3">
			<span class="text-center text-danger"> Šiuo metu, skrydžių pasiūlymų šia kryptimi nėra</span>
		</div>
		';
	}
?>
									<!-- Mygtukas į viršų -->
	<button onclick="topFunction()" id="myBtn" title="Grįžti į pradžią">▲</button> 
	
	<script>
		//Get the button:
		mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		  } else {
			mybutton.style.display = "none";
		  }
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
		  document.body.scrollTop = 0; // For Safari
		  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		} 
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	
  </body>
</html>