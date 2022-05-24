<?php
require_once 'sesija.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>-- Dive In Exploring -- Narys</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="stilius.css" rel="stylesheet">
	
  </head>
  <body>
 
  <div class="container-fluid fonas mb-2 pb-5 pt-5">   <!-- Logotipas -->
	<div class="row pt-5 pb-5 mt-2 mb-2">
		<div class="col text-white fst-italic d-flex justify-content-center">
			<a href="https://if180029.mokslas.vdu.lt" class="text-decoration-none text-dark"><h1>-- Dive In Exploring --</h1></a>
		</div>
	</div>
  </div>
  
  
<main class="container">

    <section class="container border border-3 rounded col-md-6 col-10 mb-3 mt-3 py-4">
														<!-- Nario informacija -->
	   <div class="row">
		<div class="col-12 p-4 text-center">
		  <h3 class="mb-0">Nario informacija</h3>
		</div>
	   </div>
													  <!-- Nario informacija -->
	   <div class="container">
		<div class="row row-cols-1 text-center">
		<?php
			if(!isset($_SESSION['vartid'])){
			  header("location: prisijungimas.php");
			}
			  else{
			  $vid = $_SESSION['vartid'];
			  $sql = "SELECT vartid, vardas, pavarde, gimimo_data, el_pastas, pr_vardas FROM vartotojai WHERE vartid = '".$vid."'";
			  $rez = $conn->query($sql);
			  $eil = $rez->fetch_assoc();
			  echo "<div class='col'>Vardas:<p>" .$eil["vardas"]. "</p></div>";
			  echo "<div class='col'>Pavardė:<p>" .$eil["pavarde"]. "</p></div>";
			  echo "<div class='col'>Gimimo data:<p>" .$eil["gimimo_data"]. "</p></div>";
			  echo "<div class='col'>El. Paštas:<p>" .$eil["el_pastas"]. "</p></div>";
			  echo "<div class='col'>Prisijungimo vardas:<p>" .$eil["pr_vardas"]. "</p></div>";}

		  ?>
		</div>
	   </div>
	  
	  </div>

    </section>

	<div class="container border border-3 rounded col-md-6 col-10 mb-3 mt-3 py-4">
		<h3 class="mb-2 text-center">Užsakymo istorija</h3>
			<?php
			if(!isset($_SESSION['vartid'])){
				header("location: prisijungimas.php");

			}
			  else{
				$vid = $_SESSION['vartid'];
				$sql = "SELECT * FROM uzsakymai WHERE vartid = '".$vid."'";
				$rez = $conn->query($sql);
				$eil = $rez->fetch_assoc();
				if($rez->num_rows > 0){
				  
					$sql1 = "SELECT * FROM skrydziai WHERE skrydzioid = '".$eil["skrydzioid"]."'";
					$rez1 = $conn->query($sql1);
					$eil1 = $rez1->fetch_assoc();
					
					echo "
					
					<div class='container border border-3 rounded py-3 px-3'>
						<div class='row mt-3'>
							
							<span class='col fw-bold'>Skrydis: </span>
							<span class='col'>".$eil1['kryptis_is']." - ".$eil1['kryptis_i']."</span>
							<span class='col'>".$eil1['isvykimo_data']." - ".$eil1['grizimo_data']."</span>
							
						</div>
					  ";
					  
					$sql2 = "SELECT * FROM viesbuciai WHERE viesbucioid = '".$eil["viesbucioid"]."'";
					$rez2 = $conn->query($sql2);
					$eil2 = $rez2->fetch_assoc();
					  
					echo "
					
						<div class='row mt-3'>
							
							<span class='col fw-bold'>Viešbutis: </span>
							<span class='col'>".$eil2['pavadinimas']." ".$eil2['zvaigzdutes']."⭐</span>
							
							<span class='col'>".$eil2['maitinimas']."</span>
							
						</div>
					  ";
					 
					$sql3 = "SELECT * FROM paslaugos WHERE ";
					$i = 0;
					
					$psl = json_decode($eil["paslaugos"]);
					
					foreach ($psl as &$value) {
						
						
						$sql3 = $sql3."paslaugosid = ".$value;
					
						if($i+1 != count($psl)){
							
							$sql3 = $sql3." OR ";
						}
						$i++;
					}
					
					$paslaugos = $conn->query($sql3);
					
					  
					echo "
					
						<div class='row mt-3'>
							
							<span class='col fw-bold'>Paslaugos: </span>";
							if($paslaugos->num_rows > 0){
								while ($row = $paslaugos->fetch_assoc()) {
									echo "
									<span class='col'>".$row['pavadinimas']."</span> 
									";
								}
							}
							echo"
						</div>
					</div> 
					 ";
				}
				else{
					echo " <p class='text-center'>Neturite jokių ankstesnių užsakymų</p>";
				}
				
			  }

		  ?>
	</div>
</main>
   
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