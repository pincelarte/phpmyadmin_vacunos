<?php

class Repository {
    private $conection;

    public function __construct($conection) {
        $this->conection = $conection;
        
        if ($this->conection->connect_error) {
            die("Conexión fallida: " . $this->conection->connect_error);
        } else {
            echo "-------------------------------" . PHP_EOL;
            echo "Conexión exitosa en Repository." . PHP_EOL;
            echo "-------------------------------" . PHP_EOL;  
        }
    }

    public function guardar($objeto): void {
        if ($objeto instanceof Vacuno) {
            $caravana = $objeto->getCaravana();
            
            if (!is_int($caravana) || $caravana <= 0) {
                echo "La caravana $caravana no es válida.";
                return;
            }
            
            if ($this->existeCaravana($caravana)) {
                echo "La caravana $caravana ya existe en la base de datos." . PHP_EOL;
                return;
            }

            $mensaje = guardarCaravana($caravana, $this->conection);
            
            if ($mensaje === "Caravana guardada correctamente en la base de datos.") {
                echo $mensaje . PHP_EOL;
            } else {
                echo "Error al guardar la caravana: " . $mensaje . "<br>";
            }
        } else {
            echo "El objeto no es una instancia de Vacuno o sus derivados.<br>";
        }
    }

    public function cargar(): void {
        $caravanas = cargarCaravanas($this->conection);
        
        if (is_array($caravanas)) {
            if (count($caravanas) > 0) {
                foreach ($caravanas as $caravana) {
                    echo "Caravana: $caravana" . PHP_EOL;
                }
            } else {
                echo "No se encontraron caravanas en la base de datos." . PHP_EOL;
                    }
        } else {
            echo "Error al cargar las caravanas: " . $caravanas . PHP_EOL;
        }
    }

    private function existeCaravana($caravana): bool {
        $query = "SELECT COUNT(*) AS count FROM vacunos WHERE caravana = '$caravana'";
        $result = $this->conection->query($query);
        
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['count'] > 0;
        }

        return false;
    }
}
?>
