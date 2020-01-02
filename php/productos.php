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

$sql_select = "SELECT idProducto, productos.nombre, precio, proveedor.nombre as 'Proveedor', fechaIngreso from productos inner join  proveedor on proveedor.idProveedor = productos.idProveedor ORDER BY idProducto";

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

<style>


</style>

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


    <div class="list-container">

        <div class="header-table">


            <form action="buscar-producto.php" method="get" enctype="multipart/form-data">

               <label for="">Tipo de Busqueda:</label>
               <select name="tipo-busqueda" id="" class="btn btn-dark m-2" required>
                  <option value="">Selecccione</option>
                   <option value="idProducto">Clave</option>
                   <option value="productos.nombre">Nombre</option>
               </select>


                <input type="text" name="buscar" id="buscar" placeholder="Buscar: " required>
                <input type="submit" value="Buscar" class="btn btn-buscar" >
            </form>

            <div class="btn-new-container">
                <a href="alta-producto.php" class="btn btn-success">Nuevo</a>
            </div>




        </div>



        <div class="search-box-result-container" id="data">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Clave</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Proveedor</th>
                  <th scope="col">F.Ingreso</th>
                  <th scope="col">Operaciones</th>
                </tr>
              </thead>
              <tbody>
               <?
                if($result >0){
                    while($data = mysqli_fetch_array($ejecutar_consulta)){


                ?>
                <tr>
                  <th scope="row"><?php echo $data['idProducto']; ?></th>
                  <td><?php echo $data['nombre']; ?></td>
                  <td><?php echo $data['precio']; ?></td>
                  <td><?php echo $data['Proveedor']; ?></td>
                  <td><?php echo $data['fechaIngreso']; ?></td>
                  <td class="colum-operation">
                      <a href="modificar-productos.php?id=<?php echo $data['idProducto']; ?>" class="btn btn-warning">Mas Datos</a>
                      <a href="eliminar-producto.php?id=<?php echo $data['idProducto']; ?>" class="btn btn-danger" onclick="return confirmDelete()">Eliminar</a>
                  </td>

                </tr>

                        <?php } } ?>

              </tbody>
            </table>
        </div>


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
        var answer = confirm("Esta seguro que desea borrar los datos del producto");

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
