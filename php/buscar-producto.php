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

$buscar = $_REQUEST['buscar'];
$tipoBusqueda = $_REQUEST['tipo-busqueda'];

if(empty($buscar)){
    header("Location: productos.php");
//    echo '<script>
//        alert("El usuario o la contrasena son incorrectos");
//        </script>
//    ';
}

if($tipoBusqueda == "idProducto"){

    $sql_select = "SELECT idProducto, productos.nombre, precio, fechaIngreso, proveedor.nombre as 'Proveedor' FROM productos INNER JOIN proveedor on proveedor.idProveedor = productos.idProveedor WHERE $tipoBusqueda LIKE '$buscar' GROUP BY idProducto ORDER BY idProducto LIMIT 1";
}
else{

$sql_select = "SELECT idProducto, productos.nombre, precio, fechaIngreso, proveedor.nombre as 'Proveedor' FROM productos INNER JOIN proveedor on proveedor.idProveedor = productos.idProveedor WHERE $tipoBusqueda LIKE '%$buscar%' GROUP BY idProducto ORDER BY idProducto";

}

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


    <title>SCA / Productos / Busqueda de Productos</title>
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


            <form action="">

               <label for="">Tipo de Busqueda:</label>
               <select name="tipo-busqueda" id="" class="btn btn-dark m-2" required>
                  <option value="">Selecccione</option>
                   <option value="idProducto">Clave</option>
                   <option value="productos.nombre">Nombre</option>
               </select>

                <input type="text" name="buscar" id="buscar" placeholder="Buscar: " required value="<?php echo $buscar; ?>">
                <input type="submit" value="Buscar" class="btn btn-buscar">
                <a href="productos.php" class="btn btn-danger">Cancelar</a>
            </form>

            <div class="btn-new-container">
                <button id="myBtn" class="btn btn-success">Nuevo</button>
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

                        <?php } }
                  else{
                      if(is_numeric($buscar)){
                                echo '<script>
                           alert("El producto con clave '.$buscar.' no existe");
                            window.history.go(-1);
                           </script>';
                            }else{
                            echo '<script>
                           alert("El producto '.$buscar.' no existe");
                            window.history.go(-1);
                           </script>';
                            }
                  }




                  ?>

              </tbody>
            </table>
        </div>


    </div>


    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-proveedor-header">
            <h2 class="modal-title text-center">Alta de Proveedor</h2>

        </div>
        <div class="modal-proveedor-body">
            <div class="form-container">
                <form action="alta-proveedor.php" method="POST" enctype="multipart/form-data">
                    <div class="input-container">
                        <input type="text" name="nombre" placeholder="Nombre" required>
                        <input type="text" name="direccion" placeholder="Direccion" required>
                        <input type="text" name="telefono" placeholder="Telefono" required>
                    </div>
                        <input type="submit" value="Enviar" class="btn btn-success">
                        <a href="proveedores.php" class="btn btn-light mr-3 cancelar">Cancelar</a>
                </form>
                <br>
                <br>
                <div class="alert alert-danger mb-0 mt-1" role="alert">
                    <p class="mb-0 alert-modal">La clave del proveedor se guardara automaticamente</p>
                </div>
            </div>
        </div>
      </div>

    </div>

    </div>


    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <scrip type="text/javascript" src="../js/search-db.js"></scrip>
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
