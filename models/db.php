<?php 

function upisUBazu($imePrezime, $datumRodjenja, $brojPasosa, $telefon, $email, 
                   $datumOdBazniFormat, $datumDoBazniFormat, $vrstaOsiguranja) {
    
    global $conn;

    $upit = "INSERT INTO nosilac (ime_prezime, datum_rodjenja, broj_pasos, telefon, email, datum_od, datum_do, id_polisa) 
             VALUES (:imePrezime, :datumRodjenja, :brojPasosa, :telefon, :email, :datumOd, :datumDo, :polisa)";

    $unos = $conn->prepare($upit);
    $unos->bindParam(":imePrezime", $imePrezime);
    $unos->bindParam(":datumRodjenja", $datumRodjenja);
    $unos->bindParam(":brojPasosa", $brojPasosa);
    $unos->bindParam(":telefon", $telefon);
    $unos->bindParam(":email", $email);
    $unos->bindParam(":datumOd", $datumOdBazniFormat);
    $unos->bindParam(":datumDo", $datumDoBazniFormat);
    $unos->bindParam(":polisa", $vrstaOsiguranja);

    $rezultat = $unos->execute();
    return $rezultat;
}

function upisDodatnihLica($idNosilac, $imePrezimeDodatno, $datumRodjenjaDodatno,  $brojPasosaDodatno){

    global $conn;

    $upit = "INSERT INTO dodatna_lica (id_nosilac, ime_prezime, datum_rodjenja, broj_pasosa) 
             VALUES (:idNosilac, :imePrezimeDodatno, :datumRodjenjaDodatno, :brojPasosaDodatno)";

    $unos = $conn->prepare($upit);
    $unos->bindParam(":idNosilac", $idNosilac);
    $unos->bindParam(":imePrezimeDodatno", $imePrezimeDodatno);
    $unos->bindParam(":datumRodjenjaDodatno", $datumRodjenjaDodatno);
    $unos->bindParam(":brojPasosaDodatno", $brojPasosaDodatno);
   

    $rezultat = $unos->execute();
    return $rezultat;
}

function dohvati($table){

    global $conn;

    $upit = "SELECT * FROM $table";

    $prikaz = $conn->query($upit);
    $prikaz->execute();
    $rezultat = $prikaz->fetchAll();

    return $rezultat;
}

function dohvatiDodatnaLica($idNosilac) {

    global $conn;

    $upit = "SELECT * 
             FROM dodatna_lica 
             WHERE id_nosilac = :id_nosilac";

    $prikaz = $conn->prepare($upit);
    $prikaz->bindParam(':id_nosilac', $idNosilac);
    $prikaz->execute();
    return $prikaz->fetchAll();
}

?>