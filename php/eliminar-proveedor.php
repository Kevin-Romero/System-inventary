<?php

if(empty($_REQUEST['id'])){
    header("Location: proveedores.php");
}
else{
    include_once 'include/cn.php';

    $id = $_GET['id'];
    
    $sql_select = "SELECT * FROM proveedor WHERE idProveedor = '$id'";
    
    $ejecutar_consulta = mysqli_query($conexion, $sql_select);
    
    $result = mysqli_num_rows($ejecutar_consulta);
    
    if($result > 0){
        $sql_delete = "DELETE FROM proveedor WHERE idProveedor = '$id'";
        
        $ejecutar_consulta = mysqli_query($conexion, $sql_delete);
        
        echo '<script>
        alert("El Proveedor ha sido borrado correctamente");
        window.location="proveedores.php";
        
        </script>
        ';
        
    }
    else{
        echo '<script>
        alert("ERROR: El Proveedor no existe");
        window.location="proveedores.php";
        
        </script>
        ';

    }

}





?>