<?php

if(empty($_REQUEST['id'])){
    header("Location: proveedores.php");
}
else{
    include_once 'include/cn.php'; 

    $id = $_GET['id'];

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

$sql_select = "SELECT * FROM proveedor WHERE idProveedor = '$id'";
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
    
        if($result >0){
                    while($data = mysqli_fetch_array($ejecutar_consulta)){
        
    ?>
    
    <div class="main">
       
    <header class="nav-container">
        <div class="nav-title">
            <h2>Modificar Datos de <?php echo $data['nombre'] ?></h2>
            
        </div>
        <div class="nav">
            <a href="../php/logn-out.php" onclick="return confirmLognOut()"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </header>
    
     
    <div class="form-container mt-5">
     

            <form action="validar-modificar-proveedor.php" method="post" enctype="multipart/form-data">
                <div class="input-modificar-container">
                    <label for="id">Clave:</label> 
                    <input type="text" class="form-control" name="id" id="id" value="<?php echo $data['idProveedor']; ?>" disabled>
                    <input type="text" value="<?php echo $data['idProveedor']; ?>" name="idProveedor" id="idProveedor">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $data['nombre']; ?>">
                
                    <label for="direccion">Direccion: </label>
                    <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $data['direccion']; ?>">
                    <label for="telefono">Telefono:</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $data['telefono']; ?>">
                    
                    <input type="submit" class="btn btn-warning" value="Guardar">
                    <a href="proveedores.php" class="btn btn-danger mr-3">Cancelar</a>

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


<?php } }}?> 