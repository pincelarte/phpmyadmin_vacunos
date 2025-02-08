
<?php

$server = "localhost";
$user = "root"; 
$pass = "";
$dbname = "vacunos2";
$socket = "/opt/lampp/var/mysql/mysql.sock";

$conection = new mysqli($server, $user, $pass, $dbname, null, $socket);

if ($conection->connect_error) {
    die("Conexión fallida: " . $conection->connect_error);
}
?>
