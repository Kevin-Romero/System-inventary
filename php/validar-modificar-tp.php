<?php

include_once 'include/cn.php';

$id = $_POST['idTipoProducto'];

$nombre = $_POST['nombre'];


$sql_select = "SELECT * FROM tipoProducto WHERE idTipoProducto = '$id'";

$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_fetch_array($ejecutar_consulta);
$result = count($result);

if($result > 0){
    
        $sql_modificar = "UPDATE tipoProducto SET nombre = '$nombre' WHERE idTipoProducto = '$id'";

        $ejecutar_consulta = mysqli_query($conexion, $sql_modificar);
    
        echo '<script>
        alert("Los datos han sido actualizado correctamente");
        window.location="tp.php";
        
        </script>
    ';

}
else{
    
    echo '<script>
        alert("ERROR: No se pudo guardar la modificacion);
        window.location="tp.php";
        
        </script>
    ';
    
}

