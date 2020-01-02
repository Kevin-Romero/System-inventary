<?php

include_once 'include/cn.php';

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

$sql_select = "SELECT idProducto, productos.nombre, precio, proveedor.nombre as 'Proveedor', fechaIngreso, caducidad from productos inner join  proveedor on proveedor.idProveedor = productos.idProveedor";

$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_num_rows($ejecutar_consulta);

?>

<style>

    .query-botton-container{
        width: 100%;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .query-botton-container a{
        margin: 10px;
    }

</style>

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

    
    <title>SCA / Proveedores</title>
</head>

<script>

    function confirmLognOut(){
        var answer = confirm("Esta seguro que desea cerrar session");
        
        if(answer != true){
            return false;
        }
        else{
            return true;
        }
       
    }
    
</script> 


<body>
  
    <?php include 'include/nav.php'; ?>
    
    <div class="main">
       
    <header class="nav-container">
        <div class="nav-title">
            <h2>Mantenimiento de Productos</h2>
        </div>
        <div class="nav">
            <a href="../php/logn-out.php" onclick="return confirmLognOut()"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </header>

    
    <div class="query-botton-container">
        <a href="consulta-producto-caro.php" class="btn btn-primary">El producto mas caro</a>
        <a href="consulta-ultimo-producto.php" class="btn btn-success">El ultimo Producto registrado</a>
        <a href="consulta-proovedor-mas-productos.php" class="btn btn-warning">El proveedor con mas productos registrados</a>
        <a href="consulta-producto-menor-existencia.php" class="btn btn-dark">El producto con menor existencia</a>
    </div>
    
       <!-- The Modal -->
    

     
    </div>
    
 
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <scrip src="../js/bootstrap.min.js"></scrip>
    <script src="../js/nav.js"></script>
    
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        var close = document.getElementsByClassName("cancelar")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>
    
    <script>

    function confirmDelete(){
        var answer = confirm("Esta seguro que desea borrar los datos del proveedor");
        
        if(answer == true){
            return true;
        }
        else{
            return false;
        }
    }
    
</script> 
   
</body>
</html>