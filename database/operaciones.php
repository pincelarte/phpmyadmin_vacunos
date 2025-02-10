<?php

function guardarCaravana($caravana, $tipo, $conection) {
    // Asegurarse de escapar las cadenas para evitar inyecciones de SQL
    $tipo = $conection->real_escape_string($tipo);
    
    // Inserción de la caravana y el tipo en la base de datos
    $query = "INSERT INTO vacunos (caravana, tipo) VALUES ('$caravana', '$tipo')";

    if ($conection->query($query) === TRUE) {
        // Retornamos un mensaje de éxito
        return "Caravana guardada correctamente en la base de datos.";
    } else {
        // Si hay un error, devolvemos el error
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
