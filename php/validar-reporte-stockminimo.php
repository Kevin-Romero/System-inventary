<?php

$option = $_POST['option'];



if($option != null || $option != ""){

  echo '
        <script>
        window.open("pdf3.php?option='.$option.'","_blank");

        window.history.back(-1);

        </script>'
        ;


}
else{
    echo '<script>
	           alert("La option seleccionada no es valida");
                window.location="reportes.php";
	       </script>';
        die();
}


?>
