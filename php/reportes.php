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
            <h2>Sistema de Control de Almacen</h2>
        </div>
        <div class="nav">
            <a href="../php/logn-out.php" onclick="return confirmLognOut()"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </header>

    <h2 class="text-center mt-3">Reportes de Productos de Almacen </h2>

     <div class="reportes-container mt-3 ml-3">
         <a href="#" class="btn btn-dark m-4" data-toggle="modal" data-target="#exampleModal" onclick="proveedorTp()">Por Proveedores</a>
         <a href="#" class="btn btn-dark m-4" onclick="stockMinimoTp()">Por stock minimo</a>
     </div>

    </div>


  <!-- The Modal -->
    <div id="myModal-proveedor-tp" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-proveedor-header">
            <h2 class="modal-title text-center">Reportes de Productos de Almacen Por Proveedores</h2>
        </div>
        <div class="modal-proveedor-body">
            <div class="form-container">
                <form action="validar-reporte-proveedor-tp.php" method="POST" enctype="multipart/form-data">
                    <div class="input-container">
                        <input type="text" name="idProveedor"   placeholder="Clave del Proveedor" required>
                        <!-- <input type="text" name="idTp" placeholder="Clave Tipo de Producto" required> -->
                    </div>
                        <input type="submit" value="Generar Reporte" class="btn btn-success">
                        <a href="" class="btn btn-light mr-3 cancelar">Cancelar</a>
                </form>

            </div>
        </div>
      </div>

    </div>


      <!-- The Modal -->
    <div id="myModal-stockMinimo-tp" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-proveedor-header">
            <h2 class="modal-title text-center">Reportes de Productos de Almacen Por stock minimo</h2>
        </div>
        <div class="modal-proveedor-body">
            <div class="form-container">
              <div class="alert alert-danger" role="alert">
                Elije el tipo de ordenamiento que quieres.
              </div>
                <form action="validar-reporte-stockminimo.php" method="POST" enctype="multipart/form-data">

                      <select class="form-control" name="option" required>
                        <option value="">Select</option>
                        <option value="proveedor.nombre">Proveedor</option>
                        <option value="cantidad">Cantidad</option>
                        <option value="tipoProducto.nombre">Tipo de Producto</option>
                      </select>


                        <input type="submit" value="Generar Reporte" class="btn btn-success">
                        <a href="" class="btn btn-light mr-3 cancelar">Cancelar</a>
                </form>

            </div>
        </div>
      </div>

    </div>





    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/nav.js"></script>

    <script>

        function proveedorTp(){


        // Get the modal
        var modal = document.getElementById("myModal-proveedor-tp");


        // Get the <span> element that closes the modal

        var span = document.getElementsByClassName("cancelar")[0];

        // When the user clicks the button, open the modal
          modal.style.display = "block";

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
        }

    </script>


    <script>

        function stockMinimoTp(){


        // Get the modal
        var modal = document.getElementById("myModal-stockMinimo-tp");


        // Get the <span> element that closes the modal

        var span = document.getElementsByClassName("cancelar")[0];

        // When the user clicks the button, open the modal
          modal.style.display = "block";

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
        }

    </script>


</body>
</html>
