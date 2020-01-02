<?php

include_once 'include/cn.php';

$id = $_POST['id'];

$fechaIngreso = $_POST['fechaIngreso'];

$cantidadActual = $_POST['cantidad'];

$stockMaximo = $_POST['stockMaximo'];

$entrada = $_POST['entrada'];


$cantidad = $cantidadActual + $entrada;


$fechaIngreso = str_replace('/','-', date('Y-m-d', strtotime($fechaIngreso)));


if($entrada < 1 || $entrada == null || $entrada == ""){
  echo '<script>
    alert("ERROR: Es necesario insertar una cantidad mayor a 0");
    window.location="mantenimiento-pds.php?id='.$id.'";
    </script>';
      die();
}else{

if($cantidad > $stockMaximo){
    echo '<script>
	alert("ERROR: La cantidad de producto es mayor al Stock Maximo ('.$stockMaximo.')");
  window.location="mantenimiento-pds.php?id='.$id.'";
	</script>';
    die();
}
}


$sql_select = "SELECT * FROM productos WHERE idProducto = '$id'";

$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_fetch_array($ejecutar_consulta);
$result = count($result);

$result_mantenimiento = mysqli_num_rows($ejecutar_consulta);


if($result > 0){

if(is_numeric($entrada)){


         $sql_modificar = "UPDATE productos SET cantidad = '$cantidad', fechaIngreso = '$fechaIngreso' WHERE idProducto = '$id'";


        $ejecutar = mysqli_query($conexion, $sql_modificar);


        echo '<script>
	alert("Se a agregado la entrada de producto");
  window.location="mantenimiento-pds.php?id='.$id.'";

	</script>';


    }
    else{
        echo '<script>
	alert("ERROR: El campo cantidad debe ser solo numeros");
	window.history.go(-1);
	</script>';
    }

}
else{

    echo '<script>
        alert("ERROR: No se pudo agregar el producto);
        window.location="mantenimiento-pds.php?id='.$id.'";

        </script>
    ';

}
