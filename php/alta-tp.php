<?php

include_once 'include/cn.php';

$nombre = $_POST['nombre'];

if(repetido($nombre, $conexion) == 1){
     echo '<script>
	alert("ERROR: La categoria ya esta registrado");
	window.history.go(-1);
	</script>';
}else{
    
        echo '<script>
	alert("La categoria se registro correctamente");
    window.location="tp.php";
	</script>';
    
    $sql_insert = "INSERT INTO tipoProducto (nombre) VALUES ('$nombre')";
    
    $ejecutar = mysqli_query($conexion, $sql_insert);
    
    

}



function repetido($nombre, $conexion){
    $insertar = "SELECT * FROM tipoProducto WHERE nombre = '$nombre'";
    $resultado = mysqli_query($conexion, $insertar);
    
    if(mysqli_num_rows($resultado) > 0){
        return 1;
    }else{
        return 0;
    }
}

?>