<?php


class madre {
    private $caravana;
    
    public function __construct($caravana) {
        $this->caravana = $caravana;
        
    }

    public function getCaravana() {
        return $this->caravana;
    }

    public function setCaravana($caravana) {
        $this->caravana = $caravana;
    }    

    public function mostrarCaravana() {
        echo "Caravana: " . $this->getCaravana() . "<br>";
    }

}    