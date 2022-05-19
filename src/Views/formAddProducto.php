<?php include "../../templates/header.php"; ?>
  <!-- Aquí el código HTML de la aplicación -->

  <main role="main" class="container" >
    <h1>Añadir nuevo producto</h1>
    <form action='../Controllers/crudProducto.php' method='post' class="needs-validation" novalidate>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="validationCustom01">Nombre</label>
          <input type="text" class="form-control" id="validationCustom01" name="nombre" required>
          <div class="invalid-feedback">
            Campo obligaorio.
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationCustom02">Referencia</label>
          <input type="text" class="form-control" id="validationCustom02" name="referencia" required>
          <div class="invalid-feedback">
            Campo obligaorio.
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationCustom02">Precio ($COP)</label>
          <input type="number" class="form-control" id="validationCustom02" name="precio" required>
          <div class="invalid-feedback">
            Campo obligaorio.
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="validationCustom03">Categoria</label>
          <input type="text" class="form-control" id="validationCustom03" name="categoria" required>
          <div class="invalid-feedback">
            Campo obligaorio.
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationCustom04">Peso (gr)</label>
          <input type="number" class="form-control" id="validationCustom04" name="peso" required>
          <div class="invalid-feedback">../Controllers/crudProducto.php
            Campo obligaorio.
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationCustom05">Stock</label>
          <input type="number" class="form-control" id="validationCustom05" name="stock" required>
          <div class="invalid-feedback">
            Campo obligaorio.
          </div>
        </div>
      </div>
      <input type='hidden' name='add' value='add'>
      <a class="btn btn-outline-secondary" role="button" href="listProductos.php"><i class="bi bi-arrow-bar-left"> </i>Volver</a>
      <button class="btn btn-success" type="submit"><i class="bi bi-save-fill"> </i>Guardar</button>
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
