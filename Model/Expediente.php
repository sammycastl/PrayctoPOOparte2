<?
class Expediente {
    private $fecha;
    private $listaDenuncias;

    public function __construct() {
        $this->fecha = date("Y-m-d H:i:s");
        $this->listaDenuncias = [];
    }

    public function agregarDenuncia($denuncia) {
        $this->listaDenuncias[] = $denuncia;
    }

    public function buscarPorLugar($lugar) {
        $denunciasEncontradas = [];
        foreach ($this->listaDenuncias as $denuncia) {
            if ($denuncia->getLugar() === $lugar) {
                $denunciasEncontradas[] = $denuncia;
            }
        }
        return $denunciasEncontradas;
    }

    public function buscarPorDelito($delito) {
        $denunciasEncontradas = [];
        foreach ($this->listaDenuncias as $denuncia) {
            if (in_array($delito, $denuncia->getDelitos())) {
                $denunciasEncontradas[] = $denuncia;
            }
        }
        return $denunciasEncontradas;
    }

    public function eliminarDenuncia($numeroDenuncia) {
        foreach ($this->listaDenuncias as $key => $denuncia) {
            if ($denuncia->getNumero() == $numeroDenuncia) {
                unset($this->listaDenuncias[$key]);
                return;
            }
        }
        echo "Denuncia no encontrada.\n";
    }

    public function obtenerDenuncias() {
        return $this->listaDenuncias;
    }

    public function getFecha() {
        return $this->fecha;
    }
}
