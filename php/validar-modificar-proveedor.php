<?php

include_once 'include/cn.php';

$id = $_POST['idProveedor'];

$nombre = $_POST['nombre'];

$direccion = $_POST['direccion'];

$telefono = $_POST['telefono'];



$sql_select = "SELECT * FROM proveedor WHERE idProveedor = '$id'";

$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_fetch_array($ejecutar_consulta);
$result = count($result);

if($result > 0){
    
    if(is_numeric($telefono)){
        $sql_modificar = "UPDATE proveedor SET nombre = '$nombre', direccion = '$direccion', telefono = '$telefono' WHERE idProveedor = '$id'";

        $ejecutar_consulta = mysqli_query($conexion, $sql_modificar);
    
        echo '<script>
        alert("Los datos han sido actualizado correctamente");
        window.location="proveedores.php";
        
        </script>
    ';
    }
    else{
            echo '<script>
            alert("ERROR: El campo telefono debe ser solo numeros");
            window.history.go(-1);
            </script>';
    }
    
    
}
else{
    
    echo '<script>
        alert("ERROR: No se pudo guardar la modificacion);
        window.location="proveedores.php";
        
        </script>
    ';
    
}

