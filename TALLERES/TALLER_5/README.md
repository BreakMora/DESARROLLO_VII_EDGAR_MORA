Sistema de Gestión de Estudiantes
Este sistema permite gestionar estudiantes en una institución educativa, facilitando operaciones como agregar estudiantes, calcular promedios, generar estadísticas y más. La clase principal es SistemaGestionEstudiantes, que utiliza la clase Estudiante para almacenar información sobre los alumnos.

Clase SistemaGestionEstudiantes
Atributos
$estudiantes: Arreglo que almacena objetos de la clase Estudiante.
$graduados: Arreglo que almacena objetos de estudiantes que se han graduado.
Métodos
__construct()
Inicializa los arreglos $estudiantes y $graduados.

agregarEstudiante(Estudiante $estudiante)
Agrega un nuevo estudiante al sistema. Recibe un objeto de la clase Estudiante y lo almacena en el arreglo $estudiantes, utilizando el ID del estudiante como clave.

obtenerEstudiante($id)
Retorna un estudiante por su ID. Si el ID no existe, retorna null.

buscarEstudiantes($query)
Busca estudiantes por nombre o carrera. Acepta una cadena de búsqueda y devuelve un arreglo de estudiantes que coinciden (insensible a mayúsculas/minúsculas).

listarEstudiantes()
Retorna un arreglo con todos los estudiantes registrados en el sistema.

calcularPromedioGeneral()
Calcula y retorna el promedio general de todas las calificaciones de los estudiantes. Si no hay estudiantes, retorna 0.

obtenerEstudiantesPorCarrera($carrera)
Devuelve un arreglo de estudiantes que pertenecen a una carrera específica.

generarEstadisticasPorCarrera()
Genera estadísticas sobre cada carrera, incluyendo el número de estudiantes, el promedio general y el mejor estudiante por carrera.

obtenerMejorEstudiante()
Devuelve el estudiante con el promedio más alto de todos los registrados en el sistema.

generarReporteRendimiento()
Genera un reporte del rendimiento de cada materia, que incluye el promedio de calificaciones, la calificación más alta y la más baja.

graduarEstudiante($id)
Graduar a un estudiante, eliminándolo del sistema y agregándolo al arreglo de graduados.

generarRanking()
Genera un ranking de estudiantes basado en su promedio, ordenándolos de mayor a menor.

Requisitos
Para ejecutar este sistema, asegúrate de tener una implementación de la clase Estudiante que contenga los métodos y atributos requeridos.
