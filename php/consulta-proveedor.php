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
$sql_select = "SELECT * FROM tipoProducto ORDER BY nombre ASC";
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

    
    <title>SCA / Consultas / Consultas de Proveedores</title>
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

    .query-botton-container{
        width: 100%;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .query-botton-container a{
        margin: 10px;
    }

</style>

    
<body>
  
    <?php include 'include/nav.php'; ?>
    
    <div class="main">
       
    <header class="nav-container">
        <div class="nav-title">
            <h2>Consultas de Proveedores</h2>
        </div>
        <div class="nav">
            <a href="../php/logn-out.php" onclick="return confirmLognOut()"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </header>

    
    
    <div class="query-botton-container mt-4">
        <a href="#" id="myBtn-proveedor-mes" class="btn btn-dark" onclick="">Ultimos proveedores recibidos</a>
        
        <a href="#" id="myBtn-proveedor-tipo-producto" class="btn btn-dark" onclick="proveedor()">Proveedores por tipo de producto</a>
    </div>
    
           <!-- The Modal -->
    <div id="myModal-proveedor-mes" class="modal">
    
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-proveedor-header">
            <h2 class="modal-title text-center">Ultimos proveedores recibidos</h2>

        </div>
        <div class="modal-proveedor-body">
            <div class="form-container">
                <form action="consulta-proovedor-mas-productos.php" method="POST" enctype="multipart/form-data">
                    <div class="input-container">
                        <label for="">Elige el mes</label>
                        
                        <select name="mes" id="" class="form-control" required>
                            <option value="">Select</option>
                            
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
                        <a href="" class="btn btn-light mr-3 cancelar">Cancelar</a>                    
                </form>

                
                
            </div>
        </div>
      </div>

    </div>
    
    
    
    
        <div id="myModal-tipo-proveedor" class="modal">
    
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-proveedor-header">
            <h2 class="modal-title text-center">Proveedores por tipo de producto</h2>

        </div>
        <div class="modal-proveedor-body">
            <div class="form-container">
                <form action="consulta-proovedor-tipo-producto.php" method="POST" enctype="multipart/form-data">
                    <div class="input-container">
                        <label for="">Elige el tipo de producto</label>
                        
                        <select name="tipoProducto" id="" class="form-control" required>
                           
                            <option value="">Select</option>
                            
                          <?php  if($result >0){
                    while($data = mysqli_fetch_array($ejecutar_consulta)){ ?>
                           
                           <option value="<?php echo $data['idTipoProducto']; ?>"><?php echo $data['nombre']; ?></option>
                           
                           <?php }}
                            
                            
                            ?>
                            
                        </select>
                        
                    </div>
                        <input type="submit" value="Generar Consulta" class="btn btn-success">
                        <a href="" class="btn btn-light mr-3 cancelar">Cancelar</a>                    
                </form>

                
                
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
           
        function proveedor(){

           
        // Get the modal
        var modal = document.getElementById("myModal-tipo-proveedor");


        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        var close = document.getElementsByClassName("cancelar")[0];
           

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
        
        
        // Get the modal
        var modal = document.getElementById("myModal-proveedor-mes");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn-proveedor-mes");

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