<?php
require_once 'sesija.php';

$pavadinimas = $_POST['pavadinimas'];
$kryptis_is = $_POST['kryptis_is'];
$kryptis_i = $_POST['kryptis_i'];
$atvykimo_data_nepakeista = $_POST['atvykimo_data'];
$isvykimo_data_nepakeista = $_POST['isvykimo_data'];
$atvykimo_data = explode(" ",$atvykimo_data_nepakeista)[0];
$isvykimo_data = explode(" ",$isvykimo_data_nepakeista)[0];
$zvaigzdutes = $_POST['zvaigzdutes'];
$maitinimas = $_POST['maitinimas'];
$vieta = $_POST['vieta'];
$tema = $_POST['tema'];
$kaina = $_POST['kaina'];
$aprasymas = $_POST['aprasymas'];
$nuotraukos = $_POST['files'];
 

	$sql = "INSERT INTO viesbuciai (pavadinimas, kryptis_is, kryptis_i, atvykimo_data, isvykimo_data, zvaigzdutes, maitinimas, vieta, tema, kaina, aprasymas)
VALUES ('$pavadinimas', '$kryptis_is','$kryptis_i','$atvykimo_data','$isvykimo_data','$zvaigzdutes','$maitinimas','$vieta','$tema','$kaina','$aprasymas')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
} 

//NUOTRAUKOS				nuotraukų įkėlimo į duomenų bazę kodo fragmentas pasisikolintas iš: https://www.codexworld.com/upload-multiple-images-store-in-database-php-mysql/
if(isset($_FILES['files'])){ 
   

    $targetDir = "./uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "(  $last_id,'".$fileName."'),"; 
                    
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
        // Error message 
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
       
        if(!empty($insertValuesSQL)){ 
            

            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            print_r($insertValuesSQL);
            $sql = "INSERT INTO nuotraukos (viesbucio_id, nuotraukos_url) VALUES $insertValuesSQL";
        

            $insert = $conn->query($sql); 
           
            if($insert){ 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = "Upload failed! ".$errorMsg; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
   
} 

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

	<a class="text-decoration-none link-secondary mb-3" href="Admin_viesbuciai.php">Atgal</a>
	<span class="d-flex justify-content-center fw-bold mb-3">Viešbučio pridėjimas</span>

	<form action="" method="POST" enctype="multipart/form-data">
	
		
		<input type="text" class="form-control mb-3" placeholder="Pavadinimas" name="pavadinimas"/>
		
		<input type="text" class="form-control mb-3" placeholder="Kryptis iš" name="kryptis_is"/>
		
		<input type="text" class="form-control mb-3" placeholder="Kryptis į" name="kryptis_i"/>
		
		<input type="date" class="form-control mb-3" placeholder="Atvykimo_data" name="atvykimo_data"/>
		
		<input type="date" class="form-control mb-3" placeholder="Išvykimo_data" name="isvykimo_data"/>
		
		<input type="number" class="form-control mb-3" placeholder="Žvaigždutės" min="1" max="5" name="zvaigzdutes"/>
		
		<input type="text" class="form-control mb-3" placeholder="Maitinimas" name="maitinimas"/>
		
		<input type="text" class="form-control mb-3" placeholder="Viešbučio vieta" name="vieta"/>
		
		<input type="text" class="form-control mb-3" placeholder="Viešbučio tema" name="tema"/>
		
		<input type="number" step="0.01" class="form-control mb-3" placeholder="Kaina" min="0" name="kaina"/>
		
		<input type="text" class="form-control mb-3 inpt-lg" placeholder="Aprašymas" name="aprasymas"/>
		
        <input type="file"  class="form-control mb-3" placeholder="Nuotraukos" name="files[]" multiple>

		<div class="col d-flex justify-content-end">
			<button class="btn btn-outline-secondary" type='submit'> Pridėti </button>
		</div>
	</form>
  </div>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>