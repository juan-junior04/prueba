<?php

require_once(__DIR__ . '/../pruebaModel/pruebaModel.php');
Class PruebaControle extends PruebaModel{
    private  $pruebaModel;

    public  function __construct(){
         $this->pruebaModel = new PruebaModel();
    }  
    public function traerTodo(){
        try{
            $respuesta= $this->pruebaModel->traerTodo();
            http_response_code(200);
            return   json_encode($respuesta);
        }catch(Exception $e){
            $respuesta  = array("error al traer todos los datos",$e->getMessage());
            http_response_code(400);
            echo json_encode($respuesta);
        }
      
    }
    
    
    public function guardar($fabricante){
        try{
            $respuesta  = $this->pruebaModel->guardar($fabricante);
            $json = array("creado"=>$fabricante);
            http_response_code(200);
            echo json_encode($json);
            
        }catch(Exception $e){
            $respuesta  = array("error al agregar dato" => $e->getMessage());
            http_response_code(400);
            echo json_encode($respuesta);
        }
        
    }

    public function modificar($fabricante){
        try{
            $respuesta  = $this->pruebaModel->modificar($fabricante);
            $json = array("modificado"=>$fabricante);
            http_response_code(200);
            echo json_encode($json);
            
        }catch(Exception $e){
            $respuesta  = array("error al agregar dato" => $e->getMessage());
            http_response_code(400);
            echo json_encode($respuesta);
        }
        
    }

    public function eliminar($fabricante){
        try{
            $respuesta  = $this->pruebaModel->eliminar($fabricante);
            $json = array("eliminado"=>$fabricante);
            http_response_code(200);
            echo json_encode($json);
            
        }catch(Exception $e){
            $respuesta  = array("error al agregar dato" => $e->getMessage());
            http_response_code(400);
            echo json_encode($respuesta);
        }
        
    }
    
}

?>