<?php

include_once 'include/cn.php';

$id = $_POST['idProducto'];

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


if($cantidad > $stockMaximo){
    echo '<script>
	alert("ERROR: La cantidad de producto supera al Stock Maximo('.$stockMaximo.')");
	window.history.go(-1);
    </script>';
    die();
}

$fIngreso = str_replace('/','-', date('y-m-d', strtotime($fIngreso)));


$sql_select = "SELECT * FROM productos WHERE idProducto = '$id'";

$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_fetch_array($ejecutar_consulta);
$result = count($result);



if($result > 0){
    
if(is_numeric($precio) && is_numeric($cantidad) && is_numeric($stockMinimo) && is_numeric($stockMaximo)){
        
                
         $sql_modificar = "UPDATE productos SET idProducto = '$id', nombre = '$nombre', precio = '$precio', idProveedor = '$proveedor', idTipoProducto = '$categoria', fechaIngreso = '$fIngreso', cantidad = '$cantidad', stockMinimo = '$stockMinimo', stockMaximo = '$stockMaximo' WHERE idProducto = '$id'";
        
        
        $ejecutar = mysqli_query($conexion, $sql_modificar);

        
        echo '<script>
	alert("Los cambios se guardaron correctamente");
        window.location="productos.php";
	</script>';
        
    }
    else{
        echo '<script>
	alert("ERROR: El campo precio, cantidad, StockMinimo y stockMaximo debe ser solo numeros");
	window.history.go(-1);
	</script>';
    }

}
else{
    
    echo '<script>
        alert("ERROR: No se pudo guardar la modificacion);
        window.location="productos.php";
        
        </script>
    ';
    
}    
