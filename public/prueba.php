<?php

    /********************************************************/
    /* Portal Web de la Contraloria del Estado Tachira      */
    /* Oficina de Sistemas e Informacion Digital            */
    /* Angel Garcia                                         */
    /* angel.j.garcia.m@gmail.com                           */
    /* Enero de 2014                                        */
    /********************************************************/

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//


//raiz del sitio
$path = "../";

// Inclusion de librerias
include $path."includes/theme.php";

$page_title = "P&aacute;gina de Prueba";
HeaderHTML($path, $page_title);

BodyInicio();

HeaderWrapper($path);

PageTitle($path, $page_title);

ContenidoInicio();

ContenedorInicio();

RowInicio();

echo "prueba de la pagina";

RowFin();

ContenedorFin();

ContenidoFin();

Footer($path);

ScriptsJS($path);

BodyFin();

?>