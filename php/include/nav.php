<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../css/Normalize.css">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <link rel="stylesheet" href="../../css/nav-style.css">

    <title>TeWeb</title>
</head>

<style>

    .btn-dropdown:focus{
        opacity: 1;
    }

    .sub-menu-productos{
        display: none;
        position: relative;
        background: #000;
        color: #FFF;
        width: 100%;
        margin: auto;
        overflow: auto;
        margin-top: -20px;
        margin-bottom: 10px;
    }

    .sub-menu-productos a{
        padding: 10px;
        display: block;
        color: #FFF;
        opacity: .4;
        margin-left: 15px;

    }

    .sub-menu-productos a:hover{
        opacity: 1;
    }

    .show{
        display: block;
    }



</style>

<body>

   <nav>
      <h2 class="ml-4 mt-2 text-white">Menu</h2>
       <ul>

          <div class="dropdown">
           <li>

            <a href="#" onclick="dropdown()" class="btn-dropdown">Articulos</a>
           </li>

           <div id="sub-menu" class="sub-menu-productos">
               <a href="productos.php">Productos</a>
               <a href="tp.php" class="btn-tp">Tipo de Productos</a>
           </div>
            </div>

            <li><a href="../php/proveedores.php">Proveedores</a></li>


           <div id="dropdownProveedores" class="dropdown">
           <li>

            <a href="#" onclick="dropdownProveedores()" class="btn-dropdown btn-dropdown-proveedores" id="btn-dropdownProveedores">Consultas</a>
           </li>


           <div id="sub-menu-proveedores" class="sub-menu-productos sub-menu-proveedores" >
               <a href="consulta-productos.php">Consulta de Productos</a>
               <a href="consulta-proveedor.php">Consulta de Proveedores</a>
           </div>
           </div>


           <li><a href="mantenimiento-productos.php" >Mantenimiento</a></li>


          <li><a href="../php/reportes.php" >Reportes</a></li>
       </ul>
   </nav>



  <!-- The Modal -->
    <div id="myModal-mantenimiento" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-proveedor-header">
            <h2 class="modal-title text-center">Inserte la clave del producto</h2>

        </div>
        <div class="modal-proveedor-body">
            <div class="form-container">
                <form action="mantenimiento-productos.php" method="POST" enctype="multipart/form-data">
                    <div class="input-container">
                        <input type="text" name="id" placeholder="Clave">

                    </div>
                        <input type="submit" value="Buscar" class="btn btn-success">
                        <a class="btn btn-light mr-3 cancelar">Cancelar</a>
                </form>

            </div>
        </div>
      </div>

    </div>


    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>

        function dropdown() {
        document.getElementById("sub-menu")
            .classList.toggle("show");
        }

        window.onclick = function(event) {
        if(!event.target.matches('.btn-dropdown')){

        var dropdowns = document
        .getElementsByClassName
        ("sub-menu-productos");

        var i;
        for(i=0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];

        if (openDropdown.classList.contains
        ('show')) {

        openDropdown.classList.remove('show');
              }
            }
          }
        }

    </script>

        <script>

        function dropdownProveedores() {
        document.getElementById("sub-menu-proveedores")
            .classList.toggle("show");
        }

        window.onclick = function(event) {
        if(!event.target.matches('.btn-dropdown-proveedores')){

        var dropdowns = document
        .getElementsByClassName
        ("sub-menu-proveedores");

        var i;
        for(i=0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];

        if (openDropdown.classList.contains
        ('show')) {

        openDropdown.classList.remove('show');
              }
            }
          }
        }

    </script>


</body>
</html>
