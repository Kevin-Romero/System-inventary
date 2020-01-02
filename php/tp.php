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

$sql_select = "SELECT * FROM tipoProducto";
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
    .form-container .input-modificar-container{
        max-width: 500px;
    }
    </style>
    <title>SCA / Tipos de Productos</title>
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
            <h2>Mantenimiento de los Tipos de Productos</h2>
        </div>
        <div class="nav">
            <a href="../php/logn-out.php" onclick="return confirmLognOut()"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </header>


    <div class="list-container">

        <div class="header-table">


          <form action="buscar-tp.php" method="get" enctype="multipart/form-data">

             <label for="">Tipo de Busqueda:</label>
             <select name="tipo-busqueda" id="" class="btn btn-dark m-2" required>
                <option value="">Selecccione</option>
                 <option value="idTipoProducto">Clave</option>
                 <option value="nombre">Nombre</option>
             </select>

              <input type="text" name="buscar" id="buscar" placeholder="Buscar: " required>
              <input type="submit" value="Buscar" class="btn btn-buscar">
          </form>

            <div class="btn-new-container">
                <button id="myBtn" class="btn btn-success" >Nuevo</button>
            </div>




        </div>



        <div class="search-box-result-container" id="data">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Clave</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Operaciones</th>
                </tr>
              </thead>
              <tbody>
               <?
                if($result >0){
                    while($data = mysqli_fetch_array($ejecutar_consulta)){


                ?>
                <tr>
                  <th scope="row"><?php echo $data['idTipoProducto']; ?></th>
                  <td><?php echo $data['nombre']; ?></td>
                  <td class="colum-operation">
                      <a href="modificar-tp.php?id=<?php echo $data['idTipoProducto'] ?>" class="btn btn-warning">Modificar</a>
                      <a href="eliminar-tp.php?id=<?php echo $data['idTipoProducto']; ?>" class="btn btn-danger" onclick="return confirmDelete()">Eliminar</a>
                  </td>

                </tr>

                        <?php } } ?>

              </tbody>
            </table>
        </div>


    </div>

       <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-proveedor-header">
            <h2 class="modal-title text-center">Alta de Tipo de Producto</h2>

        </div>
        <div class="modal-proveedor-body">
            <div class="form-container">
                <form action="alta-tp.php" method="POST" enctype="multipart/form-data">
                    <div class="input-container">
                        <input type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                        <input type="submit" value="Enviar" class="btn btn-success">
                        <a href="tp.php" class="btn btn-light mr-3 cancelar">Cancelar</a>
                </form>
                <br>
                <br>
                <div class="alert alert-danger mb-0 mt-1" role="alert">
                    <p class="mb-0 alert-modal">La clave del tipo de producto se guardara automaticamente</p>
                </div>
            </div>
        </div>
      </div>

    </div>


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
        var answer = confirm("Esta seguro que desea borrar los datos del tipo de Producto");

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
