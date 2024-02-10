<?php
session_start();

include "config/connection.php";
include "models/db.php";

include "views/fixed/head.php";
include 'views/fixed/nav.php';


if(isset($_GET['page'])){
    switch($_GET['page']){
        case 'prikaz':
            include 'views/pages/prikaz.php';
            break;
        default: 
            include 'views/pages/home.php';
    }

}else {
    include 'views/pages/home.php';
}

include 'views/fixed/footer.php';


?>