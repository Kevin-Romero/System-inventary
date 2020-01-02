<?php

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

    
    <title>TeWeb</title>
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
  
    <?php include 'include/nav.php'; ?>
   
    <div class="main">
       
    <header class="nav-container">
        <div class="nav-title">
            <h2>Sistema de control de almacen</h2>
        </div>
        <div class="nav">
            <a href="../php/logn-out.php" onclick="return confirmLognOut()"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </header>
    
    <div class="messaje-box-container">
        <div class="messaje-box-title">
            <h2>Bienvenido Administrador</h2>
        </div>
        <div class="messaje-box-body">
            <p>Este es un sistema de control de almacen que tiene como propocito ayudar a comercios pequeño que necesiten tener un control de su inventario de forma facil y sencilla.</p>
            
            <ul class="list-group">
                <li class="list-group-item list-group-item-primary">Las funciones de este sistema son las siguientes:</li>
                <li class="list-group-item">Dar de mantenimiento(Alta,modificar y baja) de productos</li>
                <li class="list-group-item">Mantenimiento(Alta,modificar y baja) a proveedores</li>
                <li class="list-group-item">Generar reportes imprimibles</li>
            </ul>
        </div>
    </div>
     
    </div>
    
    
 
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="../js/nav.js"></script>
    
   
</body>
</html>