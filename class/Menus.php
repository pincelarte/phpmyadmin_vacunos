<?php


//---------------------------------------------------------------------
abstract class Menu {
    protected $titulo;
    protected $opciones = []; 

    public function __construct($titulo) {
        $this->titulo = $titulo;
    }

    public function mostrarOpciones() {
        do {
            echo "\n{$this->titulo}\n";
            
            foreach ($this->opciones as $key => $opcion) {
                echo "$key. $opcion\n";
            }

            $opcionSeleccionada = readline("Seleccione una opción: ");

            if (!array_key_exists($opcionSeleccionada, $this->opciones)) {
                echo "⚠️ Opción inválida. Intente de nuevo.\n";
            }

        } while (!array_key_exists($opcionSeleccionada, $this->opciones));

        return $this->manejarOpcion($opcionSeleccionada);
    }

    abstract public function manejarOpcion($opcion);
}


//---------------------------------------------------------------------

class MenuPrincipal extends Menu {
    private $conection;

    public function __construct($conection) {
        parent::__construct("Menú Principal");
        $this->conection = $conection;  // Guardamos la conexión
        $this->opciones = [
            "1" => "Dar de alta una madre",
            "0" => "Salir"
        ];
    }

    public function manejarOpcion($opcion) {
        if ($opcion == "0") {
            echo "Saliendo del programa...\n";
            return false;
        } elseif ($opcion == "1") {
            $menuMadre = new MenuMadre($this->conection);
            $menuMadre->mostrar();
            return true;
        }
        return false;
    }
}


//---------------------------------------------------------------------
