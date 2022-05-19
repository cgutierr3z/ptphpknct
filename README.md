# ptphpknct
Prueba Tecnica PHP
## Instrucciones de instalacion:
- Clonar o copiar el repositorio en DocumentRoot del servidor apache.
- Editar el archivo src/Controllers/db_connection.php en la linea 9 para establecer credenciales de acceso a la base de datos user,password (...'root','openyoursesamo' ... )
- Desde phpmyadmin o el gestor de bd instalado ejecutar/importar el db_script.sql para crear la base de datos del proyecto.
- Ingresar a https://localhost/ptphpknct para visualizar el proyecto.

## Consultas SQL
- SELECT uid,nombre,referencia,precio,categoria,peso,MAX(stock),fechaCreacion as stock FROM inventory

- SELECT uid,uid_producto,SUM(cantidad_venta) as venta FROM venta_producto GROUP by uid_producto ORDER BY cantidad_venta DESC LIMIT 1
