<?php
include "../../templates/header.php";
require_once('../Models/modelProducto.php');

$producto = new modelProducto();
$listaProductos=$producto->listProductos();
?>
  <!-- Aquí el código HTML de la aplicación -->

  <main role="main" class="container" >
    <h1>Registrar venta de producto</h1>


    <form action='#' method='post' class="needs-validation" novalidate>
      <div class="form-row">
        <div class="col-md-8 mb-3">
          <label for="validationCustom01">UID Producto</label><br>
          <select class="form-control selectpicker" data-live-search="true" class="form-control" id="validationCustom01" name="uidProducto" required>
            <?php
            foreach($listaProductos as $prod) {
            ?>
              <option data-tokens="<?php echo $prod->getUid() ?>"> UID: <?php echo $prod->getUid() ?> - NOMBRE: <?php echo $prod->getNombre() ?> - STOCK: <?php echo $prod->getStock() ?> </option>
            <?php
            }
            ?>
          </select>
          <div class="invalid-feedback">
            Campo obligaorio.
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationCustom03">Cantidad Venta</label>
          <input type="number" class="form-control" id="validationCustom02" name="cantidadVenta" required>
          <div class="invalid-feedback">
            Campo obligaorio.
          </div>
        </div>
      </div>

      <input type='hidden' name='add' value='add'>
      <a class="btn btn-outline-secondary" role="button" href="listProductos.php"><i class="bi bi-arrow-bar-left"> </i>Volver</a>
      <button class="btn btn-success" type="submit"><i class="bi bi-save-fill"> </i>Registrar Venta</button>
    </form>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>

  </main>

<?php include "../../templates/footer.php"; ?>
