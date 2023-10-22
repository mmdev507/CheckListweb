<html>
    <head>
        <title>
            Modificar
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
        <?php

require_once("class/tareas.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $obj_tareas = new tarea();
  $row = $obj_tareas->consultar_registro($id);

}

if (array_key_exists('Modificartarea', $_POST)) {;
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $estadoid = $_POST['estado'];
  $Fecha_Entrega = $_POST['fechadeentrega'];
  $responsable = $_POST['responsable'];
  $tipoid = $_POST['tipo'];


$obj_tareas = new tarea();
$tareas = $obj_tareas->modificar_tarea($titulo, $descripcion, $estadoid, $Fecha_Entrega, $responsable, $tipoid);

if ($tareas === "Los datos se han guardado correctamente.") {
  header('Location: modificadoexitoso.php');
  exit;
} else {
  echo $tareas;
}
 

echo $tareas;

} 
?>
        <center>
        <p><h1>Modificar una Tarea</h1></p>
        <form action="modificar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="Titulo">Titutlo:</label><br>
            <input type="text" id="titulo" name="titulo" value="<?php echo $row['titulo']; ?>" required><br><br>
            <label for="descrip">Descripcion:</label><br>
            <input type="text1" id="descripcion" name="descripcion" value="<?php echo $row['descripcion']; ?>" required><br><br>
            <label for="fname">Estado:</label><br>
              <select id="estado" name="estado" required>
                <option value="1" <?php if ($row['estado'] == "Por Hacer") echo "selected"; ?>>Por Hacer</option>
                <option value="2"<?php if ($row['estado'] == "En progreso") echo "selected"; ?>>En progreso</option>
                <option value="3" <?php if ($row['estado'] == "Terminado") echo "selected"; ?>>Terminado</option>
            </select><br><br>
            <label>Fecha de Entrega</label><br>
            <input type="date" name="fechadeentrega" value="<?php echo $row['Fecha_Entrega']; ?>" required><br><br>
            <label for="resposable">Responsable</label><br>
            <input type="text2" id="responsable" name="responsable" value="<?php echo $row['responsable']; ?>" required><br><br>
            <label for="tipotarea">Tipo de tarea:</label><br>
            <select id="tipo" name="tipo" required>
              <option value="1" <?php if ($row['tipo'] == "Personal") echo "selected"; ?>>Personal</option>
              <option value="2" <?php if ($row['tipo'] == "Universidad") echo "selected"; ?>>Universidad</option>
              <option value="3" <?php if ($row['tipo'] == "Trabajo") echo "selected"; ?>>Trabajo</option>
          </select> <br><br>
            <INPUT NAME="Modificartarea"   VALUE="Modificar" TYPE="submit"/>
        </form> 
        </center>
    </body>
</html>