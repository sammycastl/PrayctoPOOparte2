<?
// Definición de la enumeración Rol fuera de la clase Usuario
class Rol {
    const ADMINISTRADOR = 0;
    const USUARIO_NORMAL = 1;
}

// Definición de la clase Usuario
class Usuario {
    private $nombre;
    private $contraseña;
    private $rol;

    public function __construct($nombre, $contraseña, $rol) {
        $this->nombre = $nombre;
        $this->contraseña = $contraseña;
        $this->rol = $rol;
    }

    // Método para validar las credenciales del usuario
    public function validarCredenciales($nombre, $contraseña) {
        return $this->nombre === $nombre && $this->contraseña === $contraseña;
    }

    // Método para cambiar la contraseña del usuario
    public function cambiarContraseña($nuevaContraseña) {
        $this->contraseña = $nuevaContraseña;
    }

    // Método para obtener el rol del usuario
    public function getRol() {
        return $this->rol;
    }

    // Método para establecer el rol del usuario
    public function setRol($rol) {
        $this->rol = $rol;
    }

    // Método para comprobar si el usuario tiene permiso de administrador
    public function esAdmin() {
        return $this->rol === Rol::ADMINISTRADOR;
    }

    // Método para comprobar si el usuario tiene permiso de crear denuncias
    public function puedeCrearDenuncias() {
        return $this->rol === Rol::ADMINISTRADOR || $this->rol === Rol::USUARIO_NORMAL;
    }

    // Getters y setters
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }
}

