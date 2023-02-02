<?php


require_once('../Models/modelProducto.php');
require_once('../Models/modelVenta.php');

$producto = new modelProducto();
$venta = new modelVenta();
// Se valida cual variable se recibe via _POST para ejecutar las acciones:
// $_POST['add'] crear
if (isset($_POST['add'])) {
	$uidp = $_POST['uidProducto'];
	//print_r($_POST['uidProducto']);
	//print_r($_POST['cantidadVenta']);

	$venta->setUidProducto($uidp);
	//print_r($venta);
	$venta->setCantidadVenta($_POST['cantidadVenta']);

	//print_r("\n".$uidp."\n");
	//print_r($venta->getUidProducto());
	//print_r($venta->getCantidadVenta());

	//print_r($venta);
	$venta->addVentaProducto($venta);
	header('Location: ../Views/formVenta.php');
}
?>
