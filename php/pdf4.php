<?php

include_once 'include/cn.php';

session_start();

$varsesion = $_SESSION['user'];

$idProducto = $_REQUEST['id'];
$fechaIngreso = $_REQUEST['fechaIngreso'];
$cantidadActual = $_REQUEST['$cantidadActual'];
$entrada = $_REQUEST['entrada'];
$cantidad = $_REQUEST['cantidad'];

if($varsesion == null || $varsesion == ''){
    echo '<script>
        alert("Useted no tiene Autorizacion");
        window.location="../index.html";

        </script>
    ';
    die();
}


$sql_select = "SELECT  productos.nombre, precio, tipoProducto.nombre as 'tp', proveedor.nombre as 'pv'
from productos inner join proveedor on proveedor.idProveedor = productos.idProveedor inner join
tipoProducto on tipoProducto.idTipoProducto = productos.idTipoProducto
WHERE idProducto = $idProducto";

$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_num_rows($ejecutar_consulta);

if($result >0){
    while($data = mysqli_fetch_array($ejecutar_consulta)){

      $producto = $data['nombre'];
      $proveedor = $data['pv'];
      $precio = $data['precio'];
      $tp = $data['tp'];

    }}


date_default_timezone_set('America/Tijuana'); //configuro un nuevo timezone

$time = date("d-m-Y ", time());




$fecha = new DateTime('NOW');

$d=rand(1,1000);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/Normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/index-style.css">

    <title>TeWeb</title>
</head>

  <body onLoad="setInterval('contador()',1000);">

      <style>

      .list-container{
        width: 90%;
        margin: auto;

      }

      .search-box-result-container{
        width: 90%;
        max-width: 1000px;
        text-align: center;
        margin: auto;
      }

      table {
        margin-top: 50px;
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
        text-align: center
      }


        .header-table{
          margin: auto;
          margin-top: 50px;
          margin-bottom: 50px;

          display: -webkit-flex;
          display: -moz-flex;
          display: -ms-flex;
          display: -o-flex;
          display: flex;
          justify-content: space-around;

        }



        .header-table-center img{
          width: 150px;
        }



        .table-title{
          width: 100%;
          text-align: center;
          margin-right: 200px;
        }

        .selection-container{
          text-align: left;
        }

        .form-control{
          border: none;
        }

        .input-container{
          border: 2px solid gray;
          padding: 10px;
          border-radius: 10px;
        }

      </style>

      <div class="list-container">

          <div class="header-table">

            <div class="header-table-left">
                <p>Folio #<?php echo $d ;?></p>
            </div>

            <div class="header-table-center">
                <img src="../img/logo/logo.png" alt="">
            </div>

            <div class="header-table-right">
                <p>Hora: <?php echo $fecha->format('H:i:s');
 ?></p>
                <p>Fecha: <?php echo $time; ?></p>
            </div>

          </div>

          <div class="search-box-result-container" id="data">
              <table class="table table-striped">

                <thead>

                  <h3 class="table-title">FACTURA DE COMPRA</h3>

                  <div class="selection-container mt-4">

                      <p><b>RFC: ROGK980811NA0</b></p>
                      <p><b>Direccion: Av.Poblado San Felipe #1077 Villas del Colorado</b></p>

                      <div class="input-container">

                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control ml-0" id="inputPassword">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Direccion:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control ml-0" id="inputPassword">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Ciudad:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control ml-0" id="inputPassword">
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">RFC:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control ml-0" id="inputPassword">
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="result-container">

                    <tr style="text-align:center;">
                      <th scope="col">Cantidad</th>
                      <th scope="col">Producto</th>
                      <th scope="col">P. Unitario</th>
                      <th scope="col">Total</th>
                    </tr>


                </thead>



                <tbody>

                  <tr style="text-align:center;">
                    <td><?php echo $entrada ?> pz</td>
                    <td><?php echo $producto  ?></td>
                    <td>$<?php echo $precio ?></td>
                    <td>$<?php echo $total = $entrada * $precio; ?></td>
                  </tr>

                </tbody>

                </div>


              </table>


          </div>


      </div>

      <script type="text/javascript">
             alert("Oprima Crtl + P para imprimir");

      </script>
<br>
<br>
<br>
</body>
</html>
