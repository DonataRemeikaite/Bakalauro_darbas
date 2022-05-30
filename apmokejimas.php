<?php
require_once 'sesija.php';

$skrydzio_id = $_POST['skrydzio_id'];
$viesbucio_id = $_POST['viesbucio_id'];
$paslaugos_id = $_POST['paslaugos'];


$keleiviu_skaicius = $_POST['keleiviu_skaicius'];

$sql = "SELECT * FROM skrydziai WHERE skrydzioid = '$skrydzio_id '";
$rez = $conn->query($sql);
$skrydis = $rez->fetch_assoc();
$galutine_skrydzio_kaina = $skrydis['galutine_kaina']*$keleiviu_skaicius;

$sql1 = "SELECT * FROM viesbuciai WHERE viesbucioid = '$viesbucio_id '";
$rez1 = $conn->query($sql1);
$viesbutis = $rez1->fetch_assoc();
$galutine_viesbucio_kaina = $viesbutis['kaina']*$keleiviu_skaicius;

if(!empty($_POST['paslaugos'])){

		$sql2 = "SELECT * FROM paslaugos WHERE ";
		$i = 0;
        foreach ($_POST['paslaugos'] as &$value) {
			$value = "".$value."";
			$sql2 = $sql2."paslaugosid = ".$value;
			if($i+1 != count($_POST['paslaugos'])){
				$sql2 = $sql2." OR ";
			}
			$i++;

        }
   
    $paslaugos = $conn->query($sql2);
      
    }

$bendra_paslaugu_kaina = 0;
$paslaugu_masyvas =[];
if($paslaugos->num_rows > 0){
	while ($row = $paslaugos->fetch_assoc()) {
        array_push($paslaugu_masyvas, $row['paslaugosid']);
		$bendra_paslaugu_kaina += $row['kaina']*$keleiviu_skaicius;
	}
    $paslaugu_masyvas = json_encode($paslaugu_masyvas);
    $_SESSION['paslaugos'] = $paslaugu_masyvas;
}

$galutine_kaina=$galutine_skrydzio_kaina+$galutine_viesbucio_kaina+$bendra_paslaugu_kaina;

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>-- Dive In Exploring -- Apmokėjimas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="stilius.css" rel="stylesheet">
	
  </head>
  <body>
 
  <div class="container-fluid fonas mb-2 pb-5 pt-5">   <!-- Logotipas -->
	<div class="row pt-5 pb-5 mt-2 mb-2">
		<div class="col text-white fst-italic d-flex justify-content-center">
			<a href="https://if180029.mokslas.vdu.lt" class="text-decoration-none text-white"><h1>-- Apmokėjimas --</h1></a>
		</div>
	</div>
  </div>
  
  
	<main class="container border border-3 rounded mt-3 col-md-4 col-10">
		
		<img src="https://40den.eu/user_files/Men_juht/Pangad_LT.png" class="img-fluid" alt="Responsive image">
		<?php echo'<h3 class="row fst-italic d-flex justify-content-center pt-3">Suma: '.$galutine_kaina.'</h3> ';?>
		<form action="ivykdymas.php" method="post">
            <?php
				echo '
				<input type="hidden" name="skrydzio_id" value="'.$skrydzio_id.'">
				<input type="hidden" name="viesbucio_id" value="'.$viesbucio_id.'">
				<input type="hidden" name="paslaugos" value="'.$paslaugu_masyvas.'">
				';

            ?> 
			<div class="col-auto d-flex justify-content-center mt-3 pb-3">
				<button class="btn btn-secondary" type="submit">Apmokėti</button>
			</div>
		</form>
	</main>
   
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
 </html>