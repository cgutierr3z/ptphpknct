CREATE DATABASE IF NOT EXISTS cafekonecta_db;

USE cafekonecta_db;

CREATE TABLE `productos` (
  `uid` int(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nombreProducto` varchar(100) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `precio` int(8) NOT NULL,
  `peso` int(4) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `stock` int(8) NOT NULL,
  `fechaCreacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `venta_producto` (
  `uid` int(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
  `uid_producto` int(8) NOT NULL,
  `cantidad_venta` int(8) NOT NULL
);
