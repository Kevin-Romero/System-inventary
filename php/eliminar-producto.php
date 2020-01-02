<?php
if(empty($_REQUEST['id'])){
    header("Location: productos.php");
}
else{
    include_once 'include/cn.php';

    $id = $_GET['id'];
    
    $sql_select = "SELECT * FROM productos WHERE idProducto = '$id'";
    
    $ejecutar_consulta = mysqli_query($conexion, $sql_select);
    
    $result = mysqli_num_rows($ejecutar_consulta);
    
    if($result > 0){
        $sql_delete = "DELETE FROM productos WHERE idProducto = '$id'";
        
        $ejecutar_consulta = mysqli_query($conexion, $sql_delete);
        
        echo '<script>
        alert("El Producto ha sido borrado correctamente");
        window.location="productos.php";
        
        </script>
        ';
        
    }
    else{
        echo '<script>
        alert("ERROR: El Producto no existe");
        window.location="productos.php";
        
        </script>
        ';

    }

}





?>