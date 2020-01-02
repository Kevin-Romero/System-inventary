<?php

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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>




    <title>TeWeb</title>
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
            <h2>Sistema de Control de Almacen</h2>
        </div>
        <div class="nav">
            <a href="../php/logn-out.php" onclick="return confirmLognOut()"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </header>



    <div class="container" id="container">
      <input type="text" name="" id="txt" value="" placeholder="" disabled>
    </div>
    <p class="btn btn-warning"  id="btn-cargar">Editar</p>



      </div>






    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/nav.js"></script>

    <script type="text/javascript">
      $('#btn-cargar').click(function(){
        var esperar = 0;

        $.ajax({
          url: "ajax2.php",
          beforeSend: function(){
            $('#btn-cargar').text('Guardar');
          },
          success: function(data){
            setTimeout(function(){
              $('#container').html(data);
            },esperar
          );
          }
        });

      });
    </script>

    <script>

        function proveedorTp(){


        // Get the modal
        var modal = document.getElementById("myModal-proveedor-tp");


        // Get the <span> element that closes the modal

        var span = document.getElementsByClassName("cancelar")[0];

        // When the user clicks the button, open the modal
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

        function stockMinimoTp(){


        // Get the modal
        var modal = document.getElementById("myModal-stockMinimo-tp");


        // Get the <span> element that closes the modal

        var span = document.getElementsByClassName("cancelar")[0];

        // When the user clicks the button, open the modal
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


</body>
</html>
