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

$mesValor = $_POST['mes'];
$mesNombre;


$sql_select = "SELECT proveedor.idProveedor, proveedor.nombre as 'Proveedor', COUNT(productos.nombre) as 'Producto', fechaIngreso, cantidad from productos inner join  proveedor on proveedor.idProveedor = productos.idProveedor WHERE proveedor.idProveedor = productos.idProveedor AND month(fechaIngreso) = $mesValor GROUP BY proveedor.idProveedor ORDER BY productos.fechaIngreso DESC";
$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_num_rows($ejecutar_consulta);

if($mesValor == "01"){
    $mesNombre = "Enero";
}
else{
    if($mesValor == "02"){
        $mesNombre = "Febrero";
    }
    else{
        if($mesValor == "03"){
            $mesNombre = "Marzo";
        }
        else{
            if($mesValor == "04"){
                $mesNombre = "Abril";
            }
            else{
                if($mesValor == "05"){
                    $mesNombre = "Mayo";
                }
                else{
                    if($mesValor == "06"){
                        $mesNombre = "Junio";
                    }
                    else{
                        if($mesValor == "07"){
                            $mesNombre = "Julio";
                        }
                        else{
                            if($mesValor == "08"){
                                $mesNombre = "Agosto";
                            }
                            else{
                                if($mesValor == "09"){
                                    $mesNombre = "Septiembre";
                                }
                                else{
                                    if($mesValor == "10"){
                                        $mesNombre = "Octubre";
                                    }
                                    else{
                                        if($mesValor == "11"){
                                            $mesNombre = "Noviembre";
                                        }
                                        else{
                                            if($mesValor == "12"){
                                                $mesNombre = "Diciembre";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
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


    <title>SCA / Consulta de Proveedor / Constula de Proveedor por Mes</title>
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

    .opacity{
        opacity: .4;
        padding: 20px 40px;
    }
    .opacity:hover{
        opacity: 1;
    }

</style>

<body>

    <?php include 'include/nav.php'; ?>

    <div class="main">

    <header class="nav-container">
        <div class="nav-title">
            <h2>Ultimos proveedores recibidos</h2>
        </div>
        <div class="nav">
            <a href="../php/logn-out.php" onclick="return confirmLognOut()"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </header>


    <div class="list-container mt-4">

            <h3 class="text-center">Proveedores que vinieron en el mes de <?php echo $mesNombre; ?></h3>

        <div class="header-table">

<!--                <div class="form-container">
                <form action="consulta-proovedor-mas-productos.php" method="POST" enctype="multipart/form-data">
                    <div class="input-container">
                        <select name="mes" id="mes" class="form-control" required>
                           <option value="<?php //echo $mesValor; ?>"><?php //echo $mesNombre; ?></option>
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>

                    </div>
                        <input type="submit" value="Generar Consulta" class="btn btn-success">
                        <a href="consulta-proveedor.php" class="btn btn-light mr-3 cancelar">Cancelar</a>
                </form>



            </div>-->
            <a href="consulta-proveedor.php" class="btn btn-light mr-3 cancelar">Cancelar</a>

        </div>


        <div class="search-box-result-container" id="data">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Clave Proveedor</th>
                  <th scope="col">Proveedor</th>
                  <th scope="col">Productos Entregados</th>
                  <th scope="col">Fecha Ingreso</th>
                </tr>
              </thead>
              <tbody>
               <?
                if($result >0){
                    while($data = mysqli_fetch_array($ejecutar_consulta)){


                ?>
                <tr>
                  <th scope="row"><?php echo $data['idProveedor']; ?></th>
                  <td><?php echo $data['Proveedor']; ?></td>
                  <td><a href="productos-proveedor-mes.php?id=<?php echo $data['idProveedor']; ?>& mes=<?php echo $mesValor; ?>" class="opacity"><?php echo $data['Producto']; ?></a></td>
                  <td><?php echo $data['fechaIngreso']; ?></td>

                </tr>

                        <?php } }
                  else{
                echo '<script>
                    alert("No hay resultados del mes de '.$mesNombre.'");
                    window.location="consulta-proveedor.php";
                    </script>';
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
