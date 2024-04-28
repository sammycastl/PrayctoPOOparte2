<?php
// Importamos las clases necesarias
require_once '../Model/Denuncia.php';
require_once '../Model/Expediente.php';
require_once '../Model/Persona.php';
require_once '../Model/Usuario.php';

class PController {
    public function __construct() {
        // Constructor del controlador
    }

    // Método para mostrar la lista de denuncias
    public function listarDenuncias() {
        // Crear una instancia de Expediente para obtener las denuncias
        $expediente = new Expediente();
        // Obtener la lista de denuncias
        $denuncias = $expediente->obtenerDenuncias();
        
        // Incluir la vista para mostrar la lista de denuncias
        include_once '../View/listarDenuncias.php';
    }

    // Método para crear una nueva denuncia
    public function crearDenuncia() {
        try {
            // Verificar si se recibió un formulario de creación de denuncia
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener los datos del formulario
                $lugar = $_POST['lugar'];
                $detalles = $_POST['detalles'];
                $denunciante = $_POST['denunciante'];
                $ofendido = $_POST['ofendido'];
                $denunciado = $_POST['denunciado'];
                $testigos = $_POST['testigos']; 
                
                // Crear una nueva instancia de Denuncia con los datos recibidos
                $denuncia = new Denuncia($lugar, $detalles, $denunciante, $ofendido, $denunciado, $testigos);
                
                // Agregar la denuncia al expediente
                $expediente = new Expediente();
                $expediente->agregarDenuncia($denuncia);
                
                // Redirigir al usuario a la página de lista de denuncias
                header("Location: listarDenuncias.php");
                exit(); // Asegurar que el script termine después de redirigir
            } else {
                // Si no se recibió un formulario POST, redirigir a la página de inicio u otra página
                header("Location: index.php");
                exit(); // Asegurar que el script termine después de redirigir
            }
        } catch (Exception $e) {
            // Manejar la excepción y mostrar o registrar el mensaje de error
            error_log($e->getMessage()); // Registrar el error en el archivo de log de errores de PHP
            header("Location: errorPage.php"); // Asegúrate de tener esta página o manejarlo de otra manera
            exit();
        }
    }

    // aqui podemos agregar otros metodos despues
}

