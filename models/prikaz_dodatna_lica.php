<?php
include '../config/connection.php';
include 'db.php';

if (isset($_POST['idNosilac'])) {
    try {
        $idNosilac = $_POST['idNosilac'];
        $prikaz = dohvatiDodatnaLica($idNosilac);
        echo json_encode($prikaz); 
    } catch (PDOException $e) {
        echo json_encode(array("error" => "Greska na serveru: " . $e->getMessage()));
    }
} else {
    echo json_encode(array("error" => "Nema dostupnog ID-a nosioca osiguranja."));
}
?>
