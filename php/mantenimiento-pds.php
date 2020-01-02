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

$id = $_REQUEST['id'];

if($id == null || $id == '' || $id < 1){
      echo '<script>
          alert("ERROR: id no valido");
          window.location="mantenimiento-productos.php";

          </script>
      ';
      die();
  }

$sql_select = "SELECT idProducto, productos.nombre, cantidad, stockMaximo, fechaIngreso from productos inner join  proveedor on proveedor.idProveedor = productos.idProveedor WHERE idProducto = '$id' ORDER BY idProducto";


$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_num_rows($ejecutar_consulta);





$ejecutar_consulta_p = mysqli_query($conexion, $sql_select);

$result_p = mysqli_num_rows($ejecutar_consulta);

    $ejecutar_consulta_p2 = mysqli_query($conexion, $sql_select);

$result_p2 = mysqli_num_rows($ejecutar_consulta);


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


         .entrada-salida-container{
             width: 90%;
             margin: auto;
             display: -webkit-flex;
             display: -moz-flex;
             display: -ms-flex;
             display: -o-flex;
             display: flex;
             justify-content: space-between;
             align-items: center;
         }

         .btn-mantenimiento{
           width: 100%;
           display: -webkit-flex;
           display: -moz-flex;
           display: -ms-flex;
           display: -o-flex;
           display: flex;
           justify-content: space-between;
           align-items: center;
           margin: auto;
         }


    </style>


    <title>SCA / Proveedores</title>
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




    ?>

    <div class="main">

    <header class="nav-container">
        <div class="nav-title">
          <h2>Mantenimiento Fuerte a Productos</h2>

        </div>
        <div class="nav">
            <a href="../php/logn-out.php" onclick="return confirmLognOut()"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </header>

    <div class="list-container mt-0">

      <br>
      <br>

        <div class="header-table">

          <a href="mantenimiento-productos.php" class="btn btn-dark mt-3 mb-4">Atras</a>


        </div>





        <div class="search-box-result-container" id="data">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Clave</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Stock Maximo</th>
                  <th scope="col">Fecha de Ingreso</th>
                  <th scope="col">Operaciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>

                  <?php if($result >0){
                              while($data = mysqli_fetch_array($ejecutar_consulta)){ ?>


                  <th scope="row"><?php echo $data['idProducto']; ?></th>
                  <td><?php echo $data['nombre']; ?></td>
                  <td><?php echo $data['cantidad']; ?></td>
                  <td><?php echo $data['stockMaximo']; ?></td>
                  <td><?php echo $data['fechaIngreso']; ?></td>
                  <td class="colum-operation">
                    <a href="#" class="btn btn-success" onclick="entrada()">Entrada</a>
                    <a href="#" class="btn btn-danger ml-3" onclick="salida()">Salida</a>
                  </td>
                </tr>

                        <?php } } ?>

              </tbody>
            </table>
        </div>


    </div>

    <!-- The Modal -->
 <div id="myModal-entrada" class="modal">

   <!-- Modal content -->
   <div class="modal-content">
     <div class="modal-proveedor-header">
         <h2 class="modal-title text-center">Entrada de producto</h2>

     </div>
     <div class="modal-proveedor-body">
         <div class="form-container">
             <form action="mantenimiento-entrada-productos.php" method="POST" enctype="multipart/form-data">
                 <div class="input-container">
                    <input type="text" name="id" value="<?php echo $id; ?>" id="idProveedor">

                    <?php if($result_p >0){
                 while($data_p = mysqli_fetch_array($ejecutar_consulta_p)){ ?>
                   <input type="text" class="form-control" name="cantidad" id="idProveedor" value="<?php echo $data_p['cantidad']; ?>" >

                   <input type="date" name="fechaIngreso" value="<?php echo $data_p['fechaIngreso']; ?>">
                   <input type="text" id="idProveedor" name="stockMaximo" value="<?php echo $data_p['stockMaximo']; ?>">

                   <?php }}?>


                     <input type="text" name="entrada" placeholder="Cantidad" required>

                 </div>
                     <input type="submit" value="Agregar" class="btn btn-success">
                     <a onclick="cancelar()" class="btn btn-light mr-3 cancelar">Cancelar</a>
             </form>

         </div>
     </div>
   </div>

 </div>


     <div id="myModal-salida" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-proveedor-header">
            <h2 class="modal-title text-center">Salida de producto</h2>

        </div>
        <div class="modal-proveedor-body">
            <div class="form-container">
                <form action="mantenimiento-salida-productos.php" method="POST" enctype="multipart/form-data">
                    <div class="input-container">

                       <?php if($result_p2 >0){
                    while($data_p2 = mysqli_fetch_array($ejecutar_consulta_p2)){ ?>
                      <input type="text" class="form-control" name="cantidad" id="idProveedor" value="<?php echo $data_p2['cantidad']; ?>" >
                      <input type="text" name="id" value="<?php echo $data_p2['idProducto']; ?>" id="idProveedor">

                      <input type="date" name="fechaIngreso" value="<?php echo $data_p2['fechaIngreso']; ?>">

                      <?php }}?>



                        <input type="text" name="entrada" placeholder="Cantidad" required>

                    </div>
                        <input type="submit" value="Salida" class="btn btn-success">
                        <a onclick="cancelar()" class="btn btn-light mr-3 cancelar">Cancelar</a>
                </form>

            </div>
        </div>
      </div>

    </div>


    </div>


    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <scrip src="../js/bootstrap.min.js"></scrip>
    <script src="../js/nav.js"></script>

    <script>

        function entrada(){

        // Get the modal
        var modal = document.getElementById("myModal-entrada");



        // Get the <span> element that closes the modal

        var span = document.getElementsByClassName("cancelar")[0];

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

        function salida(){

        // Get the modal
        var modal = document.getElementById("myModal-salida");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn-salida");

        // Get the <span> element that closes the modal

        var span = document.getElementsByClassName("cancelar")[0];


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

        function cancelar(){
            location.reload();
        }
    </script>



</body>
</html>


<?php ?>
