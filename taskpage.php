<html>
    <head>
        <title>
            Añadir una tarea
        </title>
        <meta charset="UTF-8">
        <style>
            .kanban-board {
              display: flex;
              justify-content: space-between;
            }
        
            .kanban-column {
              flex: 1;
              margin: 10px;
              padding: 10px;
              border: 1px solid #ccc;
              background-color: #f9f9f9;
            }
        
            .kanban-card {
              margin: 5px;
              padding: 5px;
              border: 1px solid #999;
              background-color: #fff;
            }
        
            .icon-bar {
              background-color: #333;
              overflow: hidden;
            }
        
            .icon-bar a {
              float: right;
              display: block;
              color: white;
              text-align: center;
              padding: 15px 20px;
              text-decoration: none;
              font-size: 20px;
            }
        
            .icon-bar a:hover {
              background-color: #555;
            }
            
          </style>
    </head>
    <body>
        <div class="icon-bar">
            <a href="\CheckListweb\reporte.php">Reporte</a>
            <a href="\CheckListweb\index.php">Tablero</a>
            <a href="#">Inicio</a>
        </div>
        <center>
        <p><h1>Agregar una tarea</h1></p>
        <form action="taskpage.php" method="post">
            <label for="Titulo">Titutlo:</label><br>
            <input type="text" id="title" name="title" value=""><br><br>
            <label for="descrip">Descripcion:</label><br>
            <input type="text" id="descrip" name="descrip" value=""><br><br>
            <label for="fname">Estado:</label><br>
              <select id="estado" name="estado">
                <option value="1">Por Hacer</option>
                <option value="2">En progreso</option>
                <option value="3">Terminado</option>
            </select><br><br>
            <label>Fecha de Entrega</label><br>
            <input type="date" name="fechadeentrega" required><br><br>
            <label for="resposable">Responsable</label><br>
            <input type="text" id="responsable" name="responsable" value=""><br><br>
            <label for="tipotarea">Tipo de tarea:</label><br>
            <select id="tipo" name="tipo">
              <option value="1">Personal</option>
              <option value="2">Universidad</option>
              <option value="3">Trabajo</option>
          </select> <br><br>
            <INPUT NAME="Guardartarea"   VALUE="Agregar" TYPE="submit"/>
        </form> 
        </center>
        <?php

require_once("class/tareas.php");

        if (array_key_exists('Guardartarea', $_POST)) {
            $titulo = $_POST['title'];
            $descripcion = $_POST['descrip'];
            $estadoid = $_POST['estado'];
            $Fecha_Entrega = $_POST['fechadeentrega'];
            $responsable = $_POST['responsable'];
            $tipoid = $_POST['tipo'];

  $obj_tareas = new tarea();
  $tareas = $obj_tareas->guardar_tarea_hoy($titulo, $descripcion, $estadoid, $Fecha_Entrega, $responsable, $tipoid);

  echo $tareas;
  
} 

?>
    </body>
</html>