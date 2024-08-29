<?php

function obtenerLibros(){
    $libros = [
        [
            "titulo" => "Metro 2033",
            "autor" => "Dmitry Glukhovsky",
            "anio" => 2005,
            "genero" => "Ciencia Ficción"
        ],
        [
            "titulo" => "El Silmarillion",
            "autor" => "J.R.R. Tolkien",
            "anio" => 1977,
            "genero" => "Fantasía"
        ],
        [
            "titulo" => "Nacidos de la Bruma",
            "autor" => "Brandon Sanderson",
            "anio" => 2006,
            "genero" => "Fantasía"
        ],
        [
            "titulo" => "Festín de Cuervos",
            "autor" => "George R.R. Martin",
            "anio" => 2005,
            "genero" => "Fantasía"
        ],
        [
            "titulo" => "Los Propios Dioses",
            "autor" => "Isaac Asimov",
            "anio" => 1972,
            "genero" => "Ciencia Ficción"
        ]
    ];
    return $libros;
}

function mostrarDetallesLibro($libro){
    $html = "<div class = 'Libro'>";
    $html .= "<h2>" . $libro['titulo'] . "</h2>";
    $html .= "<p><strong>Autor:</strong> " . $libro['autor'] . "</p>";
    $html .= "<p><strong>Año:</strong> " . $libro['anio'] . "</p>";
    $html .= "<p><strong>Género:</strong> " . $libro['genero'] . "</p>";
    $html .= "</div>"; 
    return $html;
}
?>