<?php

if(empty($_REQUEST['id'])){
    header("Location: proveedores.php");
}
else{
    include_once 'include/cn.php';

    $id = $_GET['id'];

session_start();

$varsesion = $_SESSION['user'];

if($varsesion == null || $varsesion == ''){
    echo '<script>
        alert("Useted no tiene Autorizacion");
        window.location="../index.html";
        
        </script>
    ';
    die();
} 

$sql_select = "SELECT idProducto, productos.nombre, precio, proveedor.nombre as 'Proveedor', proveedor.idProveedor as 'idProveedor', tipoProducto.nombre as 'Categoria', tipoProducto.idTipoProducto as idTP, fechaIngreso, cantidad, stockMinimo, stockMaximo from productos inner join  proveedor on proveedor.idProveedor = productos.idProveedor inner join tipoProducto on tipoProducto.idTipoProducto = productos.idTipoProducto where idProducto = '$id'";
    
    
$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_num_rows($ejecutar_consulta);
    
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="../css/Normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/nav-style.css">
    <link rel="stylesheet" href="../css/home-style.css">


     <style>
         .form-container .input-modificar-container {
             overflow-x: auto;
         }
    </style>
      
    
    <title>SCA / Productos / Mas Datos y Modificar</title>
</head>

<script>

    function confirmLognOut(){
        var answer = confirm("Esta seguro que desea cerrar session");
        
        if(answer == true){
            return true;
        }
        else{
            return false;
        }
    }
    
</script> 

<body>
  
    <?php include 'include/nav.php'; 
    
        if($result >0){
                    while($data = mysqli_fetch_array($ejecutar_consulta)){
        
    ?>
    
    <div class="main">
       
    <header class="nav-container">
        <div class="nav-title">
            <h2>Modificar Datos de <?php echo $data['nombre']; ?></h2>
            
        </div>
        <div class="nav">
            <a href="../php/logn-out.php" onclick="return confirmLognOut()"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </header>
    
     
    <div class="form-container mt-5">
     

            <form action="validar-modificar-productos.php" method="post" enctype="multipart/form-data">
                <div class="input-modificar-container">
                    <label for="id">Clave:</label> 
                    <input type="text" class="form-control" name="id" id="id" value="<?php echo $data['idProducto'];?>" disabled>
                    <input type="text" value="<?php echo $data['idProducto']; ?>" name="idProducto" id="idProveedor">
                    
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $data['nombre']; ?>" required>
                
                    <label for="direccion">Precio:</label>
                    <input type="text" class="form-control" name="precio" id="precio" value="<?php echo $data['precio']; ?>" required>
                    
                    <label for="telefono">Proveedor:</label>
                    <select name="proveedor" id="" class="form-control" required>
                      
                      
                       
                        <option value="<?php echo $data['idProveedor']; ?>"><?php echo $data['Proveedor']; ?></option>
                        
                        <?php
                         /* TIPOS DE PRODUCTOS */    
                    $sql_select_pv = "SELECT * FROM proveedor ORDER BY nombre ASC";

                    $ejecutar_pv =  mysqli_query($conexion, $sql_select_pv);

                    $result_pv = mysqli_num_rows($ejecutar_pv); 
                        
                    while($data_pv = mysqli_fetch_array($ejecutar_pv)){
                        
                        
                        ?>
                        
                        <option value="<?php echo $data_pv['idProveedor']; ?>"><?php echo $data_pv['nombre']; ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    
                    <label for="telefono">Fecha de Ingreso:</label>
                    <input type="date" class="form-control" name="fIngreso" id="telefono" value="<?php echo $data['fechaIngreso']; ?>" required>
                    
                    <label for="telefono">Cantidad:</label>
                    <input type="text" class="form-control" name="cantidad" id="cantidad" value="<?php echo $data['cantidad']; ?>" required>
                    
                    <label for="stockMinimo">Stock Minimo</label>
                    <input type="text" id="stockMinimo" class="form-control" name="stockMinimo" value="<?php echo $data['stockMinimo']; ?>" required>
                    
                    <label for="stockMaximo">Stock Maximo</label>
                    <input type="text" id="stockMaximo" class="form-control" name="stockMaximo" value="<?php echo $data['stockMaximo']; ?>" required>
                    
                    <label for="tp">Tipo de Producto:</label>
                    <select name="tp" id="tp" class="form-control" required>     
                    
                    <option value="<?php echo $data['idTP'] ?>"><?php echo $data['Categoria']; ?></option>
                    
                    <?php      
    
                                            
                        /* TIPOS DE PRODUCTOS */    
                    $sql_select_tp = "SELECT * FROM tipoProducto ORDER BY nombre ASC";

                    $ejecutar_tp =  mysqli_query($conexion, $sql_select_tp);

                    $result_tp = mysqli_num_rows($ejecutar_tp); 
                        
                    while($data_tp = mysqli_fetch_array($ejecutar_tp)){
                        
                        ?>                 
                    
                     <option value="<?php echo $data_tp['idTipoProducto']; ?>"><?php echo $data_tp['nombre']; ?></option>
                      
                      <?php }} } ?>
                      
                    </select>
                    <br>
                    <br>
                    
                    <input type="submit" class="btn btn-warning" value="Guardar">
                    <a href="#" class="btn btn-danger mr-3" onclick="back()">Cancelar</a>

                </div>
            </form>  
    
    </div>
    
       <!-- The Modal -->
    

     
    </div>
    
 
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <scrip src="../js/bootstrap.min.js"></scrip>
    <script src="../js/nav.js"></script>
    
    <script>
    
        function back(){
            window.location="productos.php";
        }
    
    </script>
    

    
   
</body>
</html>


<?php }?> 