<!DOCTYPE html>
<html>
<head>
  <title>Your To Do List!</title>
  <meta charset="UTF-8">
  <style>

        .kanban-board-title{
            font-weight: bold;
            margin-bottom: 10px;
        }

        .kanban-board {
            display: flex;
        }

        .kanban-column {
            flex: 1;
            margin: 10px;
            padding: 10px;
            background: #f0f0f0;
        }

        .kanban-card {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px 0;
            padding: 10px;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-buttons {
            display: flex;
            justify-content: space-between;
        }

        .card-button {
            padding: 5px 10px;
            background: #0077cc;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
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

      <div><h1><center>Dashboard</center></h1></div>
      
      <br>
      <form action="taskpage.php">
        <button class="card-button" type="submit">Agregar tarea</button>
      </form> 

      <div class="kanban-board"> 
          <div class="kanban-column">
            <div class="kanban-card">
              <div class="card-title1"> <center><h2>Por hacer</h2></center></div>
            </div>
          </div>
          
          <div class="kanban-column">
            <div class="kanban-card">
                <div class="card-title2"> <center><h2>En progreso</h2></center></div>
            </div>
        </div>
          
          <div class="kanban-column">
            <div class="kanban-card">
              <div class="card-title3"> <center><h2>Terminada</h2></center></div>
          </div>
          </div>
      </div>
    <?php

require_once("class/tareas.php");

$tareas = new tarea(); 
$tareas2 = new tarea();
$tareas3 = new tarea();

echo '<div class="kanban-board">';

$resultado1 = $tareas->consultar_tareas_estado1();

echo '<div class="kanban-column">';
echo '<div class="kanban-card">';
foreach ($resultado1 as $row) {
    echo '<div class="kanban-card">';
    echo '<div class="card-title1">';
    echo '<div class="card-title">' . $row['titulo'] . '</div>';
    echo '<div class="card-description">' . $row['descripcion'] . '</div>';
    echo '<div class="card-fecha">' . $row['Fecha_Entrega'] . '</div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="card-buttons">';
    echo '<button class="card-button">Modificar</button>';
    echo '<button class="card-button">Eliminar</button>';
    echo '</div>';
}
echo '</div>';
echo '</div>';


$resultado2 = $tareas2->consultar_tareas_estado2();


echo '<div class="kanban-column">';
echo '<div class="kanban-card">';

foreach ($resultado2 as $row) {
    echo '<div class="kanban-card">';
    echo '<div class="card-title2">';
    echo '<div class="card-title">' . $row['titulo'] . '</div>';
    echo '<div class="card-description">' . $row['descripcion'] . '</div>';
    echo '<div class="card-fecha">' . $row['Fecha_Entrega'] . '</div>';
    echo '</div>';
    echo '</div>';


    echo '<div class="card-buttons">';
    echo '<button class="card-button">Modificar</button>';
    echo '<button class="card-button">Eliminar</button>';
    echo '</div>';
}
echo '</div>';
echo '</div>';



$resultado3 = $tareas3->consultar_tareas_estado3();


echo '<div class="kanban-column">';
echo '<div class="kanban-card">';

foreach ($resultado3 as $row) {
    echo '<div class="kanban-card">';
    echo '<div class="card-title3">';
    echo '<div class="card-title">' . $row['titulo'] . '</div>';
    echo '<div class="card-description">' . $row['descripcion'] . '</div>';
    echo '<div class="card-fecha">' . $row['Fecha_Entrega'] . '</div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="card-buttons">';
    echo '<button class="card-button">Modificar</button>';
    echo '<button class="card-button">Eliminar</button>';
    echo '</div>';
}
echo '</div>';
echo '</div>';


?>
  </body>
</html>