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

    public function guardar($objeto): string {  // Cambié el tipo de retorno a string para que devuelva un mensaje
        if ($objeto instanceof Vacuno) {
            $caravana = $objeto->getCaravana();
            $tipo = $objeto->getTipo();
            
            if (!is_int($caravana) || $caravana <= 0) {
                return "⚠️ La caravana $caravana no es válida.\n";
            }
            
            if ($this->existeCaravana($caravana)) {
                return "⚠️ La caravana $caravana ya existe en la base de datos.\n";
            }
        
            // Llamamos a guardarCaravana() y retornamos el mensaje
            return guardarCaravana($caravana, $tipo, $this->conection);
        } else {
            return "❌ El objeto no es una instancia de Vacuno o sus derivados.\n";
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
                echo "No se encontraron vacunos en la base de datos." . PHP_EOL;
                    }
        } else {
            echo "Error al cargar los vacunos: " . $caravanas . PHP_EOL;
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
