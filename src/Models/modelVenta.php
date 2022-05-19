<?php
  require_once('../Controllers/db_connection.php');
  require_once('modelProducto.php');

	class modelVenta{
		private $uid;
		private $uidProducto;
		private $cantidadVenta;
		private $fechaVenta;

    private $newstock;

		function __construct(){}

    // Funciones para obtener e inicialiar datos de modelVenta
    public function getUid(){
			return $this->uid;
		}

		public function setUid($uid){
			$this->uid = $uid;
		}

		public function getUidProducto(){
		  return $this->uidProducto;
		}

    public function setUidProducto($uidProducto){
		  $this->$uidProducto = $uidProducto;
		}

		public function getCantidadVenta(){
			return $this->cantidadVenta;
		}

    public function setCantidadVenta($cantidadVenta){
      $this->cantidadVenta = $cantidadVenta;
		}

    public function getFechaVenta(){
			return $this->fechaVenta;
		}

    public function setFechaVenta($fechaVenta){
      $this->fechaVenta = $fechaVenta;
		}

    public function addVentaProducto($producto,$venta){
      $producto = new modelProducto();
      $prod=$producto->getProducto($producto->getUid());
      $db=databaseConnection::connect();
      $insert=$db->prepare('INSERT INTO venta_producto (uid_producto,cantidadVenta) values (:uidProducto,:cantidadVenta)');
      $insert->bindValue('uidProducto',$producto->getUid(), PDO::PARAM_STR);
      $insert->bindValue('cantidadVenta',$venta, PDO::PARAM_STR);
      $newstock = $producto->getStock() - $venta;
      $prod->setStock($newstock);
      $prod->updateProductoStock($prod);
      $insert->execute();
    }

  }
