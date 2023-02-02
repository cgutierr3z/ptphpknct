<?php
require_once('../Controllers/db_connection.php');

class modelProducto
{
	private $uid;
	private $nombre;
	private $referencia;
	private $precio;
	private $categoria;
	private $peso;
	private $stock;
	private $fechaCreacion;

	function __construct()
	{
	}

	// Funciones para obtener e inicialiar datos de modelProducto
	public function getUid()
	{
		return $this->uid;
	}

	public function setUid($uid)
	{
		$this->uid = $uid;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getReferencia()
	{
		return $this->referencia;
	}

	public function setReferencia($referencia)
	{
		$this->referencia = $referencia;
	}

	public function getPrecio()
	{
		return $this->precio;
	}

	public function setPrecio($precio)
	{
		$this->precio = $precio;
	}

	public function getCategoria()
	{
		return $this->categoria;
	}

	public function setCategoria($categoria)
	{
		$this->categoria = $categoria;
	}

	public function getPeso()
	{
		return $this->peso;
	}

	public function setPeso($peso)
	{
		$this->peso = $peso;
	}

	public function getStock()
	{
		return $this->stock;
	}

	public function setStock($stock)
	{
		$this->stock = $stock;
	}

	public function getFechaCreacion()
	{
		return $this->fechaCreacion;
	}

	public function setFechaCreacion($fechaCreacion)
	{
		$this->fechaCreacion = $fechaCreacion;
	}

	// Funcion para añadir un producto
	public function addProducto($producto)
	{
		$db = databaseConnection::connect();
		$insert = $db->prepare('INSERT INTO productos(nombre,referencia,precio,categoria,peso,stock) values (:nombre,:referencia,:precio,:categoria,:peso,:stock)');
		$insert->bindValue('nombre', $producto->getNombre(), PDO::PARAM_STR);
		$insert->bindValue('referencia', $producto->getReferencia(), PDO::PARAM_STR);
		$insert->bindValue('precio', $producto->getPrecio(), PDO::PARAM_STR);
		$insert->bindValue('categoria', $producto->getCategoria(), PDO::PARAM_STR);
		$insert->bindValue('peso', $producto->getPeso(), PDO::PARAM_STR);
		$insert->bindValue('stock', $producto->getStock(), PDO::PARAM_STR);
		$insert->execute();
		$db=databaseConnection::close();
		$_SESSION['error'] = false;
      	$_SESSION['message'] = "EL PRODUCTO SE HA REGISTRADO";
	}

	// Funcion para listar todos los productos
	public function listProductos()
	{
		$db = databaseConnection::connect();
		$listProductos = [];
		$select = $db->query('SELECT * FROM productos');

		foreach ($select->fetchAll() as $producto) {
			$var_producto = new modelProducto();
			$var_producto->setUid($producto['uid']);
			$var_producto->setNombre($producto['nombre']);
			$var_producto->setReferencia($producto['referencia']);
			$var_producto->setPrecio($producto['precio']);
			$var_producto->setCategoria($producto['categoria']);
			$var_producto->setPeso($producto['peso']);
			$var_producto->setStock($producto['stock']);
			$var_producto->setFechaCreacion($producto['fechaCreacion']);
			$listProductos[] = $var_producto;
		}
		$db=databaseConnection::close();
		return $listProductos;
	}

	// Funcion para eliminar un producto por su uid
	public function deleteProducto($uid)
	{
		$db = databaseConnection::connect();
		$delete = $db->prepare('DELETE FROM productos WHERE uid=:uid');
		$delete->bindValue('uid', $uid);
		$delete->execute();
		$db=databaseConnection::close();
		$_SESSION['error'] = true;
      	$_SESSION['message'] = "EL PRODUCTO SE HA ELIMINADO";
	}

	// Funcion para buscar un producto por su uid
	public function getProducto($uid)
	{
		$db = databaseConnection::connect();
		$select = $db->prepare('SELECT * FROM productos WHERE UID=:uid');
		$select->bindValue('uid', $uid);
		$select->execute();

		$producto = $select->fetch();

		$var_producto = new modelProducto();
		$var_producto->setUid($producto['uid']);
		$var_producto->setNombre($producto['nombre']);
		$var_producto->setReferencia($producto['referencia']);
		$var_producto->setPrecio($producto['precio']);
		$var_producto->setCategoria($producto['categoria']);
		$var_producto->setPeso($producto['peso']);
		$var_producto->setStock($producto['stock']);
		$db=databaseConnection::close();
		return $var_producto;
	}

	// Funcion para actualizar un producto
	public function updateProducto($producto)
	{
		$db = databaseConnection::connect();
		$update = $db->prepare('UPDATE productos SET nombre=:nombre, referencia=:referencia, precio=:precio, categoria=:categoria, peso=:peso, stock=:stock WHERE uid=:uid');
		$update->bindValue('uid', $producto->getUid(), PDO::PARAM_STR);
		$update->bindValue('nombre', $producto->getNombre(), PDO::PARAM_STR);
		$update->bindValue('referencia', $producto->getReferencia(), PDO::PARAM_STR);
		$update->bindValue('precio', $producto->getPrecio(), PDO::PARAM_STR);
		$update->bindValue('categoria', $producto->getCategoria(), PDO::PARAM_STR);
		$update->bindValue('peso', $producto->getPeso(), PDO::PARAM_STR);
		$update->bindValue('stock', $producto->getStock(), PDO::PARAM_STR);
		$update->execute();
		$db=databaseConnection::close();
		$_SESSION['error'] = false;
      	$_SESSION['message'] = "EL PRODUCTO SE HA ACTUALIZADO";
	}

	// Funcion para actualizar el stock un producto
	public function updateProductoStock($producto)
	{
		$db = databaseConnection::connect();
		$update = $db->prepare('UPDATE productos SET stock=:stock WHERE uid=:uid');
		$update->bindValue('uid', $producto->getUid(), PDO::PARAM_STR);
		$update->bindValue('stock', ($producto->getStock()), PDO::PARAM_STR);
		$update->execute();
		$db=databaseConnection::close();
	}
}
