<?
class Persona {
    private $nombre;
    private $edad;
    private $sexo;
    private $genero;
    private $dni;
    private $direccion;
    private $telefono;

    public function __construct($nombre, $edad, $sexo, $genero, $dni, $direccion, $telefono) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->sexo = $sexo;
        $this->genero = $genero;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    // Método para validar los datos de una persona
    public function validarDatos() {
        // Verificar que la edad sea un número positivo y no mayor que 150 (solo como ejemplo)
        if ($this->edad <= 0 || $this->edad > 150) {
            echo "La edad debe ser un número positivo y no mayor que 150.\n";
            return false;
        }
        
        // Verificar que el DNI tenga un formato válido (13 caracteres)
        if (strlen($this->dni) != 13 || !is_numeric($this->dni)) {
            echo "El DNI debe tener 13 dígitos numéricos.\n";
            return false;
        }

        // Verificar que el sexo sea "Masculino" o "Femenino"
        if ($this->sexo !== "Masculino" && $this->sexo !== "Femenino") {
            echo "El sexo debe ser 'Masculino' o 'Femenino'.\n";
            return false;
        }

        // Verificar que el teléfono tenga 8 dígitos numéricos
        if (strlen($this->telefono) != 8 || !is_numeric($this->telefono)) {
            echo "El teléfono debe tener 8 dígitos numéricos.\n";
            return false;
        }

        // Si todas las validaciones pasan, retornar true
        return true;
    }

    // Método para mostrar información sobre la persona
    public function mostrarInformacion() {
        echo "Nombre: " . $this->nombre . "\n";
        echo "Edad: " . $this->edad . "\n";
        echo "Sexo: " . $this->sexo . "\n";
        echo "Género: " . $this->genero . "\n";
        echo "DNI: " . $this->dni . "\n";
        echo "Dirección: " . $this->direccion . "\n";
        echo "Teléfono: " . $this->telefono . "\n";
    }

    // Métodos para actualizar los datos de una persona
    public function actualizarNombre($nuevoNombre) {
        $this->nombre = $nuevoNombre;
    }

    public function actualizarEdad($nuevaEdad) {
        $this->edad = $nuevaEdad;
    }

    public function actualizarSexo($nuevoSexo) {
        $this->sexo = $nuevoSexo;
    }

    public function actualizarGenero($nuevoGenero) {
        $this->genero = $nuevoGenero;
    }

    public function actualizarDni($nuevoDni) {
        $this->dni = $nuevoDni;
    }

    public function actualizarDireccion($nuevaDireccion) {
        $this->direccion = $nuevaDireccion;
    }

    public function actualizarTelefono($nuevoTelefono) {
        $this->telefono = $nuevoTelefono;
    }

    // Getters
    public function getNombre() {
        return $this->nombre;
    }
}
