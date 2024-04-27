<?
class Denuncia {
    private $lugar;
    private $detalles;
    private $delitos;
    private $denunciante;
    private $ofendido;
    private $denunciado;
    private $testigos;
    private $pruebas;

    public function __construct($lugar, $detalles, $denunciante, $ofendido, $denunciado, $testigos) {
        $this->lugar = $lugar;
        $this->detalles = $detalles;
        $this->delitos = [];
        $this->testigos = [];
        $this->pruebas = [];
        $this->denunciante = $denunciante;
        $this->ofendido = $ofendido;
        $this->denunciado = $denunciado;
        // Suponiendo que $testigos es un array de objetos Persona
        foreach ($testigos as $testigo) {
            $this->agregarTestigo($testigo);
        }
    }

    public function agregarDelito($delito) {
        $this->delitos[] = $delito;
    }

    public function agregarTestigo($testigo) {
        $this->testigos[] = $testigo;
    }

    public function agregarPrueba($prueba) {
        $this->pruebas[] = $prueba;
    }

    public function mostrarInformacion() {
        echo "Lugar: " . $this->lugar . "\n";
        echo "Detalles: " . $this->detalles . "\n";
        echo "Delitos: " . implode(", ", $this->delitos) . "\n";
        echo "Testigos: ";
        foreach ($this->testigos as $testigo) {
            echo $testigo->getNombre() . ", ";
        }
        echo "\n";
        echo "Pruebas: " . implode(", ", $this->pruebas) . "\n";
    }

    // Getters y setters
    public function getLugar() {
        return $this->lugar;
    }

    public function getDetalles() {
        return $this->detalles;
    }

    public function getDelitos() {
        return $this->delitos;
    }

    public function getDenunciante() {
        return $this->denunciante;
    }

    public function getOfendido() {
        return $this->ofendido;
    }

    public function getDenunciado() {
        return $this->denunciado;
    }

    public function getTestigos() {
        return $this->testigos;
    }

    public function getPruebas() {
        return $this->pruebas;
    }
}