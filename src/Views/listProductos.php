<?php
include "../../templates/header.php";
require_once('../Models/modelProducto.php');

$producto = new modelProducto();
$listaProductos=$producto->listProductos();
?>
  <!-- Aquí el código HTML de la aplicación -->
  <main role="main" class="container" >
    <h1>Lista de productos</h1>

    <table id="tableProductos" class="display" style="width:100%">
        <thead>
          <tr>
              <th>UID</th>
              <th>NOMBRE</th>
              <th>REFERENCIA</th>
              <th>PRECIO ($COP)</th>
              <th>CATEGORIA</th>
              <th>PESO (GR)</th>
              <th>STOCK</th>
              <th></th>
              <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($listaProductos as $prod) {
          ?>
            <tr>
              <td><?php echo $prod->getUid() ?></td>
              <td><?php echo $prod->getNombre() ?></td>
              <td><?php echo $prod->getReferencia() ?></td>
              <td><?php echo $prod->getPrecio() ?></td>
              <td><?php echo $prod->getCategoria() ?></td>
              <td><?php echo $prod->getPeso() ?></td>
              <td><?php echo $prod->getStock() ?></td>
              <th></th>
              <th></th>
            </tr>
          <?php
          }
          ?>
        <tbody>
        <tfoot>
          <tr>
              <th>UID</th>
              <th>NOMBRE</th>
              <th>REFERENCIA</th>
              <th>PRECIO ($COP)</th>
              <th>CATEGORIA</th>
              <th>PESO (GR)</th>
              <th>STOCK</th>
              <th></th>
              <th></th>
          </tr>
        </tfoot>
    </table>

  </main>



<?php include "../../templates/footer.php"; ?>
