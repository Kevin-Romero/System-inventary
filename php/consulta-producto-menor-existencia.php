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

$tipoProducto = $_POST['tipoProductos'];

if($tipoProducto == "todos"){

    $sql_select = "SELECT idProducto, productos.nombre, precio, proveedor.nombre as 'Proveedor', cantidad, fechaIngreso from productos inner join  proveedor on proveedor.idProveedor = productos.idProveedor WHERE cantidad <= stockMinimo ORDER BY productos.cantidad ASC";

}
else{

$sql_select = "SELECT idProducto, productos.nombre, precio, proveedor.nombre as 'Proveedor', cantidad, fechaIngreso from productos inner join  proveedor on proveedor.idProveedor = productos.idProveedor WHERE cantidad <= stockMinimo AND idTipoProducto = '$tipoProducto' ORDER BY productos.cantidad ASC";
}

$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_num_rows($ejecutar_consulta);


//    NOMBRE DE TIPO DE PRODUCTOS

$sql_select_tp = "SELECT * FROM tipoProducto WHERE idTipoProducto = '$tipoProducto'";


$ejecutar_consulta_tp = mysqli_query($conexion, $sql_select_tp);

$result_tp = mysqli_num_rows($ejecutar_consulta_tp);



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


<body>

    <?php include 'include/nav.php'; ?>

    <div class="main">

    <header class="nav-container">
        <div class="nav-title">
            <h2>Consulta - Productos a resurtir</h2>
        </div>
        <div class="nav">
            <a href="../php/logn-out.php" onclick="return confirmLognOut()"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </header>


    <div class="list-container">

        <?
                if($result_tp >0){
                    while($data_tp = mysqli_fetch_array($ejecutar_consulta_tp)){
        ?>

            <h3>Tipo de Producto: <?php echo $data_tp['nombre'];
                ?></h3>

            <?php

                    }}
        else{

            ?>

            <h3>Tipo de Productos: Todos</h3>
            <?php } ?>

        <div class="header-table">
            <a href="consulta-productos.php" class="btn btn-dark">Atras</a>
        </div>



        <div class="search-box-result-container" id="data">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Clave</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Proveedor</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">F.Ingreso</th>
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
                  <td><?php echo $data['cantidad']; ?></td>
                  <td><?php echo $data['fechaIngreso']; ?></td>

                </tr>

                        <?php } }

                          else{
                            echo '<script>
                                alert("No hay productos a resurtir");
                                window.location="consulta-productos.php";

                                </script>
                            ';
                          }

                         ?>

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
