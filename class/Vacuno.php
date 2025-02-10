<?php
abstract class Vacuno{
    protected int $caravana;
    protected string $tipo;

    public function __construct(int $caravana, string $tipo){
        $this->caravana = $caravana;
        $this->tipo = $tipo;
    }

    public function getCaravana(): int {
        return $this->caravana;
    }

    public function setCaravana(int $caravana) : void {
        $this->caravana = $caravana;
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function setTipo(string $tipo) : void {
        $this->tipo = $tipo;
    }

   

}


