<?php
require_once('../Models/modelProducto.php');
require_once('../Models/modelVenta.php');

$producto = new modelProducto();
$venta = new modelVenta();
	// Se valida cual variable se recibe via _POST para ejecutar las acciones:
	// $_POST['add'] crear
	if (isset($_POST['add'])) {
    $venta->setUidProducto($_POST['uidProducto']);
    $venta->setcantidadVenta($_POST['cantidadVenta']);
		$venta->addVentaProducto($producto,$venta->getCantidadVenta());
		header('Location: ../Views/listProductos.php');

  }
?>
