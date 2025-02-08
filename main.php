<?php

require_once "database/operaciones.php";
require_once "database/conection.php";  
require_once "class/Madre.php";     
require_once "class/Repository.php";
require_once "class/Vacuno.php";

$repository = new Repository($conection);

$madre = new Madre(666);  

$repository->guardar($madre);
$repository->cargar();





?>
