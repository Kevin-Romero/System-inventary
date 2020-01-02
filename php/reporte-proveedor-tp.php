<?php

$idProveedor = $_REQUEST['idProveedor'];

$idTp = $_REQUEST['idtp'];



  require '../fpdf/fpdf.php';

  class PDF extends FPDF
  {

  // Cabecera de página
  function Header()
  {
      // Logo
      $this->Image('../img/logo/logo.png',88,15,40);

      //SALTO DE LINEA
      $this->Ln(10);

      //HORA DEL REPORTE
      $this->SetFont('Arial','',10);
      $this->Cell(170);
      $this->Cell(30,10,'HH:MM',0,0,'C');

      $this->Ln(0);

      //FOLIO DEL REPORTE
      $this->SetFont('Arial','',10);
      $this->Cell(1);
      $this->Cell(30,10,'Folio #485',0,0,'C');

      $this->Ln(10);

      //FECHA DEL REPORTE
      $this->SetFont('Arial','',10);
      $this->Cell(170);
      $this->Cell(30,10,'09/09/2019',0,0,'C');

      $this->Ln(30);

      //TITULO DEL REPORTE
      $this->SetFont('Arial','B',15);
      $this->Cell(80);
      $title = utf8_decode('Reporte de productos de almacén por tipo de producto y proveedor');
      $this->Cell(30,10,$title,0,0,'C');

      //PROVEEDOR
      $this->Ln(10);
      $this->SetFont('Arial','',15);
      $this->Cell(1);
      $title = utf8_decode('Coca cola');
      $this->Cell(30,10,$title,0,0,'C');

      $this->Ln(20);
      $this->SetFont('Arial','',12);
      $this->Cell(-5);

      $this->Cell(20,10,'Clave',1,0,'C',0);
      $this->Cell(100,10,'Nombre',1,0,'C',0);
      $this->Cell(45,10,'Tipo de Producto',1,0,'C',0);
      $this->Cell(20,10,'Cantidad',1,0,'C',0);
      $this->Cell(30,10,'Fecha Ingreso',1,1,'C',0);
  }

  function Footer()
  {
      // Posición: a 1,5 cm del final
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Número de página
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }

  }

  // Creación del objeto de la clase heredada
  $pdf = new PDF('P', 'mm', 'A4');
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont('Times','',12);


  //CUERPO DEL REPORTE

  require 'include/cn.php';





  //TABLA DE LOS DATOS



  $sql_select = "SELECT idProducto, productos.nombre as 'nombre', cantidad, stockMinimo,
                stockMaximo, fechaIngreso, tipoProducto.nombre as 'tp' from productos inner join
                proveedor on proveedor.idProveedor = productos.idProveedor
                inner join tipoProducto on tipoProducto.idTipoProducto =
                productos.idTipoProducto where productos.idProveedor =
                $idProveedor";


$ejecutar_consulta = mysqli_query($conexion, $sql_select);

$result = mysqli_num_rows($ejecutar_consulta);

  while ($data = mysqli_fetch_array($ejecutar_consulta)) {
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(-5);
    $pdf->Cell(25,10,$data['idProducto'],0,0,'C',0);
    $pdf->Cell(80,10,$data['nombre'],0,0,'C',0);
    $pdf->Cell(35,10,$data['tp'],0,0,'C,0');
    $pdf->Cell(20,10,$data['cantidad'],0,0,'C',0);
    $pdf->Cell(30,10,$data['fechaIngreso'],0,1,'C',0);
  }


  $pdf->Output();


?>
