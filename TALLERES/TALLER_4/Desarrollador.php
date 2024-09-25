<?php

require_once 'Empleado.php';

class Desarrollador extends Empleado implements Evaluable {
    private $lenguaje_prog;
    private $experiencia;

    public function __construct($nombre, $ID_empleado, $salario_base, $lenguaje_prog, $experiencia){
        parent::__construct($nombre, $ID_empleado, $salario_base);
        $this->lenguaje_prog = $lenguaje_prog;
        $this->experiencia = $experiencia;
    }

    public function getLenguajeProg() {
        return $this->lenguaje_prog;
    }
    
    public function getAniosExperiencia(){
        return $this->experiencia;
    }

    public function evaluarDesempenio($desempeño){
        
        if ($desempeño == 0){
            $evaluacion = 'Pobre';
        } elseif ($desempeño > 0 && $desempeño < 3) {
            $evaluacion = 'No cumplio con sus obligaciones';
        } elseif ($desempeño >= 3 && $desempeño < 5){
            $evaluacion = 'Cumplio con sus obligaciones';
        } elseif ($desempeño == 5){
            $evaluacion = 'Excepcional';
        } else {
            $evaluacion = 'No ingreso una evaluacion dentro del rango esperado';
        }
        return $evaluacion;
    }
}