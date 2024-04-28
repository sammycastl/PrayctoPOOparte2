<?
class ProyectoPOODenunciaController {
    public function __construct() {
        // Crear un usuario
        $usuario = new Usuario("usuario1", "contraseña123", Rol::ADMINISTRADOR); // Agrega el tercer argumento con el rol del usuario
        // Mostrar un mensaje de bienvenida
        echo "¡Bienvenido al sistema de denuncias!\n";
    }

    public function crearDenuncia($datosDenuncia) {
        // Crear instancia de Denuncia con los datos proporcionados
        $nuevaDenuncia = new Denuncia($datosDenuncia['lugar'], $datosDenuncia['detalles'], $datosDenuncia['denunciante'], $datosDenuncia['ofendido'], $datosDenuncia['denunciado'], $datosDenuncia['testigos']);

        // Agregar la nueva denuncia al expediente
        $expediente = new Expediente();
        $expediente->agregarDenuncia($nuevaDenuncia);

        // Mostrar mensaje de éxito
        echo "Denuncia creada y agregada al expediente.\n";
    }

    public function listarDenuncias() {
        // Obtener todas las denuncias del expediente
        $expediente = new Expediente();
        $denuncias = $expediente->obtenerDenuncias();

        // Mostrar información de cada denuncia
        echo "Denuncias en el expediente:\n";
        foreach ($denuncias as $denuncia) {
            echo "- Lugar: " . $denuncia->getLugar() . ", Detalles: " . $denuncia->getDetalles() . "\n";
        }
    }

    public function buscarDenuncia($lugar) {
        // Buscar denuncias por lugar
        $expediente = new Expediente();
        $denunciasEncontradas = $expediente->buscarPorLugar($lugar);

        // Mostrar las denuncias encontradas
        echo "Denuncias encontradas en el lugar '$lugar':\n";
        foreach ($denunciasEncontradas as $denuncia) {
            echo "- Lugar: " . $denuncia->getLugar() . ", Detalles: " . $denuncia->getDetalles() . "\n";
        }
    }

    public function crearPersonaDesdeInput() {
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
        return new Persona($nombre, $edad, $sexo, $genero, $dni, $direccion, $telefono); 
    }
}

