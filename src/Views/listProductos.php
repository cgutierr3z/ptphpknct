<?php
include "../../templates/header.php";
require_once('../Models/modelProducto.php');

$producto = new modelProducto();
$listaProductos=$producto->listProductos();
//print_r ($listaProductos);
?>
  <!-- Aquí el código HTML de la aplicación -->
  <main role="main" class="container" >
    
  <?php
  session_start();
  if (isset($_SESSION['message'])) {
  ?>
    <div class="alert alert-<?php echo ($_SESSION['error']) ?  "danger" :  "success"; ?> alert-dismissible fade show" role="alert">
      <b><?php echo $_SESSION['message']; ?></b>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php
    unset($_SESSION['message']);
  }
  ?>



    <h1>Lista de productos
      <a class="btn btn-primary" role="button" href="formAddProducto.php">
      <i class="bi bi-plus-square-fill"> </i> Añadir Nuevo Producto
    </a>
  </h1>

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
              <th>
                <a class="btn btn-outline-primary" role="button" href="formUpdateProducto.php?uid=<?php echo $prod->getUid()?>">
                  <i class="bi bi-pencil-square"></i>
                </a>
              </th>
              <th>
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $prod->getUid()?>">
                  <i class="bi bi-trash-fill"></i>
                </button>
              </th>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Continuar con la eliminación del producto?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="mx-auto" width="100%">
              <h3>¿Segur@ que desea continuar?</h3>
            </div>
            <form action="../Controllers/crudProducto.php" method="post">
              <div class="form-group">
                <input type="hidden" class="form-control" name="uid" id="recipient-name">
                <input type='hidden' name='delete' value='delete'>
                <div class="mx-auto" width="300px">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-arrow-bar-left"> </i>Cancelar</button>
                  <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"> </i>Eliminar Producto</button>
                </div>
              </div>
            </form>


        </div>
      </div>
    </div>

  </main>

<?php include "../../templates/footer.php"; ?>
