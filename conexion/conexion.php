<?php

class Conexion {
    private static $instancia = null;
    private $con;

    private function __construct() {
        $servername = "localhost";
        $username = "juanda";
        $password = "";
        $database = "prueba_1";

        try {
            $this->con = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Conexión fallida: " . $e->getMessage());
        }
    }

    public static function obtenerInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }

        return self::$instancia;
    }

    public function obtenerConexion() {
        return $this->con;
    }
}

?>
