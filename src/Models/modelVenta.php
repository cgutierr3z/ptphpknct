<?php
  require_once('../Controllers/db_connection.php');
  require_once('modelProducto.php');

	class modelVenta{
		private $uid;
		private $uidProducto;
		private $cantidadVenta;
		private $fechaVenta;

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
		  $this->uidProducto = $uidProducto;
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

    public function addVentaProducto($venta){
      $db=databaseConnection::connect();

      $producto = new modelProducto();
      $prod = $producto->getProducto($venta->getUidProducto());

      $insert=$db->prepare('INSERT INTO venta_producto (uid_producto,cantidad_venta) values (:uidProducto,:cantidadVenta)');
      $insert->bindValue('uidProducto',$venta->getUidProducto(), PDO::PARAM_STR);
      $insert->bindValue('cantidadVenta',$venta->getCantidadVenta(), PDO::PARAM_STR);
      $newstock = $prod->getStock() - $venta->getCantidadVenta();
      if($newstock < 0){
        $_SESSION['error'] = true;
        $_SESSION['message'] = "NO HAY STOCK DISPONIBLE";
        return $_SESSION; 
      }
      $prod->setStock($newstock);
      $prod->updateProductoStock($prod);
      $insert->execute();
      $_SESSION['error'] = false;
      $_SESSION['message'] = "LA VENTA SE HA REGISTRADO";
      $db=databaseConnection::close();
    }

    // Funcion para listar todos las ventas
    public function listVentas()
    {
      $db = databaseConnection::connect();
      $listVentas = [];
      $select = $db->query('SELECT * FROM venta_producto');

      foreach ($select->fetchAll() as $venta) {

        $producto = new modelProducto();
        $ref = $producto->getProducto($venta['uid_producto'])->getReferencia();

        $ven['uid'] = $venta['uid'];
        $ven['ref'] = $ref;
        $ven['cant'] = $venta['cantidad_venta'];
        $listVentas[] = $ven;
      }
      $db=databaseConnection::close();
      return $listVentas;
    }    

  }
