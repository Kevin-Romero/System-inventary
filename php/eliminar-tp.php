<?php

if(empty($_REQUEST['id'])){
    header("Location: proveedores.php");
}
else{
    include_once 'include/cn.php';

    $id = $_GET['id'];
    
    $sql_select = "SELECT * FROM tipoProducto WHERE idTipoProducto = '$id'";
    
    $ejecutar_consulta = mysqli_query($conexion, $sql_select);
    
    $result = mysqli_num_rows($ejecutar_consulta);
    
    if($result > 0){
        $sql_delete = "DELETE FROM tipoProducto WHERE idTipoProducto = '$id'";
        
        $ejecutar_consulta = mysqli_query($conexion, $sql_delete);
        
        echo '<script>
        alert("El tipo de producto ha sido borrado correctamente");
        window.location="tp.php";
        
        </script>
        ';
        
    }
    else{
        echo '<script>
        alert("ERROR: El tipo de producto no existe");
        window.location="tp.php";
        
        </script>
        ';

    }

}





?>