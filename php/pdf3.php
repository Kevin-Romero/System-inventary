<?php

include_once 'include/cn.php';

session_start();

$varsesion = $_SESSION['user'];

//$idTp = $_REQUEST['idtp'];

$option = $_REQUEST['option'];


if($varsesion == null || $varsesion == ''){
    echo '<script>
        alert("Useted no tiene Autorizacion");
        window.location="../index.html";

        </script>
    ';
    die();
}

$sql_select = "SELECT idProducto, productos.nombre, proveedor.nombre as 'pvNombre', precio, cantidad,
stockMinimo, fechaIngreso, tipoProducto.nombre as 'tp' from productos inner join
proveedor on proveedor.idProveedor = productos.idProveedor inner join
tipoProducto on tipoProducto.idTipoProducto = productos.idTipoProducto
WHERE cantidad <= stockMinimo ORDER BY $option ASC";

$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_num_rows($ejecutar_consulta);


date_default_timezone_set('America/Tijuana'); //configuro un nuevo timezone

$time = date("d-m-Y ", time());




$fecha = new DateTime('NOW');

$d=rand(1,1000);

  if($option == "proveedor.nombre"){
      $orden = "Proveedor";
  }
  else{
    if($option == "cantidad"){
      $orden = "Cantidad";
    }
    else{
          $orden = "Tipo de Producto";
    }
  }


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
          margin-top: 50px;

          display: -webkit-flex;
          display: -moz-flex;
          display: -ms-flex;
          display: -o-flex;
          display: flex;
          justify-content: space-between;
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

                  <h3 class="table-title">Reporte de productos de almacén por Stock Minimo</h3>

                  <div class="selection-container">
                      <p><b>Ordernado por: </b><?php echo $orden ?></p>
                  </div>

                  <div class="result-container">



                  <tr style="text-align:center;">
                    <th scope="col">Clave</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Tipo de Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">F.Ingreso</th>
                  </tr>
                </thead>
                <tbody>
                 <?
                  if($result >0){
                      while($data = mysqli_fetch_array($ejecutar_consulta)){


                  ?>
                  <tr style="text-align:center;">
                    <td scope="row"><?php echo $data['idProducto']; ?></td>
                    <td><?php echo $data['nombre']; ?></td>
                    <td><?php echo $data['pvNombre']; ?></td>
                    <td>$<?php echo $data['precio']; ?></td>
                    <td><?php echo $data['tp']; ?></td>
                    <td><?php echo $data['cantidad']; ?>pz</td>
                    <td><?php echo $data['fechaIngreso']; ?></td>
                  </tr>

                          <?php } }

                            else{
                              echo '<script>
                                       alert("No hay productos en Stock Minimo");
                                          window.location="reportes.php";
                                   </script>';
                                  die();
                            }

                           ?>

                </tbody>
                </div>
              </table>


          </div>


      </div>

      <script type="text/javascript">
             alert("Oprima Crtl + P para imprimir");

      </script>

</body>
</html>
