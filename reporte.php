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
<H1>Consultar Tareas</H1>
        </Center> 

        <FORM NAME="FormFiltro" METHOD="post" ACTION="reporte.php">
<BR/>
Filtrar por:


<INPUT NAME="ConsultarFiltro"   VALUE="Tareas de hoy" TYPE="submit"/>
<INPUT NAME="ConsultarTodos "   VALUE="Ver todas las tareas" TYPE="submit"/>
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
    print ("No hay tareas disponibles");
}


?>
</BODY>
</HTML>