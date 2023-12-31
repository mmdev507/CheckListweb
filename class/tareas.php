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
        echo "No hay registros de tareas |";
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
        echo "No hay tareas para hoy |";
    } 
    else {
        return $resultado;
        $resultado->close();
        $this->_db->close();
        $consulta->close();

        
    }

}

public function consultar_tareas_fechas($desde, $hasta) {
    $instruccion = "CALL sp_listar_tareas_fechas('$desde', '$hasta')";

    $consulta = $this->_db->query($instruccion);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

    if (!$resultado) {
        echo "No hay tareas para este rango |";
    } else {
        return $resultado;
        $resultado->close();
        $this->_db->close();
        $consulta->close();
       
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];
    
    }
}

public function consultar_tareas_estado($estado){
 
    $instruccion = "CALL sp_listar_tareas_estado('$estado')";

    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_ALL(MYSQLI_ASSOC);

    if (!$resultado){ 
        echo "No hay registros para este estado |";
    } 
    else {
        return $resultado;
        $resultado->close();
        $this->_db->close();
        $consulta->close();

        
    }

    if ($_SERVER['REQUEST_METHOD'] === 'REQUEST') {
        $estado = $_REQUEST['estado'];

    
    }

}

public function consultar_tareas_tipo($tipo){
 
    $instruccion = "CALL sp_listar_tareas_tipo('$tipo')";

    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_ALL(MYSQLI_ASSOC);

    if (!$resultado){ 
        echo "No hay registros para este tipo |";
    } 
    else {
        return $resultado;
        $resultado->close();
        $this->_db->close();
        $consulta->close();

    }

    if ($_SERVER['REQUEST_METHOD'] === 'REQUEST') {
        $estado = $_REQUEST['tipo'];

    }

}

public function guardar_tarea_hoy($titulo, $descripcion, $estadoid, $Fecha_Entrega, $responsable, $tipoid){

    $titulo = $_POST ['titulo'];
    $descripcion = $_POST['descripcion'];
    $estadoid = $_POST['estado'];
    $Fecha_Entrega = $_POST['fechadeentrega'];
    $responsable = $_POST['responsable'];
    $tipoid = $_POST['tipo'];
 

    $instruccion = "CALL sp_guardar_tarea('$titulo', '$descripcion', '$estadoid', '$Fecha_Entrega', '$responsable', '$tipoid')";

    if ($this->_db->query($instruccion) === TRUE) {
        return "Los datos se han guardado correctamente.";
    } else {
        return "Error al guardar los datos: " . $this->_db->error;
    }

}

public function modificar_tarea($titulo, $descripcion, $estadoid, $Fecha_Entrega, $responsable, $tipoid){
    $id = $_POST['id']; 
    $titulo = $_POST ['titulo'];
    $descripcion = $_POST['descripcion'];
    $estadoid = $_POST['estado'];
    $Fecha_Entrega = $_POST['fechadeentrega'];
    $responsable = $_POST['responsable'];
    $tipoid = $_POST['tipo'];
 

    $instruccion = "CALL sp_modificar_tarea('$id','$titulo', '$descripcion', '$estadoid', '$Fecha_Entrega', '$responsable', '$tipoid')";

    if ($this->_db->query($instruccion) === TRUE) {
        return "Los datos se han guardado correctamente.";
    } else {
        return "Error al guardar los datos: " . $this->_db->error;
    }

}

public function consultar_tareas_estado1(){
    $instruccion = "CALL sp_listar_tareas_estado1";
    $consulta = $this->_db->query($instruccion);
    $resultado1 = $consulta->fetch_all(MYSQLI_ASSOC);


    if (!$resultado1) { 
        echo "";
    } else {
        return $resultado1;
    }
}

public function consultar_tareas_estado2(){

    $instruccion = "CALL sp_listar_tareas_estado2";
    $consulta2 = $this->_db->query($instruccion);
    $resultado2 = $consulta2->fetch_all(MYSQLI_ASSOC);
    
    if (!$resultado2) { 
        echo "";
    } else {
        return $resultado2;
    }
}

public function consultar_tareas_estado3(){
    $instruccion = "CALL sp_listar_tareas_estado3";
    $consulta3 = $this->_db->query($instruccion);
    $resultado3 = $consulta3->fetch_all(MYSQLI_ASSOC);


    if (!$resultado3) { 
        echo "";
    } else {
        return $resultado3;
    }
}

public function consultar_registro($id) {
    $instruccion = "CALL sp_consultar_tarea($id)";
    $consulta = $this->_db->query($instruccion);

    if ($consulta) { 
        
        $resultado = $consulta->fetch_assoc();
        $consulta->close(); 

        if ($resultado) {
        
            return $resultado;
        } else {
            echo "No se encontraron registros con el ID proporcionado.";
        }
    } else {
        echo "Error al ejecutar la consulta en la base de datos.";
    }

    return null;
}

public function eliminar_registro($id){
    $instruccion = "CALL sp_borrar_tareas($id)";
    if ($this->_db->query($instruccion) === TRUE) {
        return "Registro eliminado correctamente.";
    } else {
        return "Error al eliminar el registro: " . $this->_db->error;
    }
}

}
?>