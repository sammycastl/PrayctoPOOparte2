<?php

// Cargar los archivos de clases necesarios
require_once 'Controller/ProyectoPOODenunciaController.php'; // Asegúrate de que esta línea está incluida y la ruta es correcta
require_once 'Model/Usuario.php';
require_once 'Model/Expediente.php';
require_once 'Model/Denuncia.php';
require_once 'Model/Persona.php';

// Ruta por defecto: Página de inicio
if ($_SERVER['REQUEST_METHOD'] === 'GET' && empty($_GET)) {
    //incluir la vista de la página de inicio
    echo "¡Bienvenido al sistema de denuncias!";
    exit;
}

// Rutas para las acciones del controlador ProyectoPOODenunciaController
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $controller = new ProyectoPOODenunciaController();

    // Realizar acciones basadas en los parámetros de la URL
    switch ($_GET['action']) {
        case 'crearDenuncia':
            // Ejemplo de datos de denuncia
            $datosDenuncia = [
                'lugar' => 'Lugar de la denuncia',
                'detalles' => 'Detalles de la denuncia',
                'denunciante' => $controller->crearPersonaDesdeInput(), // Aquí obtienes los datos del denunciante
                'ofendido' => $controller->crearPersonaDesdeInput(), // Aquí obtienes los datos del ofendido
                'denunciado' => $controller->crearPersonaDesdeInput(), // Aquí obtienes los datos del denunciado
                'testigos' => null, // Aquí podrías obtener los datos de los testigos si los necesitas
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
}

// Mostrar una página de error si la ruta solicitada no existe
echo "Error 404: Página no encontrada";