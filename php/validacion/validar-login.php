<?php

include_once '../include/cn.php';

$user = $_POST['user'];
$password = $_POST['password'];


session_start();

$_SESSION['user'] = $user;



$sql_select = "SELECT * FROM usuario WHERE usuario = '$user' AND password = '$password'";

$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$filas = mysqli_num_rows($ejecutar_consulta);

if($filas > 0){
    header('Location: ../home.php');
}
else{
    echo '<script>
        alert("El usuario o la contrasena son incorrectos");
        window.location="../../index.html";
        
        </script>
    ';
}

mysqli_free_result($ejecutar_consulta);
mysqli_close($conexion);


?>