<?php
require_once 'Gerente.php';
require_once 'Desarrollador.php';
require_once 'Evaluable.php';

class Empresa{
    private $empleados = [];

    public function ingresarEmpleado($empleado){
        $this->empleados[] = $empleado;
    }

    public function listaEmpleados(){
        $colaborador = '';
        foreach ($this->empleados as $empleado){
            $colaborador .= "Empleado: ". $empleado->getNombre() ."<br>";
        }
        if ($colaborador == null){
            return $colaborador = 'No hay empleados registrados';
        }
        return $colaborador;
    }

    public function calcularNominaTotal() {
        $total = 0;
        foreach ($this->empleados as $empleado) {
            $total += $empleado->getSalario_Base();
        }
        return "Nómina total: $total";
    }

    
    public function realizarEvaluaciones($desempeño) {
        $evaluaciones = '';
        foreach ($this->empleados as $empleado) {
            if ($empleado instanceof Evaluable) {
                $evaluaciones .= "Evaluando a " . $empleado->getNombre() . ": " . $empleado->evaluarDesempenio($desempeño) . "<br>";
            }
        }
        if ($evaluaciones == '') {
            return 'No hay empleados evaluables.';
        }
        return $evaluaciones;
    }
}
/*
$empresa = new Empresa();

$gerente = new Gerente("Laura", 12345, 5000, "Ventas");
$desarrollador = new Desarrollador("Juan", 67890, 4000,'python', 3);

$empresa->ingresarEmpleado($gerente);
$empresa->ingresarEmpleado($desarrollador);

echo "<h3>Lista de Empleados:</h3>";
echo $empresa->listaEmpleados();

echo "<h3>Nómina Total:</h3>";
echo $empresa->calcularNominaTotal();

$desempeño = 4;
echo "<h3>Evaluaciones de Desempeño:</h3>";
echo $empresa->realizarEvaluaciones($desempeño);
*/

