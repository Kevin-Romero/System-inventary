<?php

include_once 'include/cn.php';

$id = $_POST['id'];


$cantidadActual = $_POST['cantidad'];

$entrada = $_POST['entrada'];

$fechaIngreso = $_POST['fechaIngreso'];

$cantidad = $cantidadActual - $entrada;


if($cantidad < 0){
    echo '<script>
	alert("ERROR: La salida de producto es mayor a la cantidad actual('.$cantidadActual.')");
    window.location="mantenimiento-pds.php?id='.$id.'";
    </script>';
    die();
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
alert("Se le a dado salida de producto");
  </script>';

echo '<script>

  var answer = confirm("Deseas generar factura");

    if(answer == true){
      window.open("pdf4.php?id='.$id.'&fechaIngreso='.$fechaIngreso.'&$cantidadActual='.$cantidadActual.'&entrada='.$entrada.'&cantidad='.$cantidad.'","_blank");

      window.history.back(-1);
      window.location="pdf4.php?id='.$id.'&fechaIngreso='.$fechaIngreso.'";
    }
    else{
      window.location="mantenimiento-pds.php?id='.$id.'";
    }

</script>';

    }

}
else{

    echo '<script>
        alert("ERROR: No se pudo guardar la modificacion);
        window.location="mantenimiento-pds.php?id='.$id.'";

        </script>
    ';

}
