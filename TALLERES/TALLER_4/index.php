<?php
require_once 'Empresa.php';
require_once 'Gerente.php';
require_once 'Desarrollador.php';

$empresa = new Empresa();

$empleados = [
    new Gerente("Laura Gómez", 101, 5000, "Ventas"),
    new Gerente("Carlos Ruiz", 102, 6000, "Marketing"),
    new Desarrollador("Ana Torres", 201, 4000, "PHP", 4),
    new Desarrollador("Miguel Hernández", 202, 4500, "JavaScript", 2),
    new Desarrollador("Sara Méndez", 203, 4200, "Python", 3),
];

foreach ($empleados as $empleado) {
    $empresa->ingresarEmpleado($empleado);
}

echo "Lista de Empleados:<br>";
echo $empresa->listaEmpleados();
echo "<br>";

echo "Cálculo de Nómina Total:<br>";
echo $empresa->calcularNominaTotal();
echo "<br>";
echo "<br>";

$desempeño = 4;
echo "Evaluaciones de Desempeño:<br>";
echo $empresa->realizarEvaluaciones($desempeño);
echo "<br>";

$bono = 1000;
echo "<h3>Asignación de Bono:</h3>";
echo "Nuevo salario de " . $empleados[0]->getNombre() . " departamento de " . $empleados[0]->getDepartamento() . " con bono de $bono: " . $empleados[0]->asignarBono($bono);