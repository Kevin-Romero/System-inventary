<?php

$hostname = "localhost";
$user = "root";
$password = "";
$database = "inventario";

$conexion = mysqli_connect($hostname, $user, $password , $database);

$conexion -> set_charset("utf8");

//if($conexion){
//    echo "todo bien";
//}
//else{
//    echo "algo salio mal";
//}




?>