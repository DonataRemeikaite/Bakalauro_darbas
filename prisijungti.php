<?php
session_start();
$servername = "localhost";
$username = "if180029";
$password = "yb*EGYVcWzZL";
$dbname = "if180029";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$prisvardas = $_POST['Username'];
$slaptazodis = $_POST['Password'];

if(!empty($_POST['Username']) && !empty($_POST['Password'])){
    $sql = "SELECT * FROM vartotojai WHERE pr_vardas = '".$prisvardas."'";
    $rez = $conn->query($sql);
    if($rez->num_rows > 0){
        $eil = $rez->fetch_assoc();
        if(password_verify($slaptazodis, $eil["slaptazodis"])){
            $_SESSION['vartid'] = $eil["vartid"];
            $_SESSION['vardas'] = $eil["vardas"];
            $_SESSION['tipas'] = $eil["tipas"];
			$_SESSION['pavarde'] = $eil["pavarde"];
			$_SESSION['el.pastas'] = $eil["el_pastas"];
			$_SESSION['gimimo_data'] = $eil["gimimo_data"];
			
            
            if($eil["tipas"] == "admin")
            {
                header("location: Admin_skrydziai.php");
            }
            else{
					header("location: index.php");
				
            }
        }
        else{
            header("location: prisijungimas.php?klaida=neteisingai");
        }
    }
    else{
        header("location: prisijungimas.php?klaida=neegzistuoja");
    }
}
else{
    header("location: prisijungimas.php?klaida=neivesta");
}


$conn->close();
?>