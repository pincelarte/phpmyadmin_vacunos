<?php
abstract class Vacuno{
    protected int $caravana;

    public function __construct(int $caravana){
        $this->caravana = $caravana;
    }

    public function getCaravana(): int {
        return $this->caravana;
    }

    public function setCaravana(int $caravana) : void {
        $this->caravana = $caravana;
    }

    abstract public function obtenerTipo(): string;

   

}


