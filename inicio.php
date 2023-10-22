<!DOCTYPE html>
<html>
<head>
  <title>Presentacion</title>
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
            padding: 20px 50px;
            background: #0077cc;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: large;
      }

      .icon-bar {
        background-color: #333;
        overflow: hidden;
        height: 50px
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
          <a href="\CheckListweb\reporte.php"></a>
          <a href="\CheckListweb\index.php"></a>
          <!-- <a href="#">Inicio</a> -->
      </div>
      <br>
      <br>      
      <center><img src="\CheckListweb\img\utp.jpg" alt="UTP" width="150" height="150"></center>
      <div><h1><center>Bienvenido a TaskListWeb</center></h1></div>
      
      <br>
      <center>
      <form action="index.php">
        <button class="card-button" type="submit">Iniciar</button>
      </form>
      </center> 
      <br>
      <br>
      <br>
      <div><h4><center>Ismael Delgado</center></h4></div>
      <div><h4><center>Mariano Chirú</center></h4></div>
      <div><h4><center>Álvaro Domínguez</center></h4></div>

  </body>
</html>