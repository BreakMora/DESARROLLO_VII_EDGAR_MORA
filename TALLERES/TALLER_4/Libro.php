<?php

require_once 'Prestable.php';

class Libro {
    public $titulo;
    public $autor;
    public $anioPublicacion;
    private $disponible = true;

    public function __construct($titulo, $autor, $anioPublicacion) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anioPublicacion = $anioPublicacion;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = trim($titulo);
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = trim($autor);
    }

    public function getAnioPublicacion() {
        return $this->anioPublicacion;
    }

    public function setAnioPublicacion($anio) {
        $this->anioPublicacion = intval($anio);
    }

    public function obtenerInformacion() {
        return "'{$this->titulo}' por {$this->autor}, publicado en {$this->anioPublicacion}";
    }

    public function prestar() {
        if ($this->disponible) {
            $this->disponible = false;
            return true;
        }
        return false;
    }

    public function devolver() {
        $this->disponible = true;
    }

    public function estaDisponible() {
        return $this->disponible;
    }
}

// Ejemplo de uso
/*$miLibro = new Libro("Cien años de soledad", "Gabriel García Márquez", 1967);
echo $miLibro->obtenerInformacion();
echo "<br>Título: " . $miLibro->getTitulo();*/

$libro = new Libro("Rayuela", "Julio Cortázar", 1963);
echo $libro->obtenerInformacion() . "<br>";
echo "Disponible: " . ($libro->estaDisponible() ? "Sí" : "No") . "<br>";
$libro->prestar();
echo "Disponible después de prestar: " . ($libro->estaDisponible() ? "Sí" : "No") . "<br>";
$libro->devolver();
echo "Disponible después de devolver: " . ($libro->estaDisponible() ? "Sí" : "No") . "<br>";