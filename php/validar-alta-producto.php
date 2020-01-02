<?php

include_once 'include/cn.php';

$nombre = $_POST['nombre'];

$precio = $_POST['precio'];

$fIngreso = $_POST['fIngreso'];

$cantidad = $_POST['cantidad'];

$stockMinimo = $_POST['stockMinimo'];

$stockMaximo = $_POST['stockMaximo'];

$proveedor = $_POST['proveedor'];

$categoria = $_POST['tp'];


if($stockMinimo > $stockMaximo){
    echo '<script>
	alert("ERROR:El Stock Minimo('.$stockMinimo.') es mayor que el Stock Maximo('.$stockMaximo.')");
	window.history.go(-1);
	</script>';
    die();
}


$caducidad = str_replace('/','-', date('y-m-d', strtotime($caducidad)));

$fIngreso = str_replace('/','-', date('y-m-d', strtotime($fIngreso)));


if($cantidad > $stockMaximo){
     echo '<script>
	alert("ERROR:La cantidad supera al StockMaximo('.$stockMaximo.')");
	window.history.go(-1);
	</script>';
    die();
}


if(repetido($nombre, $conexion) == 1){
     echo '<script>
	alert("ERROR: El producto ya esta registrado");
	window.history.go(-1);
	</script>';
}else{

    if(is_numeric($precio) && is_numeric($cantidad) && is_numeric($stockMinimo) && is_numeric($stockMaximo)){

         $sql_insert = "INSERT INTO productos (nombre, precio, idProveedor, idTipoProducto, fechaIngreso, cantidad, stockMinimo, stockMaximo) VALUES ('$nombre', '$precio', '$proveedor', '$categoria', '$fIngreso', '$cantidad', '$stockMinimo', '$stockMaximo')";

        echo '<script>
	alert("El producto se registro correctamente ");
        window.location="productos.php";

	</script>';

    $ejecutar = mysqli_query($conexion, $sql_insert);
    }
    else{
        echo '<script>
	alert("ERROR: El campo precio y cantidad debe ser solo numeros");
	window.history.go(-1);
	</script>';
    }





}



function repetido($nombre, $conexion){
    $insertar = "SELECT * FROM productos WHERE nombre = '$nombre'";
    $resultado = mysqli_query($conexion, $insertar);

    if(mysqli_num_rows($resultado) > 0){
        return 1;
    }else{
        return 0;
    }
}



?>
