<?php

$proveedor = $_POST['idProveedor'];


//echo $proveedor;
//echo '<br>';
//echo $tp;

if(is_numeric($proveedor)){

  echo '
        <script>
        window.open("pdf2.php?idProveedor='.$proveedor.'","_blank");

        window.history.back(-1);

        </script>'
        ;


}
else{
    echo '<script>
	           alert("ERROR: solo datos numericos");
                window.location="reportes.php";
	       </script>';
        die();
}


?>
