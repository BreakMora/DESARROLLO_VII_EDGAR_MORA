<?php

require_once 'Empleado.php';
require_once 'Evaluable.php';

class Gerente extends Empleado implements Evaluable{

    private $departamento;
    private $bono = 0;

    public function __construct($nombre, $ID_empleado, $salario_base, $departamento){
        parent::__construct($nombre, $ID_empleado, $salario_base);
        $this->departamento = $departamento;
    }

    public function getBono_Asignado() {
        return $this->bono;
    }
    
    public function getDepartamento(){
        return $this->departamento;
    }

    public function asignarBono($bono){
        $salario = $this->getSalario_Base() + $bono;
        return $salario;
    }

    public function evaluarDesempenio($desempeño){
        
        if ($desempeño == 0){
            $evaluacion = 'Pobre';
        } elseif ($desempeño > 0 && $desempeño < 3) {
            $evaluacion = 'Por debajo de los esperado';
        } elseif ($desempeño >= 3 && $desempeño < 5){
            $evaluacion = 'Promedio';
        } elseif ($desempeño == 5){
            $evaluacion = 'Por encima del nivel';
        } else {
            $evaluacion = 'No ingreso una evaluacion dentro del rango esperado';
        }
        return $evaluacion;
    }
}
    /*
    $Gerente = new Gerente("Laura", 12345, 5000, "Ventas");
    

    // Mostrar información actualizada
    echo "Salario base: " . $Gerente->get_Salario_Base() . "<br>"; 
    echo "Salario total (con bono): " . $Gerente->asignar_Bono_Salarial(1000) . "<br>";
    echo "Departamento: " . $Gerente->get_Departamento() . "<br>";
    */