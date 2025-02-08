<?php

require_once "class/Vacuno.php";
require_once "class/Madre.php";  
require_once "database/operaciones.php";
require_once "database/conection.php";  


$vacunoTipo = $_POST['vacuno'];  
$caravana = $_POST['caravana'];  


if ($vacunoTipo == 'vaca') {
    $vacuno = new Madre($caravana); 
} else {
    
    $vacuno = new Vacuno($caravana);  
}


$repository = new Repository($conection);  
$repository->guardar($vacuno);  


echo "Vacuno agregado con éxito!";
?>
