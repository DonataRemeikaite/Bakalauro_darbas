<?php
require_once 'sesija.php';

$vardas = $_POST['Name'];
$pavarde = $_POST['LastName'];
$gimimodata = $_POST['BirthDate'];
$elpastas = $_POST['Email'];
$prisvardas = $_POST['Username'];
$slaptazodis = $_POST['Password'];

if(!empty($_POST['Name']) && !empty($_POST['LastName']) && !empty($_POST['BirthDate']) && !empty($_POST['Email']) && !empty($_POST['Username']) && !empty($_POST['Password'])){
    $slap = password_hash($slaptazodis, PASSWORD_DEFAULT);
    $sql = "SELECT pr_vardas FROM vartotojai WHERE pr_vardas = '".$prisvardas."'";
    $rez = $conn->query($sql);
    if($rez->num_rows == 0){
        $sql2 = "INSERT INTO vartotojai (vardas, pavarde, gimimo_data, el_pastas, pr_vardas, slaptazodis) VALUES ('".$vardas."','".$pavarde."','".$gimimodata."','".$elpastas."','".$prisvardas."','".$slap."')";
        $conn->query($sql2);
        header("location: prisijungimas.php");
    }
    else{
        header("location: registracija.php?klaida=egzistuoja");
    }
}
else{
    header("location: registracija.php?klaida=neivesta");
}


$conn->close();
?>