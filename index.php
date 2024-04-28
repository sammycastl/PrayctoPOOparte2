<?php
// Cargar los archivos de clases necesarios
require_once 'Controller/ProyectoPOODenunciaController.php'; 
require_once 'Model/Usuario.php';
require_once 'Model/Expediente.php';
require_once 'Model/Denuncia.php';
require_once 'Model/Persona.php';

// Rutas para las acciones del controlador ProyectoPOODenunciaController
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $controller = new ProyectoPOODenunciaController();

    //acciones basadas en los parámetros de la URL
    switch ($_GET['action']) {
        case 'crearDenuncia':
            // Ejemplo de datos de denuncia
            $datosDenuncia = [
                'lugar' => 'Lugar de la denuncia',
                'detalles' => 'Detalles de la denuncia',
                //se obtienen datos
                'denunciante' => $controller->crearPersonaDesdeInput(), 
                'ofendido' => $controller->crearPersonaDesdeInput(), 
                'denunciado' => $controller->crearPersonaDesdeInput(), 
                'testigos' => null, // si son necesarios
            ];

            $controller->crearDenuncia($datosDenuncia); // Llama al método del controlador para crear una nueva denuncia
            break;
        
        case 'listarDenuncias':
            $controller->listarDenuncias(); // Llama al método del controlador para listar las denuncias existentes
            break;

        // aquí se pueden agregar más casos 
        case 'buscarDenuncia':
            $controller->buscarDenuncia($_GET['lugar']); // Ejemplo: Llama al método del controlador para buscar denuncias por lugar
            break;

        default:
            echo "Acción no válida";
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && empty($_GET)) {
    // Ruta por defecto: Página de inicio
    //incluir la vista de la página de inicio
    echo "¡Bienvenido al sistema de denuncias!";
    exit;
} else {
    // Mostrar una página de error si la ruta solicitada no existe
    echo "Error 404: Página no encontrada";
}
?>