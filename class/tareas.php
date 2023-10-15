<?php
require_once('modelo.php');

class tarea extends modeloCredencialesBD{ 
protected $id;
protected $titulo;
protected $descripcion;
protected $estadoid;
protected $Fecha_Entrega;
protected $responsable;
protected $tipoid;
protected $fecha_modificacion;

public function __construct()
{

    parent::__construct();
}

public function consultar_tareas(){

    $instruccion = "CALL sp_listar_tareas()";

    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if (!$resultado){ 
        echo "Fallo al consultar las tareas";
    } 
    else {
        return $resultado;
        $resultado->close();
        $this->_db->close();
        $consulta->close();

        
    }
 }

 public function consultar_tareas_hoy(){
 
    $instruccion = "CALL sp_listar_tareas_hoy()";

    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_ALL(MYSQLI_ASSOC);

    if (!$resultado){ 
        echo "Fallo al consultar las tareas de hoy";
    } 
    else {
        return $resultado;
        $resultado->close();
        $this->_db->close();
        $consulta->close();

        
    }

}



}
?>