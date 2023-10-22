<html>
    <head>
        <title>
            Eliminado Exitosa
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
            <a href="\CheckListweb\index.php">Dashboard</a>
            <a href="\CheckListweb\inicio.php">Inicio</a>
        </div>
        <br><br>
<?php

echo "Se elimino la tarea correctamente, vuelve al Dashboard <br><br>";

echo '<a href="index.php" class="card-button">Ir al Dashboard</a>';

?>
    </body>
</html>