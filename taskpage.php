<html>
    <head>
        <title>
            Agregar
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

            form input[type="submit"] {
              padding: 5px 10px;
            background: #0077cc;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
}

            form input[type="text"] {
    width: 200px;
    height: 20px;
    text-align: center;
}

form input[type="text1"] {
    width: 400px;
    height: 30px;
}

form input[type="text2"] {
    width: 200px;
    height: 20px;
    text-align: center;
}
            form label {
    font-weight: bold;
}


            
          </style>
    </head>
    <body>
        <div class="icon-bar">
            <a href="\CheckListweb\reporte.php">Reporte</a>
            <a href="\CheckListweb\index.php">Dashboard</a>
            <a href="\CheckListweb\inicio.php">Inicio</a>
        </div>
        <center>
        <p><h1>Agregar una tarea</h1></p>
        <form action="taskpage.php" method="post">
            <label for="Titu">Titutlo:</label><br>
            <input type="text" id="titulo" name="titulo" value="" required><br><br>
            <label for="descrip">Descripcion:</label><br>
            <input type="text1" id="descripcion" name="descripcion" value="" required><br><br>
            <label for="fname">Estado:</label><br>
              <select id="estado" name="estado" required>
                <option value="1">Por Hacer</option>
                <option value="2">En progreso</option>
                <option value="3">Terminado</option>
            </select><br><br>
            <label>Fecha de Entrega</label><br>
            <input type="date" name="fechadeentrega" required><br><br>
            <label for="resposable">Responsable</label><br>
            <input type="text2" id="responsable" name="responsable" value="" required><br><br>
            <label for="tipotarea">Tipo de tarea:</label><br>
            <select id="tipo" name="tipo" required>
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
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
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