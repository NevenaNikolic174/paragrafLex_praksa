<?php
header("Content-type: application/json");

if(isset($_POST['dugmePotvrda'])){ 
    include '../config/connection.php';
    include 'db.php';

    try {
        $greske = 0;

        $imePrezime = $_POST['imePrezime'];
        $datumRodjenja = $_POST['datumRodjenja'];
        $brojPasosa = $_POST['brojPasosa'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $datumOd = $_POST['datumOd'];
        $datumDo = $_POST['datumDo'];
        $vrstaOsiguranja = $_POST['vrstaOsiguranja'];

        $regImePrezime = '/^[a-zA-Z]+\s[a-zA-Z]+$/';
        $regBrojPasosa = '/^[0-9]{9}$/';
        $regTelefon = '/^06[0-9]{7,10}$/';
        $regEmail = '/^[a-z0-9.]+@(gmail\.com|yahoo\.com|outlook\.com)$/';
        $regDatum = '/^(0?[1-9]|[12]\d|3[01])\.(0?[1-9]|1[0-2])\.\d{4}\.$/';

        if(empty($imePrezime) || empty($datumRodjenja) || empty($brojPasosa) || empty($telefon) ||
           empty($email) || empty($datumOd) || empty($datumDo)){
            $greske++;
        }
        if(!preg_match($regImePrezime, $imePrezime) || !preg_match($regBrojPasosa, $brojPasosa) ||
           !preg_match($regTelefon, $telefon) || !preg_match($regEmail, $email) || 
           !preg_match($regDatum, $datumOd) || !preg_match($regDatum, $datumDo)){
            $greske++;
        }
        if($vrstaOsiguranja != "1" && $vrstaOsiguranja != "2") {
            $greske++;
        }
       

        if($greske != 0){
            echo json_encode(["success" => false, "message" => "Doslo je do greske prilikom obrade podataka na serveru."]);
        } else {

            $datumOdBazniFormat = date('Y-m-d', strtotime($datumOd));
            $datumDoBazniFormat = date('Y-m-d', strtotime($datumDo));
           
            $upis = upisUBazu($imePrezime, $datumRodjenja, $brojPasosa, $telefon, $email, $datumOdBazniFormat, $datumDoBazniFormat, $vrstaOsiguranja);
            if($upis) {
                if($vrstaOsiguranja == "2"){
                    $idNosilac = $conn->lastInsertId();
                    $imePrezimeDodatno = $_POST['imePrezimeDodatno'];
                    $datumRodjenjaDodatno = $_POST['datumRodjenjaDodatno'];
                    $brojPasosaDodatno = $_POST['brojPasosaDodatno'];

                    $upisDodatnihLica = upisDodatnihLica($idNosilac, $imePrezimeDodatno, $datumRodjenjaDodatno, $brojPasosaDodatno);
                }
                echo json_encode(["success" => true, "message" => "Podaci su uspesno upisani!"]);
            } else {
                echo json_encode(["success" => false, "message" => "Doslo je do greske prilikom upisa podataka u bazu."]);
            }
        }
    } catch(PDOException $e) {
     
        echo json_encode(["success" => false, "message" => "Greska na serveru: " . $e->getMessage()]);
    }
}
?>
