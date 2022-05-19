<?php
require_once('../Models/modelProducto.php');

$producto= new modelProducto();
	// Se valida cual variable se recibe via _POST para ejecutar las acciones:
	// $_POST['add'] crear
	// $_POST['update'] actualizar
	// $_POST['delete'] eliminar
	if (isset($_POST['add'])) {
    $producto->setNombre($_POST['nombre']);
    $producto->setReferencia($_POST['referencia']);
    $producto->setPrecio($_POST['precio']);
    $producto->setCategoria($_POST['categoria']);
    $producto->setPeso($_POST['peso']);
    $producto->setStock($_POST['stock']);

		$producto->addProducto($producto);
		header('Location: ../Views/listProductos.php');

  }elseif(isset($_POST['update'])){
  		$producto->setUid($_POST['uid']);
      $producto->setNombre($_POST['nombre']);
      $producto->setReferencia($_POST['referencia']);
      $producto->setPrecio($_POST['precio']);
      $producto->setCategoria($_POST['categoria']);
      $producto->setPeso($_POST['peso']);
      $producto->setStock($_POST['stock']);

  		$producto->updateProducto($producto);
  		header('Location: ../Views/listProductos.php');

	}elseif(isset($_POST['delete'])) {
		$producto->deleteProducto($_POST['uid']);
		header('Location: ../Views/listProductos.php');
  }
?>
