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

$sql_select = "SELECT idProducto, productos.nombre, precio, proveedor.nombre as 'Proveedor', fechaIngreso from productos inner join  proveedor on proveedor.idProveedor = productos.idProveedor";

$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_num_rows($ejecutar_consulta);

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

  <body>


      <style>
      .list-container{
        margin: auto;

      }

      .search-box-result-container{
      margin-left: 70px;
        width: 90%;
        max-width: 500px;
          text-align: center;
      }

      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even){background-color: #f2f2f2}

      th {
        background-color: #4CAF50;
        color: white;
      }

        .header-table{
          margin: auto;
          margin-top: 50px;
          margin-left: 200px;
          margin-bottom: 50px;
        }

        .header-table-left{
          margin-left: -250px;
          margin-top: 50px;
          position: absolute;
        }

        .header-table-center img{
          width: 150px;
        }

        .header-table-right{
          margin-left: 350px;
          margin-top: 50px;
          position: absolute;
        }

        .table-title{
          width: 100%;
          text-align: center;
          margin-right: 200px;
        }

      </style>

      <div class="list-container">

          <div class="header-table">

            <div class="header-table-left">
                <p>Folio #452</p>
            </div>

            <div class="header-table-center">
                <img src="../img/logo/logo.png" alt="">
            </div>

            <div class="header-table-right">
                <p>15:46</p>
                <p>2019/11/12</p>
            </div>

          </div>



          <div class="search-box-result-container" id="data">
            <h3 class="table-title">Reporte de productos de almacén por tipo de producto y proveedor</h3>
              <table class="table table-striped">
                <thead>
                  <tr style="text-align:center;">
                    <th scope="col">Clave</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Proveedor</th>
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
                    <td><?php echo $data['precio']; ?></td>
                    <td><?php echo $data['Proveedor']; ?></td>
                    <td><?php echo $data['fechaIngreso']; ?></td>
                  </tr>

                          <?php } } ?>

                </tbody>
              </table>


          </div>


      </div>
</body>
</html>
