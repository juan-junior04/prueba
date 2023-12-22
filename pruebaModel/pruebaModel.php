<?php

require_once(__DIR__ . '/../conexion/Conexion.php');
require_once(__DIR__ . '/../fabricante/fabricante.php');

Class PruebaModel extends Fabricante{
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::obtenerInstancia();
    }


    public function traerTodo(){
        $dbh = $this->conexion->obtenerConexion();
        $sql = "SELECT * FROM fabricante";
        $stm = $dbh->prepare($sql);

        if(!$stm->execute()){
            throw new Exception("error de consulta");
        }else{
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

    }

    public function guardar($fabricante){
        $dbh = $this->conexion->obtenerConexion();
        $sql = "INSERT INTO fabricante(Cod_fabricante,nombre) VALUES(:Cod_fabricante,:nombre)";
        $stm = $dbh->prepare($sql);
        $Cod_fabricante = $fabricante->getCod_fabricante();
        $nombre  = $fabricante->getNombre();
        $stm->BindParam(":Cod_fabricante",$Cod_fabricante);
        $stm->BindParam(":nombre",$nombre);

        if(!$stm->execute()){
            throw new  Exception("Error Guardando");
        }else{
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function modificar($fabricante){
        $dbh = $this->conexion->obtenerConexion();
        $sql = "UPDATE fabricante SET  nombre = :nombre WHERE Cod_fabricante = :Cod_fabricante";
        $stm  = $dbh->prepare($sql);
        $Cod_fabricante = $fabricante->getCod_fabricante();
        $nombre  = $fabricante->getNombre();
        $stm->BindParam(":Cod_fabricante",$Cod_fabricante);
        $stm->BindParam(":nombre",$nombre);

        if(!$stm->execute()){
            throw new  Exception("Error Guardando");
        }else{
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function eliminar($fabricante){
        $dbh = $this->conexion->obtenerConexion();
        $sql = "DELETE FROM fabricante WHERE Cod_fabricante = :codigo_fabricante";
        $stm = $dbh->prepare($sql);
        $Cod_fabricante = $fabricante->getCod_fabricante();
        $stm->BindParam(":Cod_fabricante",$Cod_fabricante);

        if(!$stm->execute()){
            throw new  Exception("Error Guardando");
        }else{
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }

  

}


?>