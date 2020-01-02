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

$sql_select = "SELECT * FROM proveedor ORDER BY nombre ASC";
$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_num_rows($ejecutar_consulta);

$sql_select_tp = "SELECT * FROM tipoProducto ORDER BY nombre ASC";
$ejecutar_consulta_tp = mysqli_query($conexion, $sql_select_tp);

$result_tp = mysqli_num_rows($ejecutar_consulta);


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
            overflow-x: auto;
        }

    </style>

    <title>SCA / Productos / Alta de Productos</title>
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
            <h2>Alta de Productos</h2>

        </div>
        <div class="nav">
            <a href="../php/logn-out.php" onclick="return confirmLognOut()"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </header>


    <div class="form-container mt-5">


            <form action="validar-alta-producto.php" id="form" method="post" enctype="multipart/form-data">
                <div class="input-modificar-container">

                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre"  required>

                    <label for="precio">Precio: </label>
                    <input type="text" class="form-control" name="precio" id="precio" required>

                    <label for="fIngreso">Fecha de Ingreso:</label>
                    <input type="date" class="form-control" name="fIngreso" id="fIngreso" required>

                    <label for="cantidad">Cantidad:</label>
                    <input type="text" class="form-control" name="cantidad" id="cantidad" required>

                    <label for="stockMinimo">Stock Minimo:</label>
                    <input type="text" id="stockMinimo" class="form-control" name="stockMinimo" required>

                    <label for="stockMaximo">Stock Maximo:</label>
                    <input type="text" id="stockMaximo" class="form-control" name="stockMaximo" required>

                    <label for="proveedor">Proveedor</label>
                    <select name="proveedor" id="proveedor" class="form-control" required>

                      <option value="">Seleccione</option>

                       <?
                        if($result >0){
                    while($data = mysqli_fetch_array($ejecutar_consulta)){


                            ?>

                        <option value="<?php echo $data['idProveedor']; ?>"><?php echo $data['nombre']; ?></option>
                        <?php  }} ?>

                    </select>
                    <br>
                    <label for="tp">Categoria</label>
                    <select name="tp" id="tp" class="form-control" required>
                        <option value="">Seleccione</option>

                        <?
                        if($result_tp >0){
                    while($data_tp = mysqli_fetch_array($ejecutar_consulta_tp)){ ?>

                       <option value="<?php echo $data_tp['idTipoProducto']; ?>"><?php echo $data_tp['nombre']; ?></option>

                    <? }} ?>
                    </select>

                    <input type="submit" id="btn-guardar" class="btn btn-warning" value="Guardar">
                    <a href="productos.php" class="btn btn-danger mr-3">Cancelar</a>

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

</body>
</html>


<?php ?>
