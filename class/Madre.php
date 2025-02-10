<?php
require_once "class/Vacuno.php";

class Madre extends Vacuno {
    public function __construct(int $caravana, string $tipo = "Madre") {
        parent::__construct($caravana, $tipo);
    }

    public function getTipo(): string { 
        return "Madre";
    }
}



class MenuMadre {
    private Repository $repository;

    public function __construct($conection) {
        $this->repository = new Repository($conection);
    }

    public function mostrar() {
        echo "\n🛑 Menú de Alta de Madres 🛑\n";

        while (true) {
            $caravana = readline("Ingrese el número de Caravana (0 para volver): ");
            
            if ($caravana == "0") {
                echo "🔙 Volviendo al menú principal...\n";
                return;
            }

            if (!ctype_digit($caravana) || (int)$caravana <= 0) {
                echo "⚠️ Error: La caravana debe ser un número positivo.\n";
                continue; // ⬅️ Evita continuar si hay un error
            }

            $madre = new Madre((int)$caravana);
            // Obtenemos el mensaje directamente desde guardar()
            $resultado = $this->repository->guardar($madre);

            // Simplemente mostramos el resultado
            echo $resultado . "\n";
        }
    }
}
