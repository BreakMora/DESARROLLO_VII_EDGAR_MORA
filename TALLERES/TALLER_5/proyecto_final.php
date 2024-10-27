<?php

class Estudiante{
    private $id;
    private $nombre;
    private $carrera;
    private $edad;
    private $materias;
    private $flags;
    
    public function __construct($id, $nombre, $carrera, $edad) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->carrera = $carrera;
        $this->edad = $edad;
        $this->materias = [];
        $this->flags = [];
    }

    public function agregarMateria($materia, $calificacion){
        $this->materias[$materia] = $calificacion;
        $this->evaluarFlags();
    }

    public function obtenerPromedio() : float {
        if(count($this->materias) > 0){
            $totalSuma = array_sum($this->materias);
            $promedio = $totalSuma / count($this->materias);
            return $promedio;
        } else {
            return 0.0;
        }
    }

    public function obtenerDetalles() {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'edad' => $this->edad,
            'carrera' => $this->carrera,
            'materias' => $this->materias,
            'promedio' => $this->obtenerPromedio(),
            'flags' => $this->flags
        ];
    }

    private function evaluarFlags() {
        $promedio = $this->obtenerPromedio();
        if ($promedio < 60) {
            $this->flags[] = 'en riesgo académico';
        }
        if ($promedio >= 90) {
            $this->flags[] = 'honor roll';
        }
    }

    public function __toString() {
        $materiasStr = '';
        foreach ($this->materias as $materia => $calificacion) {
            $materiasStr .= "$materia: $calificacion, ";
        }
        $materiasStr = rtrim($materiasStr, ', '); // Eliminar la última coma

        return "ID: $this->id, Nombre: $this->nombre, Edad: $this->edad, Carrera: $this->carrera, Materias: [$materiasStr], Promedio: " . number_format($this->obtenerPromedio(), 2);
    }
}

    class SistemaGestionEstudiantes {
        private $estudiantes; // Arreglo para almacenar los objetos Estudiante
        private $graduados; // Arreglo para almacenar los graduados
    
        // Constructor
        public function __construct() {
            $this->estudiantes = [];
            $this->graduados = [];
        }
    
        // Método para agregar un nuevo estudiante al sistema
        public function agregarEstudiante(Estudiante $estudiante) {
            $this->estudiantes[$estudiante->obtenerDetalles()['id']] = $estudiante;
        }
    
        // Método para obtener un estudiante por su ID
        public function obtenerEstudiante($id) {
            return $this->estudiantes[$id] ?? null; // Retorna el estudiante o null si no existe
        }
    
        // Método para buscar estudiantes por nombre o carrera
        public function buscarEstudiantes($query) {
            $resultados = [];
            $query = strtolower($query); // Convierte a minúsculas para búsqueda insensible a mayúsculas
    
            foreach ($this->estudiantes as $estudiante) {
                if (strpos(strtolower($estudiante->obtenerDetalles()['nombre']), $query) !== false ||
                    strpos(strtolower($estudiante->obtenerDetalles()['carrera']), $query) !== false) {
                    $resultados[] = $estudiante; // Añade el estudiante a los resultados si coincide
                }
            }
    
            return $resultados; // Retorna los estudiantes encontrados
        }
    
        // Método para listar todos los estudiantes
        public function listarEstudiantes() {
            return $this->estudiantes;
        }
    
        // Método para calcular el promedio de todos los estudiantes
        public function calcularPromedioGeneral() {
            $totalPromedio = 0;
            $numEstudiantes = count($this->estudiantes);
            
            foreach ($this->estudiantes as $estudiante) {
                $totalPromedio += $estudiante->obtenerPromedio();
            }
    
            return $numEstudiantes > 0 ? round($totalPromedio / $numEstudiantes, 2) : 0; // Retorna el promedio general
        }
    
        // Método para obtener estudiantes de una carrera específica
        public function obtenerEstudiantesPorCarrera($carrera) {
            $estudiantesCarrera = [];
            
            foreach ($this->estudiantes as $estudiante) {
                if ($estudiante->obtenerDetalles()['carrera'] === $carrera) {
                    $estudiantesCarrera[] = $estudiante;
                }
            }
    
            return $estudiantesCarrera; // Retorna el arreglo de estudiantes de la carrera específica
        }
    
        // Método para generar estadísticas por carrera
        public function generarEstadisticasPorCarrera() {
            $estadisticas = [];
    
            foreach ($this->estudiantes as $estudiante) {
                $carrera = $estudiante->obtenerDetalles()['carrera'];
                if (!isset($estadisticas[$carrera])) {
                    $estadisticas[$carrera] = [
                        'numEstudiantes' => 0,
                        'promedioGeneral' => 0,
                        'mejorEstudiante' => null
                    ];
                }
    
                $estadisticas[$carrera]['numEstudiantes']++;
                $estadisticas[$carrera]['promedioGeneral'] += $estudiante->obtenerPromedio();
    
                // Determina si es el mejor estudiante
                if ($estadisticas[$carrera]['mejorEstudiante'] === null || 
                    $estudiante->obtenerPromedio() > $estadisticas[$carrera]['mejorEstudiante']->obtenerPromedio()) {
                    $estadisticas[$carrera]['mejorEstudiante'] = $estudiante;
                }
            }
    
            // Calcular promedios generales
            foreach ($estadisticas as $carrera => &$info) {
                if ($info['numEstudiantes'] > 0) {
                    $info['promedioGeneral'] = round($info['promedioGeneral'] / $info['numEstudiantes'], 2);
                }
            }
    
            return $estadisticas; // Retorna las estadísticas por carrera
        }
    
        // Método para obtener el estudiante con el promedio más alto
        public function obtenerMejorEstudiante() {
            $mejorEstudiante = null;
            
            foreach ($this->estudiantes as $estudiante) {
                if ($mejorEstudiante === null || $estudiante->obtenerPromedio() > $mejorEstudiante->obtenerPromedio()) {
                    $mejorEstudiante = $estudiante;
                }
            }
    
            return $mejorEstudiante; // Retorna el estudiante con el promedio más alto
        }
    
        // Método para generar un reporte de rendimiento
        public function generarReporteRendimiento() {
            $reporte = [];
            
            foreach ($this->estudiantes as $estudiante) {
                $detalles = $estudiante->obtenerDetalles();
                foreach ($detalles['materias'] as $materia => $calificacion) {
                    if (!isset($reporte[$materia])) {
                        $reporte[$materia] = [
                            'total' => 0,
                            'cantidad' => 0,
                            'calificaciones' => []
                        ];
                    }
                    $reporte[$materia]['total'] += $calificacion;
                    $reporte[$materia]['cantidad']++;
                    $reporte[$materia]['calificaciones'][] = $calificacion;
                }
            }
    
            // Calcular promedios, calificaciones más alta y más baja
            foreach ($reporte as $materia => $info) {
                $promedio = $info['total'] / $info['cantidad'];
                $reporte[$materia]['promedio'] = round($promedio, 2);
                $reporte[$materia]['maxima'] = max($info['calificaciones']);
                $reporte[$materia]['minima'] = min($info['calificaciones']);
            }
    
            return $reporte; // Retorna el reporte
        }
    
        // Método para graduar a un estudiante
        public function graduarEstudiante($id) {
            if (isset($this->estudiantes[$id])) {
                $this->graduados[$id] = $this->estudiantes[$id]; // Guarda el estudiante en graduados
                unset($this->estudiantes[$id]); // Elimina al estudiante del sistema
            }
        }
    
        // Método para generar ranking de estudiantes por promedio
        public function generarRanking() {
            usort($this->estudiantes, function($a, $b) {
                return $b->obtenerPromedio() <=> $a->obtenerPromedio(); // Ordena por promedio de forma descendente
            });
            return $this->estudiantes; // Retorna el ranking
        }
    }
?>