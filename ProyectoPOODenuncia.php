<?php
class ProyectoPOODenuncia {
    public function __construct() {
        // Crear un usuario
        $usuario = new Usuario("usuario1", "contraseña123");
        // Mostrar un mensaje de bienvenida
        echo "¡Bienvenido al sistema de denuncias!\n";
        // Crear un expediente
        $expediente = new Expediente();
        // Agregar algunas funcionalidades básicas
        $salir = false;
        while (!$salir) {
            echo "\nOpciones:\n";
            echo "1. Crear denuncia\n";
            echo "2. Listar denuncias\n";
            echo "3. Salir\n";
            echo "Seleccione una opción: ";
            $opcion = (int) readline();
            
            switch ($opcion) {
                case 1:
                    // Crear una denuncia
                    echo "\nCreando una nueva denuncia:\n";
                    echo "Ingrese el lugar de lo ocurrido: ";
                    $lugar = readline();
                    echo "Ingrese los detalles de la denuncia: ";
                    $detalles = readline();
                    
                    echo "Ingrese los detalles del denunciante:\n";
                    $denunciante = $this->crearPersonaDesdeInput();
                    
                    echo "Ingrese los detalles del ofendido:\n";
                    $ofendido = $this->crearPersonaDesdeInput();
                    
                    echo "Ingrese los detalles del denunciado (opcional):\n";
                    $denunciado = $this->crearPersonaDesdeInput();
                    
                    echo "Ingrese los detalles del testigo:\n";
                    $testigo = $this->crearPersonaDesdeInput();
                    
                    // seguir este patrón para los demás involucrados 
                    $testigos = null;
                    
                    $nuevaDenuncia = new Denuncia($lugar, $detalles, $denunciante, $ofendido, $denunciado, $testigos);
                    $expediente->agregarDenuncia($nuevaDenuncia);
                    echo "Denuncia creada y agregada al expediente.\n";
                    break;
                
                case 2:
                    // Listar denuncias en el expediente
                    echo "\nDenuncias en el expediente:\n";
                    foreach ($expediente->getListaDenuncias() as $denuncia) {
                        echo "- Lugar: " . $denuncia->getLugar() . ", Detalles: " . $denuncia->getDetalles() . "\n";
                    }
                    break;
                
                case 3:
                    // Salir del programa
                    $salir = true;
                    break;
                
                default:
                    echo "Opción inválida. Por favor, seleccione una opción válida.\n";
                    break;
            }
        }
    }
    
    private function crearPersonaDesdeInput() {
        echo "Nombre: ";
        $nombre = readline();
        echo "Edad: ";
        $edad = (int) readline();
        echo "Sexo: ";
        $sexo = readline();
        echo "Género: ";
        $genero = readline();
        echo "DNI: ";
        $dni = readline();
        echo "Dirección: ";
        $direccion = readline();
        echo "Teléfono: ";
        $telefono = readline();
        return new Persona($nombre);
    }
}