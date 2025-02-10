<?php


require_once "database/operaciones.php";
require_once "database/conection.php";  
require_once "class/Madre.php";     
require_once "class/Repository.php";
require_once "class/Vacuno.php";
require_once "class/Menus.php";


$menuPrincipal = new MenuPrincipal($conection);


while ($menuPrincipal->mostrarOpciones()) {
    
}

?>



