<?php
  require_once('../Controllers/db_connection.php');

	class modelProducto{
		private $uid;
		private $nombre;
		private $referencia;
		private $precio;
    private $categoria;
    private $peso;
    private $stock;
    private $fechaCreacion;

		function __construct(){}

    // Funciones para obtener e inicialiar datos de modelProducto
    public function getUid(){
			return $this->id;
		}

		public function setUid($id){
			$this->id = $id;
		}

		public function getNombre(){
		return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getReferencia(){
			return $this->referencia;
		}

		public function setReferencia($referencia){
			$this->referencia = $referencia;
		}

		public function getPrecio(){
		return $this->precio;
		}

		public function setPrecio($precio){
			$this->precio = $precio;
		}

    public function getCategoria(){
    return $this->categoria;
    }

    public function setCategoria($categoria){
      $this->categoria = $categoria;
    }

    public function getPeso(){
		return $this->peso;
		}

		public function setPeso($peso){
			$this->peso = $peso;
		}

    public function getStock(){
		return $this->stock;
		}

		public function setStock($stock){
			$this->stock = $stock;
		}

    public function getFechaCreacion(){
		return $this->fechaCreacion;
		}

		public function setFechaCreacion($fechaCreacion){
			$this->fechaCreacion = $fechaCreacion;
		}

    // Funcion para añadir un producto
    public function addProducto($producto){
			$db=databaseConnection::connect();
			$insert=$db->prepare('INSERT INTO productos values(NULL,:nombre,:referencia,:precio,categoria,peso,stock,NULL)');
			$insert->bindValue('nombre',$producto->getNombre());
			$insert->bindValue('referencia',$producto->getReferenciar());
			$insert->bindValue('precio',$producto->getPrecio());
      $insert->bindValue('categoria',$producto->getCategoria());
      $insert->bindValue('peso',$producto->getPeso());
      $insert->bindValue('stock',$producto->getStock());
			$insert->execute();
		}

    // Funcion para listar todos los productos
		public function listProductos(){
			$db=databaseConnection::connect();
			$listProductos=[];
			$select=$db->query('SELECT * FROM productos');

			foreach($select->fetchAll() as $producto){
				$var_producto = new modelProducto();
				$var_producto->setUid($producto['uid']);
				$var_producto->setNombre($producto['nombre']);
				$var_producto->setReferencia($producto['referencia']);
				$var_producto->setPrecio($producto['precio']);
        $var_producto->setCategoria($producto['categoria']);
				$var_producto->setPeso($producto['peso']);
				$var_producto->setStock($producto['stock']);
        $var_producto->setFechaCreacion($producto['fechaCreacion']);
				$listProductos[]=$var_producto;
			}
			return $listProductos;
		}

    // Funcion para eliminar un producto por su uid
		public function deleteProducto($uid){
      $db=databaseConnection::connect();
			$delete=$db->prepare('DELETE FROM producto WHERE UID=:uid');
			$delete->bindValue('uid',$uid);
			$delete->execute();
		}

    // Funcion para buscar un producto por su uid
		public function getProducto($uid){
      $db=databaseConnection::connect();
			$select=$db->prepare('SELECT * FROM producto WHERE UID=:uid');
			$select->bindValue('uid',$uid);
			$select->execute();

			$producto=$select->fetch();

			$var_producto= new modelProducto();
      $var_producto->setUid($producto['uid']);
      $var_producto->setNombre($producto['nombre']);
      $var_producto->setReferencia($producto['referencia']);
      $var_producto->setPrecio($producto['precio']);
      $var_producto->setCategoria($producto['categoria']);
      $var_producto->setPeso($producto['peso']);
      $var_producto->setStock($producto['stock']);
			return $var_producto;
		}

    // Funcion para actualizar un producto
		public function update($producto){
      $db=databaseConnection::connect();
			$update=$db->prepare('UPDATE producto SET nombre=:nombre, referencia=:referencia, precio=:precio, categoria=:categoria, peso=:peso, stock=;stock  WHERE UID=:uid');
			$update->bindValue('uid',$libro->getUid());
      $update->bindValue('nombre',$producto->getNombre());
			$update->bindValue('referencia',$producto->getReferenciar());
			$update->bindValue('precio',$producto->getPrecio());
      $update->bindValue('categoria',$producto->getCategoria());
      $update->bindValue('peso',$producto->getPeso());
      $update->bindValue('stock',$producto->getStock());
			$update->execute();
		}
	}
?>
