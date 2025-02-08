<?php
require_once "class/Vacuno.php";

class Madre extends Vacuno{
        
    public function __construct(int $caravana) {
        
        parent::__construct($caravana);
    }
    public function obtenerTipo(): string {
        return "Madre";
}   
} 

