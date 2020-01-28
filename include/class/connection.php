<?php
global $link;

$link = mysqli_connect('localhost', 'root', '', 'tasklist');
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}

mysqli_query($link,"SET NAMES 'utf8'");
mysqli_query($link,'SET character_set_connection=utf8');
mysqli_query($link,'SET character_set_client=utf8');
mysqli_query($link,'SET character_set_results=utf8');


