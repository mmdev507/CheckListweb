<HTML LANG="ES">
<HEAD>
<title>
            Reporte
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

             /* Estilo para el botón de tipo "submit" */
        input[type="submit"] {
            background-color: #0097B2;
            color: #fff;
            padding: 2px 4px;
            border: none;
            border-radius: 2px;
            cursor: pointer;
        }

        /* Cambiar el estilo cuando se pasa el mouse sobre el botón */
        input[type="submit"]:hover {
            background-color: #0066CC;
        }
            
          </style>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<div class="icon-bar">
            <a href="\CheckListweb\reporte.php">Reporte</a>
            <a href="#">Tablero</a>
            <a href="#">Inicio</a>
        </div>
<Center>       
<H1>Reporte de Tareas</H1>
        </Center> 

        <FORM NAME="FormFiltro" METHOD="post" ACTION="reporte.php">
<BR/>
Filtrar por:


<INPUT NAME="ConsultarFiltro"   VALUE="Tareas de hoy" TYPE="submit"/>
<INPUT NAME="ConsultarTodos "   VALUE="Ver todas las tareas" TYPE="submit"/>
</FORM>   
<FORM action="reporte.php" method="POST">
        <label>Desde:</label>
        <input type="date" name="desde" required>
        <label>Hasta:</label>
        <input type="date" name="hasta" required>
        <input NAME="fechas" type="submit" value="Consultar Tareas">
  </FORM>  
  <FORM method="post">
    <select id="estado" name="estado">
        <option value="1">Por Hacer</option>
        <option value="2">En progreso</option>
        <option value="3">Terminado</option>
    </select>
    <input type="submit" name="ConsultarEstado" value="Tareas por Estado" />
          </FORM>
          <FORM method="post">
    <select id="tipo" name="tipo">
        <option value="1">Personal</option>
        <option value="2">Universidad</option>
        <option value="3">Trabajo</option>
    </select>
    <input type="submit" name="Consultartipo" value="Tareas por Tipo" />
          </FORM>        
<?php

require_once("class/tareas.php");

$obj_tareas = new tarea();
$tareas = $obj_tareas->consultar_tareas();

if(array_key_exists('ConsultarTodos', $_POST)) {

    $obj_tareas = new tarea();
    $tareas= $obj_tareas->consultar_tareas();
}


if(array_key_exists('ConsultarFiltro', $_POST)) {
                                                                                    
    $obj_tareas = new tarea();
    $tareas = $obj_tareas->consultar_tareas_hoy();
}

if(array_key_exists('ConsultarEstado', $_POST)) {
  
  $estado = $_POST['estado'];
  
  $obj_tareas = new tarea();
  $tareas = $obj_tareas->consultar_tareas_estado($estado);

  if ($tareas !== null) {
    $nfilas = count($tareas);
} else {
  echo "No hay registros por estado";
}
}

if(array_key_exists('Consultartipo', $_POST)) {
  
  $tipo = $_POST['tipo'];
  
  $obj_tareas = new tarea();
  $tareas = $obj_tareas->consultar_tareas_tipo($tipo);

  if ($tareas !== null) {
    $nfilas = count($tareas);
} else {
  echo "No hay registros por tipo";
}
}

if (array_key_exists('fechas', $_POST)) {
  $desde = $_POST['desde'];
  $hasta = $_POST['hasta'];

  $obj_tareas = new tarea();
  $tareas = $obj_tareas->consultar_tareas_fechas($desde, $hasta);

  if ($tareas !== null) {
      $nfilas = count($tareas);
  } else {
    echo "No hay registros";
  }
} 

$nfilas=count($tareas);

if ($nfilas>0)
{
print ("<TABLE>\n");
print ("<TR>\n");
print ("<TH>ID</TH>\n");
print ("<TH>Titulo</TH>\n");
print ("<TH>Descripcion</TH>\n");
print ("<TH>Estado</TH>\n");
print ("<TH>Fecha Entrega</TH>\n");
print ("<TH>Responsable</TH>\n");
print ("<TH>Tipo Tarea</TH>\n");
print ("<TH>Fecha Modificación</TH>\n");
print ("</TR\n");

foreach ( $tareas as $resultado) {
    print ("<TR>\n");
    print ("<TD>". $resultado['id'] . "</TD>\n");
    print ("<TD>". $resultado['titulo'] . "</TD>\n");
    print ("<TD>". $resultado['descripcion'] . "</TD>\n");
    print ("<TD>". $resultado['estado'] . "</TD>\n");
    print ("<TD>". $resultado['Fecha_Entrega'] . "</TD>\n");
    print ("<TD>". $resultado['responsable'] . "</TD>\n");
    print ("<TD>". $resultado['tipo'] . "</TD>\n");
    print ("<TD>". $resultado['fecha_modificacion'] . "</TD>\n");
    
   
print("</TR>\n");
}
print("</TABLE>\n");
}

else {
    print (" No hay tareas disponibles");
}


?>
</BODY>
</HTML>