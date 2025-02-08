<?php
// database/operaciones.php

// Función para guardar la caravana en la base de datos
function guardarCaravana($caravana, $conection) {
    $query = "INSERT INTO vacunos (caravana) VALUES ('$caravana')";

    if ($conection->query($query) === TRUE) {
        return "Caravana guardada correctamente en la base de datos.";
    } else {
        return "Error al guardar la caravana: " . $conection->error;
    }
}

// Función para cargar las caravanas desde la base de datos
function cargarCaravanas($conection) {
    $query = "SELECT * FROM vacunos";
    $result = $conection->query($query);

    if ($result->num_rows > 0) {
        $caravanas = [];
        while ($row = $result->fetch_assoc()) {
            $caravanas[] = $row['caravana'];
        }
        return $caravanas;
    } else {
        return "No hay caravanas en la base de datos.";
    }
}
?>
