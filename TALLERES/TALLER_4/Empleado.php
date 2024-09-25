<?php

Class Empleado {
    private $nombre;
    private $ID_empleado;
    private $salario_base;

    public function __construct($nombre, $ID_empleado, $salario_base){
        $this->nombre = $nombre;
        $this->ID_empleado = $ID_empleado;
        $this->salario_base = $salario_base;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getID_Empleado(){
        return $this->ID_empleado;
    }

    public function setID_Empleado($ID_empleado) {
        $this->ID_empleado = $ID_empleado;
    }

    public function setSalario_Base($salario_base) {
        $this->salario_base = $salario_base;
    }

    public function getSalario_Base(){
        return $this->salario_base;
    }

}