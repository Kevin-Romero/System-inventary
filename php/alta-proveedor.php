<?php

include_once 'include/cn.php';

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

if(repetido($nombre, $conexion) == 1){
     echo '<script>
	alert("ERROR: El proveedor ya esta registrado");
	window.history.go(-1);
	</script>';
}else{
    
    if(is_numeric($telefono)){
        echo '<script>
	alert("El proveedor se registro correctamente");
    window.location="proveedores.php";
	</script>';
    
    $sql_insert = "INSERT INTO proveedor (nombre, direccion, telefono) VALUES ('$nombre', '$direccion', '$telefono')";
    
    $ejecutar = mysqli_query($conexion, $sql_insert);
    }
    else{
        echo '<script>
	alert("ERROR: El campo telefono debe ser solo numeros");
	window.history.go(-1);
	</script>';
    }
    
    

}



function repetido($nombre, $conexion){
    $insertar = "SELECT * FROM proveedor WHERE nombre = '$nombre'";
    $resultado = mysqli_query($conexion, $insertar);
    
    if(mysqli_num_rows($resultado) > 0){
        return 1;
    }else{
        return 0;
    }
}

?>