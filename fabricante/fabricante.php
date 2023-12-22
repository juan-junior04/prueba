<?php
class Fabricante{
    public $Cod_fabricante;
    public $nombre;


    public function getCod_fabricante(){
        return $this->Cod_fabricante;
    }

    public function setCod_fabricante($Cod_fabricante){
        $this->Cod_fabricante = $Cod_fabricante;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }



}

?>